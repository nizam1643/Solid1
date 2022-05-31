<?php

namespace App\Repository;

use App\Http\Resources\StudentResource;
use App\Interface\StudentInterface;
use App\Models\Student;
use Exception;

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

    public function store($collection = []){
        $student = new Student;
        $student->name = $collection['name'];
        $student->studentID = $collection['studentID'];
        $student->email = $collection['email'];
        $student->save();
        return $student;
    }

    public function show($id){
        return Student::find($id);
    }

    public function edit($id){
        return Student::find($id);
    }

    public function update($id, $collection = []){
        $student = Student::find($id);
        $student->name = $collection['name'];
        $student->studentID = $collection['studentID'];
        $student->email = $collection['email'];
        $student->save();
        return $student;
    }

    public function destroy($id){
        return Student::find($id)->delete();
    }
}
