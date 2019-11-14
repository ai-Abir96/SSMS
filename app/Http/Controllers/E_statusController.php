<?php

namespace App\Http\Controllers;

use App\Emp_status;
use Illuminate\Http\Request;

class E_statusController extends Controller
{

    public function index()
    {
        $status=Emp_status::all();

        return view('Employee.Job_Related.Job_Status.index',compact('status'));
    }


    public function create()
    {
        return view('Employee.Job_Related.Job_Status.create');
    }


    public function store(Request $request)
    {
      $request->validate([
        'name'=>'required',
      ]);
        Emp_status::create($request->all());

        return redirect()->route('Estatus_index')->
            with('success','Job Status created successfully.');


    }


    public function show(Emp_status $emp_status)
    {
        //
    }


    public function edit($id)
    {
        $status = Emp_status::findOrFail($id);

        return view('Employee.Job_Related.Job_Status.update',compact('status'));

    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
              'name'=>'required',
        ]);

        Emp_status::whereId($id)->update($validatedData);

        return redirect()->route('Estatus_index')->
              with('success','Job Status created successfully.');
    }


    public function destroy(Emp_status $emp_status)
    {
        Emp_status::where('id',$id)->delete();

        return redirect->route('Estatus_index')->with('success','Job Position Deleted successfully.');
    }
}
