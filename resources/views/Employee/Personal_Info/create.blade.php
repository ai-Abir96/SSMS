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
                   <p><input id="id" type="hidden" value="{{ Auth::user()->id }}" name="emp_user_id" required></p>

                   <p><input id="emp_image" type="file"  name="emp_image" placeholder="Image" required ></p>

                   <p><input id="name" type="text"  name="emp_fname" placeholder="First Name"required ></p>

                   <p><input id="name" type="text"  name="emp_lname" placeholder="Last Name" required></p>

                   <p><input id="number" type="number"  name="emp_phone1" placeholder="Phone Number" required></p>

                   <p><input id="number" type="number"  name="emp_phone2" placeholder="Alternate Phone Number" ></p>

                   <p><input id="email" type="email" value="{{ Auth::user()->email }}"  name="emp_email" placeholder="Email" required></p>

                   <p><input id="number" type="number"  name="employee_nid" placeholder="NID number" required></p>

                   <p><input id="date" type="date"   name="emp_birth_date" placeholder="Birth Date" required></p>

                   <p><input id="number" type="text"  name="emp_age" placeholder="Age" required></p>

                   <p><input id="name" type="text"  name="emp_blood" placeholder="Blood Group" required></p>

                   <p><input id="Address" type="text"  name="emp_preaddress" placeholder="Present Address" required></p>

                   <p><input id="Address" type="text"  name="emp_peraddress" placeholder="Permanent Address" required></p>

                   <p><input id="name" type="text"  name="emp_marital_status" placeholder="Marital Status" required></p>
                 </div>

                 <div class="tab">Emergancy Information:
                   <p><input id="name" type="text"  name="ec_name" placeholder="First Name"required ><p>

                   <p><input id="number" type="number"  name="ec_phone1" placeholder="Phone Number" required><p>

                   <p><input id="number" type="number"  name="ec_phone2" placeholder="Alternate Phone Number" ><p>

                  <p> <input id="name" type="text"  name="ec_relation" placeholder="Relation With You" required><p>

                  <p> <input id="Address" type="text"  name="ec_address" placeholder="Address" required><p>
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


                 </div>

         </form>




            <!-- <div class="card">
                <div class="card-header">{{ __('Employee Information') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('Einfo_create') }}" enctype="multipart/form-data">
                        @csrf

                        <input id="emp_image" type="hidden" value="{{ Auth::user()->id }}" name="emp_user_id" required>


                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="emp_image" type="file" class="form-control @error('image') is-invalid @enderror" name="emp_image" value="{{ old('emp_image') }}" required autocomplete="image" autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="emp_fname" value="{{ old('emp_fname') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="emp_lname" value="{{ old('emp_lname') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Contact No') }}</label>

                            <div class="col-md-6">
                                <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="emp_phone1" value="{{ old('emp_phone1') }}" required autocomplete="number" autofocus>

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Alternate Contact No') }}</label>

                            <div class="col-md-6">
                                <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="emp_phone2" value="{{ old('emp_phone2') }}" required autocomplete="number" autofocus>

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" value="{{ Auth::user()->email }}" class="form-control @error('email') is-invalid @enderror" name="emp_email" value="{{ old('emp_email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('NID Number') }}</label>

                            <div class="col-md-6">
                                <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="employee_nid" value="{{ old('employee_nid') }}" required autocomplete="number" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Birth Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date"  class="form-control @error('date') is-invalid @enderror" name="emp_birth_date" value="{{ old('emp_birth_date') }}" required autocomplete="date" autofocus>

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                            <div class="col-md-6">
                                <input id="number" type="text" class="form-control @error('number') is-invalid @enderror" name="emp_age" value="{{ old('emp_age') }}" required autocomplete="number" autofocus>

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Blood Group') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('number') is-invalid @enderror" name="emp_blood" value="{{ old('emp_blood') }}" required autocomplete="name" autofocus>

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="Address" class="col-md-4 col-form-label text-md-right">{{ __('Present Address') }}</label>

                            <div class="col-md-6">
                                <input id="Address" type="text" class="form-control @error('Address') is-invalid @enderror" name="emp_preaddress" value="{{ old('emp_preaddress') }}" required autocomplete="Address" autofocus>

                                @error('Address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Address" class="col-md-4 col-form-label text-md-right">{{ __('Permanent Address') }}</label>

                            <div class="col-md-6">
                                <input id="Address" type="text" class="form-control @error('name') is-invalid @enderror" name="emp_peraddress" value="{{ old('emp_peraddress') }}" required autocomplete="Address" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Marital Status') }}</label>





                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="emp_marital_status" value="{{ old('emp_marital_status') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Next') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> -->

        </div>
    </div>
</div>


@endsection
