<?php

namespace App\Http\Controllers;

use App\Employee_job_position;
use Illuminate\Http\Request;

class E_job_positionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ejpositions = Employee_job_position::all();
      return view('Admin.Job_Related.Job_Position.index',compact('ejpositions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee_job_position  $employee_job_position
     * @return \Illuminate\Http\Response
     */
    public function show(Employee_job_position $employee_job_position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee_job_position  $employee_job_position
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee_job_position $employee_job_position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee_job_position  $employee_job_position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee_job_position $employee_job_position)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee_job_position  $employee_job_position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee_job_position $employee_job_position)
    {
        //
    }
}
