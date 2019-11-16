<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;

use App\Emp_job;
use Illuminate\Http\Request;

class E_jobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $ejob = Emp_job::all();
      return view('Employee.Job_Info.index',compact('ejob'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Emp_job  $emp_job
     * @return \Illuminate\Http\Response
     */
    public function show(Emp_job $emp_job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Emp_job  $emp_job
     * @return \Illuminate\Http\Response
     */
    public function edit(Emp_job $emp_job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Emp_job  $emp_job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Emp_job $emp_job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Emp_job  $emp_job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emp_job $emp_job)
    {
        //
    }
}
