<?php

namespace App\Http\Controllers;

use App\Emp_position;
use Illuminate\Http\Request;

class E_positionController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $positions = Emp_position::all();
    return view('Admin.Job_Related.Job_Position.index',compact('positions'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('Admin.Job_Related.Job_Position.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $request->validate([
        'name' => 'required',
      ]);


      Emp_position::create($request->all());

        return redirect()->route('EJpostion_index')
                  ->with('success','Job Position created successfully.');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Emp_position  $emp_position
   * @return \Illuminate\Http\Response
   */
  public function show(Emp_position $emp_position)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Emp_position  $emp_position
   * @return \Illuminate\Http\Response
   */
  public function edit(Emp_position $emp_position)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Emp_position  $emp_position
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Emp_position $emp_position)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Emp_position  $emp_position
   * @return \Illuminate\Http\Response
   */
  public function destroy(Emp_position $emp_position)
  {
      //
  }
}
