<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;

class StudentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Student::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
    */
    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->validated());

        return response()->json([
            'success' => true,
            'data' => $student,
            'message' => 'Student added successfully',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $student,
            'message' => 'Student displayed successfully',
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudentRequest $request, string $id)
    {
        $student = Student::findOrFail($id);

        $student->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => $student,
            'message' => 'Student updated successfully',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return response()->json([
            'success' => true,
            'data' => $student,
            'message' => 'Student deleted successfully',
        ], 200);
    }
}
