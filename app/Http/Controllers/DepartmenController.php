<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
class DepartmenController extends Controller
{
    public function index(){
        $department = Department::paginate(3);
        return view('department.index',compact('department'));
    }
    public function store(Request $request){
        //ตรวจสอบ
        $request->validate(
            [
                'name'=>'required|unique:departments|max:10'
            ],
            [
                'name.required'=>'กรุณาป้อนชื่อแผนกด้วยครับ',
                'name.max'=>'ป้อนเยอะไปนะ',
                'name.unique'=>'ซ้ำนะ'
            ]
        );
        //บันทึก
        $department = new Department;
        $department->name = $request->name;
        $department->userID = Auth::user()->id;
        $department->save();
        return redirect()->back()->with('success','บันทึกข้อมูลแล้ว');
    }
}
