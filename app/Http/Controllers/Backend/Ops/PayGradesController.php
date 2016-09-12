<?php

namespace App\Http\Controllers\Backend\Ops;

use App\Http\Controllers\Controller;
use App\Models\Ops\PayGrades;
use Illuminate\Http\Request;

class PayGradesController extends Controller
{
    public function index()
    {
        $pay_grades = PayGrades::all();
        return view('backend.ops.pay_grades.index', compact('pay_grades'));
    }

    public function create()
    {
        return view('backend.ops.pay_grades.create');
    }

    public function edit($id)
    {
        $pay_grade = PayGrades::find($id);
        return view('backend.ops.pay_grades.edit', compact('pay_grade'));
    }

    public function store(Request $request)
    {
        $pay_grade = $request->all();
        PayGrades::create($pay_grade);
        return $this->index();
    }

    public function update(Request $request, $id)
    {
        $pay_grade = PayGrades::find($id);
        $input = $request->all();
        $pay_grade->update($input);
        return redirect()->route('admin.ops.pay_grade.index')->withFlashSuccess('Pay Grade Updated');
    }

    public function destroy($id)
    {
        $pay_grade = PayGrades::find($id);
        $pay_grade->delete();
        return redirect()->back();
    }

}
