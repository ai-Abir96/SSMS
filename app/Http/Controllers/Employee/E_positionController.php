<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;
use App\Emp_position;
use Illuminate\Http\Request;

class E_positionController extends Controller
{

  public function index()
  {
    $positions = Emp_position::all();
    return view('Employee.Job_Related.Job_Position.index',compact('positions'));
  }


  public function create()
  {
      return view('Employee.Job_Related.Job_Position.create');
  }



  public function store(Request $request)
  {
      $request->validate([
        'name' => 'required',
      ]);


      Emp_position::create($request->all());

        return redirect()->route('Eposition_index')
                  ->with('success','Job Position created successfully.');
  }


  public function show(Emp_position $emp_position)
  {

  }


  public function edit($id)
  {
    $position = Emp_position::findOrFail($id);

     return view('Employee.Job_Related.Job_Position.update', compact('position'));
  }


  public function update(Request $request, $id)
  {
    $validatedData = $request->validate([
          'name' => 'required',
      ]);

      Emp_position::whereId($id)->update($validatedData);

      return redirect()->route('Eposition_index')
                ->with('success','Job Position updated successfully.');
  }



  public function destroy($id)
  {
    Emp_position::where('id',$id)->delete();

    return redirect()->route('Eposition_index')
              ->with('success','Job Position Deleted successfully.');
  }
}
