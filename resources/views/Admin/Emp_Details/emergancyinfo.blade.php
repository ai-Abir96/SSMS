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
                  <div class="card-header"><b>{{ __('Employee Emergancy Information') }}</b></div>


                  <div class="card-body">

                      <table class="table table-responsive table-striped table-hover">
                        <thead>
                            <tr >
                              <td><b>ID</b></td>
                              <td><b>Employee Name</b></td>
                              <td><b>Emergancy Contact Name</b></td>
                              <td><b>Phone No</b></td>
                              <td><b>Alternate Phone No</b></td>
                              <td><b>Relation with Employee</b></td>
                              <td><b>Address</b></td>
                              <td colspan="2"><b>Action</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($einfo as $enfo)
                            <tr>
                                <td>{{$enfo->id}}</td>
                                <td>{{$enfo->emp_lname}}</td>
                                <td>{{$enfo->ec_name}}</td>
                                <td>{{$enfo->ec_phone1}}</td>
                                <td>{{$enfo->ec_phone2}}</td>
                                <td>{{$enfo->ec_relation}}</td>
                                <td>{{$enfo->ec_address}}</td>

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
