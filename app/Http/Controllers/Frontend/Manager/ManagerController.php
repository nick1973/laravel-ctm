<?php

namespace App\Http\Controllers\Frontend\Manager;

use Mail;
use App\Models\Access\User\References;
use App\Models\Access\User\RTWork;
use App\Models\Access\User\User;
use App\Models\Access\User\UserSnapshot;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;


/**
 * Class DashboardController
 * @package App\Http\Controllers\Frontend
 */
class ManagerController extends Controller
{
    function index()
    {
        $staff = User::where([
            ['profile_confirmed', '=', 'Yes'],
            ['confirmed', '=', 1],
            ['payroll_export', '=', 1],
            ['payroll', '!=', 0]
        ])->count();
        
        if(access()->hasRole('User')){
            return redirect('dashboard');
        }
        $users = User::where('visible', 1)->where('confirmed', '=', 0)->where('profile_confirmed', '=', 'no')
         ->where('app_status', '=', 0)//orWhere
            ->paginate(50); //confirmed 0 = NEW
        return view('frontend.manager.index', compact('users', 'staff'));

    }

    function show($id)
    {
        $user = User::find($id);
        $reference = References::where('user_id', $id)->get();
        $rt_work = RTWork::where('user_id', $id)->get();

        //$dirty = $user->getDirty();
        //return $dirty;
        return view('frontend.manager.user_dashboard', compact('user', 'reference', 'rt_work', 'dirty'));
    }

    function update(Request $request, $id)
    {
        $input = $request->all();
        User::find($id)->update($input);
        $user = User::find($id);
        $collection = collect($user);
        // remove ID
        $collection->forget('id');
        //Inserts a copy of the user
        if($request->input('profile_confirmed')=="Yes"){
            //ISSUE PAYROLL IF EMPTY
            $last_payroll = User::latest('payroll')->first();
            if($last_payroll->payroll==""){
                $last_payroll_number = 6000;
            }
            //return $last_payroll_number->payroll;
            if($user->payroll=="" || $user->payroll=='0')
            {
                $last_payroll_number = (int)$last_payroll->payroll + 1;
                //return $last_payroll_number;
                User::find($id)->update(['payroll'=>$last_payroll_number]);
                //$user->fill($input)->save();

            }

            //SEND A SUCCESS EMAIL
            Mail::send('emails.success', ['user'=>$user], function ($m) use ($user) {
                $m->from('admin@ctm.uk.com', 'CTM Application');
                $m->to($user->email, $user->name)->subject('Your CTM Application!');
            });
            //SNAPSHOT OF USER
            $user = User::find($id);
            $user->update(['app_status'=>3]);
            $collection = collect($user);
            $collection->forget('id');
            UserSnapshot::insertGetId($collection->all());
            return redirect('dashboard/manager')->withFlashSuccess($user->name . ' has been emailed!');
        } else {
            //User::find($id)->update(['payroll_export'=>0]);
        }
        //return $this->index();
        //return redirect()->route('frontend.index')->withFlashSuccess('Your Applications has been submitted!');flash_warning
        return redirect('dashboard/manager')->withFlashWarning($user->name . '\'s application has been declined!');
    }

    function staff_search()
    {
        return view('frontend.manager.staff');
    }

    function staff_export()
    {
        $staff = User::where([
            ['profile_confirmed', '=', 'Yes'],
            ['confirmed', '=', 1],
            ['payroll_export', '=', 1],
            ['payroll', '!=', 0]
        ])->get();
        //return dd($staff);

        foreach ($staff as $payroll)
        {

            $day = substr($payroll->dob,5,2);
            $month = substr($payroll->dob,8,2);
            $year = substr($payroll->dob,0,4);
            $dt = Carbon::now();
            $dt->year = $year;
            $dt->month = $month;
            $dt->day = $day;
            $result[] = '"'.$payroll->payroll.'",' . '"'.$payroll->title.'",' . '"'.$payroll->name.'",' .
                '"'.$payroll->lastname.'",' . '"'.$dt->format('d/m/Y').'",' . '"'.$payroll->gender.'",' . '"'.$payroll->email.'",' .
                '"'.$payroll->postcode.'",' . '"'.$payroll->address_line_1 . ' ' . $payroll->address_line_2 .'",' .
                '"'.$payroll->city.'",' . '"'.$payroll->county.'",' .
                '"'.$payroll->country.'",' . '"'.$payroll->address_line_5.'",' . '"'.$payroll->land.'",' .
                '"'.$payroll->mobile.'",' . '"'.$payroll->emergency_contact_name.'",' . '"'.$payroll->emergency_contact_rel.'",' .
                '"'.$payroll->emergency_contact_number.'",' . '"'.$payroll->emergency_contact_mobile.'",' .
                '"'.$payroll->account_name.'",' . '"'.$payroll->account_number.'",' . '"'.$payroll->account_sort_code.'",' .
                '"'.$payroll->ni_number.'",' . '"BR"' . "\r\n";
        }

        //return $result[1];
        //dd($result);

        $date_time = Carbon::now();
        if(!empty($result)){
            Storage::put('payroll/' . $date_time . '.txt', $result[0]);
        
            for ($i=1; $i<count($result);$i++)
            {
                Storage::append('payroll/' . $date_time . '.txt', $result[$i]);
            }
            $path = base_path(). "/storage/app/docs/payroll/" . $date_time . ".txt";
        } else{
            $path = null;
        }

        if (file_exists($path)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($path).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($path));
            // add these two lines
            ob_clean();   // discard any data in the output buffer (if possible)
            flush();      // flush headers (if possible)
            readfile($path);
            
            User::where([
                ['profile_confirmed', '=', 'Yes'],
                ['confirmed', '=', 1],
                ['payroll_export', '=', 1]
            ])->update(['payroll_export' => 0]);
            
            
            exit;
        } else{
            return redirect('dashboard/manager')->withFlashWarning('Nothing to Export!');
        }
        
        
        //return Response::download($path, 'test1.txt', $headers);
    }
}
