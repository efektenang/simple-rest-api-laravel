<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    public function createStudent(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:students",
            "phone" => "required",
            "age" => "required"
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->age = $request->age;

        $student->save();

        return response()->json([
            "status" => 1,
            "message" => "Student registered successfully."
        ]);
    }

    public function listStudent()
    {
        $students = Student::latest()->paginate(10);

        return [
            "status" => 1,
            "data" => $students
        ];
    }

    public function  getStudentById($id)
    {
        $student = Student::find($id);
        if (!empty($student)) {
            return response()->json([
                "status" => 1,
                "data" => $student
            ]);
        } else {
            return response()->json([
                "message" => "Not Found"
            ], 404);
        }
    }

    public function updateStudent(Request $request, $id)
    {
        $student = Student::find($id);
        if (!empty($student)) {
            $student->name = is_null($request->name) ? $student->name : $request->name;
            $student->email = is_null($request->email) ? $student->email : $request->email;
            $student->age = is_null($request->age) ? $student->age : $request->age;
            $student->phone = is_null($request->phone) ? $student->phone : $request->phone;

            $student->save();

            return response()->json([
                "status" => 1,
                "message" => "OK"
            ]);
        } else {
            return response()->json([
                "message" => "Not Found"
            ], 404);
        }
    }

    public function deleteStudent($id)
    {
        if(Student::where('id', $id)->exists()) {
            $student = Student::find($id);
            $student->delete();

            return response()->json([
                "status" => 1,
                "message" => "OK"
            ], 202);
        } else {
            return response()->json([
                "message" => "Not Found"
            ], 404);
        }
    }
}
