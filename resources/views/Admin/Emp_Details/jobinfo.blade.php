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
          <div class="col-md-12">
              <div class="card " >
                  <div class="card-header"><b>{{ __('Employee Job Information') }}</b></div>

                  <div class="col-md-8 offset-md-0">
                      <a href="{{ route('Ejob_create_page')}}"  class="btn btn-primary">
                          {{ __('Create New') }}
                      </a>

                  </div>



                  <div class="card-body">

                      <table  id="_search" class="table table-responsive-xl table-striped table-hover">
                        <thead>
                            <tr >
                              <td><b>Employee ID</b></td>
                              <td><b>Employee Name</b></td>
                              <td><b>Designation</b></td>
                              <td><b>Salaray</b></td>
                              <td><b>Bonus</b></td>
                              <td><b>Joining Date</b></td>
                              <td><b>Departing Date</b></td>

                              <td colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ejob as $ej)
                            <tr>
                                <td>{{$ej->emp_id}}</td>
                                <td>{{$ej->jusers->name}}</td>
                                <td>{{$ej->positions->name}}</td>
                                <td>{{$ej->salary}}</td>
                                <td>{{$ej->bonus}}</td>
                                <td>{{$ej->signing_date}}</td>
                                <td>{{$ej->departing_date}}</td>

                                <td><a onclick="updatesalary('{{$ej->id}}','{{$ej->salary}}');"  class="btn btn-primary text-light" data-toggle="modal"data-target="#salaryModal">Salary</a></td>
                                <td><a onclick="updateresign('{{$ej->id}}','{{$ej->departing_date}}');"  class="btn btn-primary text-light" data-toggle="modal"data-target="#resignModal">Resign</a></td>
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

<!-- - - - -  -  - - -  - - - -  - - Edit Salary - -  - - - -  - - - - - - -->

  <!-- The Modal -->
  <div class="modal fade" id="salaryModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Increase Salary</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form id="salaryModal" method="POST" action="{{route('salary_update')}}">
            @csrf
            @method('PATCH')


          <input id="salary_id" type="hidden" class="form-control" name="id" />


          <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Salary ') }}</label>

              <div class="col-md-6">
                  <input id="slry" type="number" class="form-control @error('number') is-invalid @enderror" name="salary"  required autocomplete="number" autofocus>

                  @error('number')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
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
</div>

<!--- - - - -  - -  - - - - - - - - - - -  -Edit Status done ------------------------------>


<!-- - - - -  -  - - -  - - - -  - - Edit Salary - -  - - - -  - - - - - - -->

  <!-- The Modal -->
  <div class="modal fade" id="resignModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Resign</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form id ="resignModal"method="POST" action="{{ route('resign_update' ) }}">
            @csrf
            @method('PATCH')


          <input id="resign_id" type="hidden" class="form-control" name="id" />


          <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Resign Update ') }}</label>

              <div class="col-md-6">
                  <input id="resn" type="date" class="form-control @error('date') is-invalid @enderror" name="departing_date"   >

                  @error('date')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
              <div class="col-md-6">

                <select class="form-control" name="status">
                    <option>Departed</option>
                </select>
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
</div>



<script>
                function updatesalary(id,salary)
                {
                  document.getElementById("salary_id").value  = id;
                  document.getElementById("slry").value  = salary;

                }
                function updateresign(id,departing_date)
                {
                  document.getElementById("resign_id").value  = id;
                  document.getElementById("resn").value  = departing_date;

                }
</script>


@endsection
