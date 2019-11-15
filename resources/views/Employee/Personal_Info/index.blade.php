@extends('Dashboard.admin_dashboard')

@section('content')

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <br />
  @endif

  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-lg">
              <div class="card " style="width: 70rem;">
                  <div class="card-header">{{ __('User Roles Table') }}</div>

                  <div class="col-md-8 offset-md-0">
                      <a href="{{ route('Einfo_create_page')}}"  class="btn btn-primary">
                          {{ __('Create New') }}
                      </a>
                  </div>
                  <div class="card-body">

                      <table class="card-table table-responsive table-bordered">
                        <thead>
                            <tr >
                              <td>ID</td>
                              <td>Image</td>
                              <td>First Name</td>
                              <td>Last Name</td>
                              <td>Phone No</td>
                              <td>Alternate Phone No</td>
                              <td>Email</td>
                              <td>NID number</td>
                              <td>Birth Date</td>
                              <td>Age</td>
                              <td>Present Address</td>
                              <td>Permanent Address</td>
                              <td>Marital Status</td>

                              <td colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($einfo as $enfo)
                            <tr>
                                <td>{{$enfo->id}}</td>
                                <td>{{$enfo->emp_image}}</td>
                                <td>{{$enfo->emp_fname}}</td>
                                <td>{{$enfo->emp_lname}}</td>
                                <td>{{$enfo->emp_phone1}}</td>
                                <td>{{$enfo->emp_phone2}}</td>
                                <td>{{$enfo->emp_email}}</td>
                                <td>{{$enfo->employee_nid}}</td>
                                <td>{{$enfo->emp_birth_date}}</td>
                                <td>{{$enfo->emp_age}}</td>
                                <td>{{$enfo->emp_preaddress}}</td>
                                <td>{{$enfo->emp_peraddress}}</td>
                                <td>{{$enfo->emp_marital_status}}</td>


                                <td><a href="{{ route('Einfo_update_page', $enfo->id)}}" class="btn btn-primary">Edit</a></td>
                                <td>
                                    <form action="{{ route('Einfo_delete', $enfo->id)}}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
</div>




@endsection
