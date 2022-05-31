<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentStore;
use App\Http\Requests\StudentUpdate;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Repository\StudentRepository;
use Exception;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public $student;

    public function __construct(StudentRepository $student)
    {
        $this->student = $student;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->student->index();
        return view('student.index2', compact('students'));
    }

    public function indexAPI(Request $request)
    {
        $students = $this->student->indexAPI($request);
        return response()->json([
            'students' => StudentResource::collection($students)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentStore $request)
    {
        try {
            $this->student->store($request);
        }
        catch (Exception $e) {
            return back()->with('error', 'Error creating data');
        }

        return redirect()->route('student.index')->with('success', 'Data has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = $this->student->show($id);
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = $this->student->edit($id);
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentUpdate $request, $id)
    {
        try {
            $this->student->update($id, $request);
        }
        catch (Exception $e) {
            return back()->with('error', 'Error updating data');
        }

        return redirect()->route('student.index')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->student->destroy($id);
        }
        catch (Exception $e) {
            return back()->with('error', 'Error deleting data');
        }
        return redirect()->route('student.index')->with('success', 'Data deleted successfully');
    }
}
