@extends('Dashboard.admin_dashboard')

@section('content')
<style >
input[type=text] {
width: 130px;
-webkit-transition: width 0.4s ease-in-out;
transition: width 0.4s ease-in-out;
}

/* When the input field gets focus, change its width to 100% */
input[type=text]:focus {
width: 50%;
}
</style>

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
          <div class="col-md-12">
              <div class="card ">
                  <div class="card-header"><b>{{ __('Employee Contact Information') }}</b></div>

                  <div class="card-body">

                      <table id="_search"class="table table-responsive-xl table-striped table-hover">
                        <thead >
                            <tr >
                              <td><b>ID</b></td>
                              <td><b>Employee Name</b></td>
                              <td><b>Phone No</b></td>
                              <td><b>Alternate Phone No</b></td>
                              <td><b>Email</b></td>
                              <td><b>Present Address</b></td>
                              <td><b>Permanent Address</b></td>

                              <td colspan="2"><b>Action</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($einfo as $enfo)
                            <tr>
                                <td>{{$enfo->id}}</td>
                                <td>{{$enfo->emp_lname}}</td>
                                <td>{{$enfo->emp_phone1}}</td>
                                <td>{{$enfo->emp_phone2}}</td>
                                <td>{{$enfo->emp_email}}</td>
                                <td>{{$enfo->emp_preaddress}}</td>
                                <td>{{$enfo->emp_peraddress}}</td>


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
