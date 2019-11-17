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
              <div class="card ">
                  <div class="card-header"><b>{{ __('Employee Personal Information') }}</b></div>

                  <div class="card-body">

                        <table class="table table-responsive table-striped table-hover">
                        <thead>
                            <tr >
                              <td><b>ID</b></td>
                              <td><b>Image</b></td>
                              <td><b>First Name</b></td>
                              <td><b>Last Name</b></td>
                              <td><b>NID number</b></td>
                              <td><b>Birth Date</b></td>
                              <td><b>Marital Status</b></td>
                              <td colspan="2"><b>Action</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($einfo as $enfo)
                            <tr>
                                <td>{{$enfo->id}}</td>
                                <td><img src="{{ asset('Images/Employee_Image') }}/{{ $enfo->emp_image }}" class="rounded" alt="{{ $enfo->emp_image }}" style="width:50px;height:50px";></td>
                                <td>{{$enfo->emp_fname}}</td>
                                <td>{{$enfo->emp_lname}}</td>
                                <td>{{$enfo->employee_nid}}</td>
                                <td>{{$enfo->emp_birth_date}}</td>
                                <td>{{$enfo->emp_marital_status}}</td>

                                <td><a href="" class="btn btn-primary">View</a></td>
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
