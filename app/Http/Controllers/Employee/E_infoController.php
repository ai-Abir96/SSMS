<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;
use App\Emp_info;
use App\User;
use Illuminate\Http\Request;
use Image;


class E_infoController extends Controller
{

    public function index()
    {
        $einfo = Emp_info::all();
        return view('Employee.Personal_Info.index',compact('einfo'));
    }


    public function create()
    {
        return view('Employee.Personal_Info.create');

    }

    protected function validator(Request $request)
    {
        return Validator::make($request, [
          'emp_user_id'=> ['required'],
          'emp_image'=> ['required'],
          'emp_fname'=> ['required','string','max:30'],
          'emp_lname'=> ['required','string','max:20'],
          'emp_phone1'=> ['required','integer','min:11','max:11'],
          'emp_phone2'=> ['integer','min:11','max:11'],
          'emp_email'=> ['required','email','max:30'],
          'employee_nid'=> ['required','integer','min:13','max:20'],
          'emp_birth_date'=> ['required','date_format:"d-m-Y"'],
          'emp_age'=> ['required','integer','max:3'],
          'emp_preaddress'=> ['required','string','max:50'],
          'emp_peraddress'=> ['required','string','max:50'],
          'emp_marital_status'=> ['required','string'],
        ]);
    }

    public function store(Request $request)
    {

    //  $user = User::find($id);

      $last_inserted_id = Emp_info::insertGetId([
        'emp_user_id' => $request -> emp_user_id,
        'emp_image'=> $request-> emp_image,
        'emp_fname'=> $request-> emp_fname,
        'emp_lname'=> $request-> emp_lname,
        'emp_phone1'=> $request-> emp_phone1,
        'emp_phone2'=> $request-> emp_phone2,
        'emp_email'=> $request-> emp_email,
        'employee_nid'=>$request-> employee_nid ,
        'emp_birth_date'=> $request-> emp_birth_date,
        'emp_age'=> $request-> emp_age,
        'emp_preaddress'=> $request-> emp_preaddress,
        'emp_peraddress'=> $request-> emp_peraddress,
        'emp_marital_status'=>$request-> emp_marital_status,

      ]);


      if ($request->hasFile('emp_image')) {
              $photo_upload     =  $request -> emp_image;
              $photo_extension  =  $photo_upload -> getClientOriginalExtension();
              $photo_name       =  $last_inserted_id . "." . $photo_extension;
              Image::make($photo_upload)->resize(320,240)->save(base_path('public/Employee/Employee_Image/'.$photo_name),100);
                    }

      return redirect()->route('Einfo_index')
                      ->with('success','Job Position created successfully.');


    }




    public function show(Emp_info $emp_info)
    {

    }


    public function edit(Emp_info $emp_info)
    {

    }


    public function update(Request $request, Emp_info $emp_info)
    {

    }



}
