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
                  <div class="card-header"><b>{{ __('Employee Job Status') }}</b></div>


                  <div class="card-body">

                      <table class="table table-responsive table-striped table-hover">
                        <thead>
                            <tr  class ="text-white" bgcolor="black" textcolor="white">
                              <td><b>Employee ID</b></td>
                              <td><b>Employee Name</b></td>
                              <td><b>Designation</b></td>
                              <td><b>Status</b></td>


                              <td colspan="2"><b>Action</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ejob as $ej )
                            <tr>
                                <td>{{$ej->emp_id}}</td>
                                <td>{{$ej->emp_infos->emp_lname}}</td>
                                <td>{{$ej->emp_pos->name}}</td>
                                @if($ej->status =='Active')
                                  <td class="bg-success">{{$ej->status}}</td>
                                @endif
                                @if($ej->status =='On Leave')
                                  <td class="bg-warning">{{$ej->status}}</td>
                                @endif
                                @if($ej->status =='Departed')
                                  <td class="bg-danger rounded">{{$ej->status}}</td>
                                @endif

                                <td><a onclick="update('{{$ej->id}}');"  class="btn btn-primary text-light" data-toggle="modal"data-target="#myModal">Update Status</a></td>

                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
  </div>



<!-- - - - -  -  - - -  - - - -  - - Edit Status - -  - - - -  - - - - - - -->

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Status</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="POST" action="{{ route('Ejob_update' ) }}">
            @csrf
            @method('PATCH')


          <input id="stat" type="hidden" class="form-control" name="id" />


          <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
              <div class="col-md-6">
                <select class="form-control" name="status">
                    <option>Active</option>
                    <option>On Leave</option>
                    <option>Departed</option>
                </select>
              </div>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Save Changes</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>

      </div>
    </div>
  </div>

<!--- - - - -  - -  - - - - - - - - - - -  -Edit Status done ------------------------------>
</div>



<script>
                function update(id)
                {
                    document.getElementById("stat").value  = id;

                }
</script>

@endsection
