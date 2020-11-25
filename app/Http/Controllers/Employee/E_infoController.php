<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;
use App\Emp_info;
use App\E_contact_info;
use App\E_personal_info;
use App\E_emergancy_info;
use App\User;
use App\Emp_job;
use Illuminate\Http\Request;
use Image;
Use Auth;
Use Carbon\Carbon;

class E_infoController extends Controller
{

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
          'employee_nid'=> ['required','integer','min:10','max:20'],
          'emp_birth_date'=> ['required','date_format:"d-m-Y"'],
          'emp_gender'=> ['required','string'],
          'emp_blood'=> ['required','string'],
          'emp_preaddress'=> ['required','string','max:100'],
          'emp_peraddress'=> ['required','string','max:100'],
          'emp_marital_status'=> ['required','string'],
          'ec_name'=> ['required','string','max:50'],
          'ec_phone1'=> ['required','integer','min:11','max:11'],
          'ec_phone2'=> ['integer','min:11','max:11'],
          'ec_gender'=> ['required','string'],
          'ec_relation'=> ['required','string'],
          'ec_address'=> ['required','string','max:100'],

        ]);
    }

    public function store(Request $request)
    {

      E_emergancy_info::insert([
        'ee_user_id' => Auth::user()-> id,
        'ec_name'=> $request -> ec_name,
        'ec_phone1'=> $request -> ec_phone1,
        'ec_phone2'=> $request -> ec_phone2,
        'ec_gender'=> $request -> ec_gender,
        'ec_relation'=> $request -> ec_relation,
        'ec_address'=> $request -> ec_address,
        'created_at'=> Carbon::now(),


      ]);


      E_contact_info::insert([
        'ec_user_id' =>  Auth::user()-> id,
        'emp_phone1'=> $request-> emp_phone1,
        'emp_phone2'=> $request-> emp_phone2,
        'emp_email'=> $request-> emp_email,
        'emp_preaddress'=> $request-> emp_preaddress,
        'emp_peraddress'=> $request-> emp_peraddress,
        'created_at'=> Carbon::now(),
      ]);


      $last_inserted_id = E_personal_info::insertGetId([
        'ep_user_id' =>  Auth::user()-> id,
        'emp_image'=> $request-> emp_image,
        'emp_fname'=> $request-> emp_fname,
        'emp_lname'=> $request-> emp_lname,
        'employee_nid'=>$request-> employee_nid ,
        'emp_birth_date'=> $request-> emp_birth_date,
        'emp_age'=> Carbon::parse($request-> emp_birth_date)->age,
        'emp_gender' => $request-> emp_gender,
        'emp_blood' => $request-> emp_blood,
        'emp_marital_status'=>$request-> emp_marital_status,
        'created_at'=> Carbon::now(),

      ]);

      if ($request->hasFile('emp_image'))
      {
              $photo_upload     =  $request -> emp_image;
              $photo_extension  =  $photo_upload -> getClientOriginalExtension();
              $photo_name       =  $last_inserted_id . "." . $photo_extension;
              Image::make($photo_upload)->resize(320,240)->save(base_path('public/Images/Employee_Image/'.$photo_name),100);

              E_personal_info::find($last_inserted_id)->update(['emp_image' => $photo_name,]);


      }

      return redirect()->route('denied')
                       ->with('success','Employee Information is successfully Added.');


    }




    public function show()
    {
        $id = Auth::user()->id;

        $pinfo = E_personal_info::where('ep_user_id',$id)->first();
        $cinfo = E_contact_info::where('ec_user_id',$id)->first();
        $einfo = E_emergancy_info::where('ee_user_id',$id)->first();
        $jinfo = Emp_job::where('emp_id',$id)->first();


        return view('Employee.Personal_Info.view',compact('pinfo','cinfo','einfo','jinfo'));

    }


    public function edit()
    {
      $id = Auth::user()->id;
      $pinfo = E_personal_info::where('ep_user_id',$id)->first();
      $cinfo = E_contact_info::where('ec_user_id',$id)->first();
      $einfo = E_emergancy_info::where('ee_user_id',$id)->first();
      return view('Employee.Personal_Info.edit',compact('pinfo','cinfo','einfo'));
    }


    public function update(Request $request)
    {
      $id = Auth::user()->id;
      E_emergancy_info::where('ee_user_id',$id)->update([
        'ee_user_id' => $request -> emp_user_id,
        'ec_name'=> $request -> ec_name,
        'ec_phone1'=> $request -> ec_phone1,
        'ec_phone2'=> $request -> ec_phone2,
        'ec_relation'=> $request -> ec_relation,
        'ec_address'=> $request -> ec_address,
        'updated_at'=> Carbon::now(),

      ]);


      E_contact_info::where('ec_user_id',$id)->update([
        'ec_user_id' => $request -> emp_user_id,
        'emp_phone1'=> $request-> emp_phone1,
        'emp_phone2'=> $request-> emp_phone2,
        'emp_email'=> $request-> emp_email,
        'emp_preaddress'=> $request-> emp_preaddress,
        'emp_peraddress'=> $request-> emp_peraddress,
        'updated_at'=> Carbon::now(),
      ]);


      if(!empty($request-> emp_image))
      {
        $image = $request-> emp_image;
      }
      else
      {
        $image = Auth::user()-> personals -> emp_image;
      }


 E_personal_info::where('ep_user_id',$id)->update([
        'ep_user_id' => $request -> emp_user_id,
        'emp_fname'=> $request-> emp_fname,
        'emp_lname'=> $request-> emp_lname,
        'emp_image'=> $image,
        'employee_nid'=>$request-> employee_nid ,
        'emp_birth_date'=> $request-> emp_birth_date,
        'emp_age'=> Carbon::parse($request-> emp_birth_date)->age,
        'emp_blood' => $request-> emp_blood,
        'emp_marital_status'=>$request-> emp_marital_status,
        'updated_at'=>Carbon::now(),

      ]);

      if ($request->hasFile('emp_image'))
      {
              $photo_upload     =  $request -> emp_image;
              $photo_extension  =  $photo_upload -> getClientOriginalExtension();
              $photo_name       =  $id . "." . $photo_extension;
              Image::make($photo_upload)->resize(320,240)->save(base_path('public/Images/Employee_Image/'.$photo_name),100);

              E_personal_info::where('ep_user_id',$id)->update(['emp_image' => $photo_name,]);


      }

      return redirect()->route('Einfo_show')
                       ->with('success','Employee Information is successfully Updated.');

    }



//admin area
    public function nameinfo()
    {
        $einfo = E_personal_info::all();
        return view('Admin.Emp_Details.nameinfo',compact('einfo'));
    }
    public function emergancyinfo()
    {
        $einfo = E_emergancy_info::all();
        return view('Admin.Emp_Details.emergancyinfo',compact('einfo'));
    }
    public function contactinfo()
    {
        $einfo = E_contact_info::all();
        return view('Admin.Emp_Details.contactinfo',compact('einfo'));
    }



    //admin area end
}
