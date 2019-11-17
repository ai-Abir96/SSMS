<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;

use App\Emp_job;
use App\Emp_info;
use App\Emp_position;
use Illuminate\Http\Request;


class E_jobController extends Controller
{
  protected function validator(Request $request)
  {
      return Validator::make($request, [
        'emp_id'=> ['required'],
        'position_id'=> ['required'],
        'salaray'=> ['required','integer'],
        'bonus'=> ['required','integer'],
        'status'=> ['required','max:30'],
        'signing_date'=> ['required','date_format:"m-d-Y"'],
        'departing_date'=> ['required','date_format:"m-d-Y"'],
      ]);
  }

    public function index()
    {


      $ejob = Emp_job::orderByRaw("FIELD(status , 'Active', 'On Leave', 'Departed')")->get();
      $einfos=Emp_info::all();
      $epsn = Emp_position::all();

      return view('Employee.Job_Information.index',compact('ejob'));
    }


    public function create()
    {

       $einfos=Emp_info::all();
       $epsn = Emp_position::all();
      return view('Employee.Job_Information.create')->with([

          'einfos'=>$einfos,
          'epsn'=>$epsn

        ]);
    }


    public function store(Request $request)
    {


      Emp_job::insert([
        'emp_id'=> $request -> emp_id,
        'position_id'=> $request -> position_id,
        'salaray'=> $request -> salaray,
        'bonus'=> $request -> bonus,
        'status'=> $request -> status,
        'signing_date'=> $request -> signing_date,
        'departing_date'=> $request -> departing_date,

      ]);

      return redirect()->route('Ejob_index')
                       ->with('success','Employee Job Information is successfully Added.');
    }


    public function show(Emp_job $emp_job)
    {
        //
    }


    public function edit(Emp_job $emp_job)
    {
        //
    }


    public function update(Request $request)
    {
      Emp_job::find($request->id)->update([
        'status'=> $request -> status,
      ]);

        return redirect()->route('jobstatus')
                  ->with('success','Job Position updated successfully.');
    }


    public function destroy(Emp_job $emp_job)
    {
        //
    }




    public function jobinfo()
    {
        $ejob = Emp_job::all();
        return view('Admin.Emp_Details.jobinfo',compact('ejob'));
    }

    public function jobstatus()
    {
        $ejob = Emp_job::orderByRaw("FIELD(status , 'Active', 'On Leave', 'Departed')")->get();
        return view('Admin.Emp_Details.jobstatus',compact('ejob'));
    }


}
