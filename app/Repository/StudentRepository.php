<?php

namespace App\Repository;

use App\Http\Resources\StudentResource;
use App\Interface\StudentInterface;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;

class StudentRepository implements StudentInterface
{
    protected $student = null;

    public function index(){
        return Student::get();
    }

    public function indexAPI($collection = []){

        if($collection['keyword'] != ''){
            return Student::where('name','LIKE','%'.$collection['keyword'].'%')->get();
            }
        else{
            return Student::get();
        }
    }

    public function create(){

    }

    public function store($request){
        $student = new Student;
        $student->name = $request->name;
        $student->studentID = $request->studentID;
        $student->email = $request->email;
        $student->save();
        return $student;
    }

    public function show($id){
        return Student::find($id);
    }

    public function edit($id){
        return Student::find($id);
    }

    public function update($id, $request){
        $student = Student::find($id);
        $student->name = $request->name;
        $student->studentID = $request->studentID;
        $student->email = $request->email;
        $student->save();
        return $student;
    }

    public function destroy($id){
        return Student::find($id)->delete();
    }
}
