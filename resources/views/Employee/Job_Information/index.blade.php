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
              <div class="card " >
                  <div class="card-header"><b>{{ __('Employee Salary') }}</b></div>

                  <div class="col-md-8 offset-md-0">
                      <a href="{{ route('Ejob_create_page')}}"  class="btn btn-primary">
                          {{ __('Create New') }}
                      </a>
                  </div>
                  <div class="card-body">

                      <table id="_search" class="table table-responsive table-striped table-hover">
                        <thead>
                            <tr >
                              <td><b>Employee ID</b></td>
                              <td><b>Employee Name</b></td>
                              <td><b>Designation</b></td>
                              <td><b>Salary</b></td>
                              <td><b>Bonus</b></td>
                              <td><b>Status</b></td>
                              <td><b>Joining Date</b></td>
                              <td><b>Resign Date</b></td>

                              <td colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ejob as $ej)
                            <tr>
                                <td>{{$ej->emp_id}}</td>
                                <td>{{$ej->emp_infos->emp_lname}}</td>
                                <td>{{$ej->emp_pos->name}}</td>
                                <td>{{$ej->salary}}</td>
                                <td>{{$ej->bonus}}</td>
                                <td>{{$ej->status}}</td>
                                <td>{{$ej->signing_date}}</td>
                                <td>{{$ej->departing_date}}</td>

                                <td><a href="" class="btn btn-primary">Edit</a></td>
                                <td>
                                    <form action="" method="post">
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
