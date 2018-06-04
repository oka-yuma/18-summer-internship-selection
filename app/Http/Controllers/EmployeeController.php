<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Division;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $employees = Employee::select('employees.*')
            ->join('divisions', 'divisions.id', '=', 'employees.division_id');

        // 絞り込み
        $employees = $employees->where('family_name', 'like', '%' . $request->get('family_name') . '%');
        $employees = $employees->where('given_name', 'like', '%' . $request->get('given_name') . '%');
        $employees = $employees->where('family_name_kana', 'like', '%' . $request->get('family_name_kana') . '%');
        $employees = $employees->where('given_name_kana', 'like', '%' . $request->get('given_name_kana') . '%');
        // ↓ここから　バグ
        // ①この処理は何を狙った処理なのか考える
        // ②なぜバグが出てしまうのかを考える
        // ③どうしたらそうならないかを考える
        //  dd($request->get('department_id'));　等をして、 requestのパラメータに興味を持とう
        $employees = $employees->where('divisions.department_id', $request->get('department_id'));
        $employees = $employees->where('employees.division_id',  $request->get('division_id'));
        // ↑ここまで　バグ

        // ソート
        $employees = $employees->orderBy($request->get('sort_key', 'id'),$request->get('sort_order', 'asc'));
        $employees = $employees->get();

        $allDepartments = Department::getSelectList();
        $allDivisions = Division::getSelectList();

        return view('employee.list')->with(compact('employees', 'allDepartments', 'allDivisions'));
    }
}
