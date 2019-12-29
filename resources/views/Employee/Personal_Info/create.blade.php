@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form id="regForm" method="POST" action="{{ route('Einfo_create') }}" enctype="multipart/form-data">
                  @csrf
                 <h1>Employee Information</h1>

                 <!-- One "tab" for each step in the form: -->
                 <div class="tab">Personal Information:
                   <p><input id="id" class="form-control"type="hidden" value="{{ Auth::user()->id }}" name="ep_user_id" required></p>

                   <p><input id="emp_image" class="form-control"type="file"  name="emp_image" placeholder="Image" required ></p>

                   <p><input id="name" class="form-control"type="text"  name="emp_fname" placeholder="First Name"required ></p>

                   <p><input id="name"class="form-control" type="text"  name="emp_lname" placeholder="Last Name" required></p>

                   <p><input id="number"class="form-control" type="number"  name="employee_nid" placeholder="NID number" required></p>

                   <p><input id="date" class="form-control"type="date"   name="emp_birth_date" placeholder="Birth Date" required></p>

                   <p><input id="name"class="form-control" type="text"  name="emp_blood" placeholder="Blood Group" required></p>

                   <p><input id="name" class="form-control"type="text"  name="emp_marital_status" placeholder="Marital Status" required></p>
                 </div>

                 <div class="tab">Contact Information:
                   <p><input id="id" type="hidden" value="{{ Auth::user()->id }}" name="ec_user_id" required></p>
                   <p><input id="number"class="form-control" type="number"  name="emp_phone1" placeholder="Phone Number" required></p>

                   <p><input id="number"class="form-control" type="number"  name="emp_phone2" placeholder="Alternate Phone Number" ></p>

                   <p><input id="email" class="form-control"type="email" value="{{ Auth::user()->email }}"  name="emp_email" placeholder="Email" required></p>

                   <p><input id="Address" class="form-control"type="text"  name="emp_preaddress" placeholder="Present Address" required></p>

                   <p><input id="Address" class="form-control"type="text"  name="emp_peraddress" placeholder="Permanent Address" required></p>
                 </div>

                 <div class="tab">Emergancy Information:
                   <p><input id="id" type="hidden" value="{{ Auth::user()->id }}" name="ee_user_id" required></p>
                   <p><input id="name" class="form-control"type="text"  name="ec_name" placeholder="First Name"required ><p>

                   <p><input id="number" class="form-control"type="number"  name="ec_phone1" placeholder="Phone Number" required><p>

                   <p><input id="number"class="form-control" type="number"  name="ec_phone2" placeholder="Alternate Phone Number" ><p>

                  <p> <input id="name" class="form-control"type="text"  name="ec_relation" placeholder="Relation With You" required><p>

                  <p> <input id="Address"class="form-control" type="text"  name="ec_address" placeholder="Address" required><p>
                 </div>

                 <div style="overflow:auto;">
                   <div style="float:right;">
                     <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                     <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                   </div>
                 </div>

                 <!-- Circles which indicates the steps of the form: -->
                 <div style="text-align:center;margin-top:40px;">
                   <span class="step"></span>
                   <span class="step"></span>
                   <span class="step"></span>
                 </div>

         </form>



        </div>
    </div>
</div>


@endsection
