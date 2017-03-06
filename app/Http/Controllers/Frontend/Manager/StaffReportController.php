<?php

namespace App\Http\Controllers\Frontend\Manager;

use App\Models\Access\User\User;
use App\Models\Dropdowns\EventsList;
use App\Models\Dropdowns\HearAboutUs;
use App\Models\Dropdowns\Promotions;
use App\Models\Dropdowns\Tag;
use App\Models\Dropdowns\Unis;
use App\Models\Ops\Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class StaffReportController extends Controller
{
    function index(){
        $events = Events::all();
        $heard = HearAboutUs::all();
        $promotions = Promotions::all();
        $unis = Unis::all();
        return view('frontend.manager.reports.index', compact('heard','promotions','unis','events'));
    }

    function staff_search(Request $request)
    {
        ini_set('memory_limit', '2048M');
        //return $request->all();
        if($request->input('heard')=='' && $request->input('promo')=='' && $request->input('uni')==''){
            $staff = User::where('app_status', 3)
                ->where('markAsp45', 0)
                ->where('visible', 1)
                ->where('payroll','!=','0')
                ->get();
        }

        if($request->input('heard')!='' && $request->input('promo')=='' && $request->input('uni')==''){
            $staff = User::where('app_status', 3)
                ->where('markAsp45', 0)
                ->where('visible', 1)
                ->where('heard_about_us', $request->input('heard'))
                ->get();
        }

        if($request->input('heard')=='' && $request->input('promo')!='' && $request->input('uni')==''){
            $staff = User::where('app_status', 3)
                ->where('markAsp45', 0)
                ->where('visible', 1)
                ->where('promotion', $request->input('promo'))
                ->get();
        }

        if($request->input('heard')=='' && $request->input('promo')=='' && $request->input('uni')!=''){
            $staff = User::where('app_status', 3)
                ->where('markAsp45', 0)
                ->where('visible', 1)
                ->where('uni', $request->input('uni'))
                ->get();
        }

        if($request->input('heard')!='' && $request->input('promo')!='' && $request->input('uni')==''){
            $staff = User::where('app_status', 3)
                ->where('markAsp45', 0)
                ->where('visible', 1)
                ->where('heard_about_us', $request->input('heard'))
                ->where('promotion', $request->input('promo'))
                ->get();
        }

        if($request->input('heard')=='' && $request->input('promo')!='' && $request->input('uni')!=''){
            $staff = User::where('app_status', 3)
                ->where('markAsp45', 0)
                ->where('visible', 1)
                ->where('promotion', $request->input('promo'))
                ->where('uni', $request->input('uni'))
                ->get();
        }

        if($request->input('heard')!='' && $request->input('promo')=='' && $request->input('uni')!=''){
            $staff = User::where('app_status', 3)
                ->where('markAsp45', 0)
                ->where('visible', 1)
                ->where('heard_about_us', $request->input('heard'))
                ->where('uni', $request->input('uni'))
                ->get();
        }

        if($request->input('heard')!='' && $request->input('promo')!='' && $request->input('uni')!=''){
            $staff = User::where('app_status', 3)
                ->where('markAsp45', 0)
                ->where('visible', 1)
                ->where('heard_about_us', $request->input('heard'))
                ->where('promotion', $request->input('promo'))
                ->where('uni', $request->input('uni'))
                ->get();
        }

        //WITH DATES

        if($request->input('from')!='' && $request->input('to')!=''){

            if($request->input('heard')=='' && $request->input('promo')=='' && $request->input('uni')==''){
                $staff = User::whereBetween('created_at', [$request->input('from'),$request->input('to')])
                    ->where('app_status', 3)
                    ->where('markAsp45', 0)
                    ->where('visible', 1)
                    ->get();
            }

            if($request->input('heard')!='' && $request->input('promo')=='' && $request->input('uni')==''){
                $staff = User::whereBetween('created_at', [$request->input('from'),$request->input('to')])
                    ->where('app_status', 3)
                    ->where('markAsp45', 0)
                    ->where('visible', 1)
                    ->where('heard_about_us', $request->input('heard'))
                    ->get();
            }

            if($request->input('heard')=='' && $request->input('promo')!='' && $request->input('uni')==''){
                $staff = User::whereBetween('created_at', [$request->input('from'),$request->input('to')])
                    ->where('app_status', 3)
                    ->where('markAsp45', 0)
                    ->where('visible', 1)
                    ->where('promotion', $request->input('promo'))
                    ->get();
            }

            if($request->input('heard')=='' && $request->input('promo')=='' && $request->input('uni')!=''){
                $staff = User::whereBetween('created_at', [$request->input('from'),$request->input('to')])
                    ->where('app_status', 3)
                    ->where('markAsp45', 0)
                    ->where('visible', 1)
                    ->where('uni', $request->input('uni'))
                    ->get();
            }

            if($request->input('heard')!='' && $request->input('promo')!='' && $request->input('uni')==''){
                $staff = User::whereBetween('created_at', [$request->input('from'),$request->input('to')])
                    ->where('app_status', 3)
                    ->where('markAsp45', 0)
                    ->where('visible', 1)
                    ->where('heard_about_us', $request->input('heard'))
                    ->where('promotion', $request->input('promo'))
                    ->get();
            }

            if($request->input('heard')=='' && $request->input('promo')!='' && $request->input('uni')!=''){
                $staff = User::whereBetween('created_at', [$request->input('from'),$request->input('to')])
                    ->where('app_status', 3)
                    ->where('markAsp45', 0)
                    ->where('visible', 1)
                    ->where('promotion', $request->input('promo'))
                    ->where('uni', $request->input('uni'))
                    ->get();
            }

            if($request->input('heard')!='' && $request->input('promo')=='' && $request->input('uni')!=''){
                $staff = User::whereBetween('created_at', [$request->input('from'),$request->input('to')])
                    ->where('app_status', 3)
                    ->where('markAsp45', 0)
                    ->where('visible', 1)
                    ->where('heard_about_us', $request->input('heard'))
                    ->where('uni', $request->input('uni'))
                    ->get();
            }

            if($request->input('heard')!='' && $request->input('promo')!='' && $request->input('uni')!=''){
                $staff = User::whereBetween('created_at', [$request->input('from'),$request->input('to')])
                    ->where('app_status', 3)
                    ->where('markAsp45', 0)
                    ->where('visible', 1)
                    ->where('heard_about_us', $request->input('heard'))
                    ->where('promotion', $request->input('promo'))
                    ->where('uni', $request->input('uni'))
                    ->get();
            }
        }
        return ['data'=>$staff];
    }

    function staff_search_non_approved(Request $request)
    {
        ini_set('memory_limit', '2048M');
        //return $request->all();
        if($request->input('heard')=='' && $request->input('promo')=='' && $request->input('uni')==''){
            $staff = User::where('app_status', 0)
                ->where('markAsp45', 0)
                ->where('visible', 1)
                ->get();
        }

        if($request->input('heard')!='' && $request->input('promo')=='' && $request->input('uni')==''){
            $staff = User::where('app_status', 0)
                ->where('markAsp45', 0)
                ->where('visible', 1)
                ->where('heard_about_us', $request->input('heard'))
                ->get();
        }

        if($request->input('heard')=='' && $request->input('promo')!='' && $request->input('uni')==''){
            $staff = User::where('app_status', 0)
                ->where('markAsp45', 0)
                ->where('visible', 1)
                ->where('promotion', $request->input('promo'))
                ->get();
        }

        if($request->input('heard')=='' && $request->input('promo')=='' && $request->input('uni')!=''){
            $staff = User::where('app_status', 0)
                ->where('markAsp45', 0)
                ->where('visible', 1)
                ->where('uni', $request->input('uni'))
                ->get();
        }

        if($request->input('heard')!='' && $request->input('promo')!='' && $request->input('uni')==''){
            $staff = User::where('app_status', 0)
                ->where('markAsp45', 0)
                ->where('visible', 1)
                ->where('heard_about_us', $request->input('heard'))
                ->where('promotion', $request->input('promo'))
                ->get();
        }

        if($request->input('heard')=='' && $request->input('promo')!='' && $request->input('uni')!=''){
            $staff = User::where('app_status', 0)
                ->where('markAsp45', 0)
                ->where('visible', 1)
                ->where('promotion', $request->input('promo'))
                ->where('uni', $request->input('uni'))
                ->get();
        }

        if($request->input('heard')!='' && $request->input('promo')=='' && $request->input('uni')!=''){
            $staff = User::where('app_status', 0)
                ->where('markAsp45', 0)
                ->where('visible', 1)
                ->where('heard_about_us', $request->input('heard'))
                ->where('uni', $request->input('uni'))
                ->get();
        }

        if($request->input('heard')!='' && $request->input('promo')!='' && $request->input('uni')!=''){
            $staff = User::where('app_status', 0)
                ->where('markAsp45', 0)
                ->where('visible', 1)
                ->where('heard_about_us', $request->input('heard'))
                ->where('promotion', $request->input('promo'))
                ->where('uni', $request->input('uni'))
                ->get();
        }

        //WITH DATES

        if($request->input('from')!='' && $request->input('to')!=''){

            if($request->input('heard')=='' && $request->input('promo')=='' && $request->input('uni')==''){
                $staff = User::whereBetween('created_at', [$request->input('from'),$request->input('to')])
                    ->where('app_status', 0)
                    ->where('markAsp45', 0)
                    ->where('visible', 1)
                    ->get();
            }

            if($request->input('heard')!='' && $request->input('promo')=='' && $request->input('uni')==''){
                $staff = User::whereBetween('created_at', [$request->input('from'),$request->input('to')])
                    ->where('app_status', 0)
                    ->where('markAsp45', 0)
                    ->where('visible', 1)
                    ->where('heard_about_us', $request->input('heard'))
                    ->get();
            }

            if($request->input('heard')=='' && $request->input('promo')!='' && $request->input('uni')==''){
                $staff = User::whereBetween('created_at', [$request->input('from'),$request->input('to')])
                    ->where('app_status', 0)
                    ->where('markAsp45', 0)
                    ->where('visible', 1)
                    ->where('promotion', $request->input('promo'))
                    ->get();
            }

            if($request->input('heard')=='' && $request->input('promo')=='' && $request->input('uni')!=''){
                $staff = User::whereBetween('created_at', [$request->input('from'),$request->input('to')])
                    ->where('app_status', 0)
                    ->where('markAsp45', 0)
                    ->where('visible', 1)
                    ->where('uni', $request->input('uni'))
                    ->get();
            }

            if($request->input('heard')!='' && $request->input('promo')!='' && $request->input('uni')==''){
                $staff = User::whereBetween('created_at', [$request->input('from'),$request->input('to')])
                    ->where('app_status', 0)
                    ->where('markAsp45', 0)
                    ->where('visible', 1)
                    ->where('heard_about_us', $request->input('heard'))
                    ->where('promotion', $request->input('promo'))
                    ->get();
            }

            if($request->input('heard')=='' && $request->input('promo')!='' && $request->input('uni')!=''){
                $staff = User::whereBetween('created_at', [$request->input('from'),$request->input('to')])
                    ->where('app_status', 0)
                    ->where('markAsp45', 0)
                    ->where('visible', 1)
                    ->where('promotion', $request->input('promo'))
                    ->where('uni', $request->input('uni'))
                    ->get();
            }

            if($request->input('heard')!='' && $request->input('promo')=='' && $request->input('uni')!=''){
                $staff = User::whereBetween('created_at', [$request->input('from'),$request->input('to')])
                    ->where('app_status', 0)
                    ->where('markAsp45', 0)
                    ->where('visible', 1)
                    ->where('heard_about_us', $request->input('heard'))
                    ->where('uni', $request->input('uni'))
                    ->get();
            }

            if($request->input('heard')!='' && $request->input('promo')!='' && $request->input('uni')!=''){
                $staff = User::whereBetween('created_at', [$request->input('from'),$request->input('to')])
                    ->where('app_status', 0)
                    ->where('markAsp45', 0)
                    ->where('visible', 1)
                    ->where('heard_about_us', $request->input('heard'))
                    ->where('promotion', $request->input('promo'))
                    ->where('uni', $request->input('uni'))
                    ->get();
            }
        }
        return ['data'=>$staff];
    }
}
