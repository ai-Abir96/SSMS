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
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('Sub Categories') }}</div>

                  <div class="col-md-8 offset-md-0">
                      <a class="btn btn-primary" data-toggle="modal"data-target="#scat_createModal">
                          {{ __('Create New') }}
                      </a>
                  </div>
                  <div class="card-body">

                      <table class="table table-striped">
                        <thead>
                            <tr>
                              <td>Sub Category Name</td>
                              <td>Description</td>
                              <td colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($scategories as $scategory)
                            <tr>
                                <td>{{$scategory->sct_name}}</td>
                                <td>{{$scategory->sct_description}}</td>
                                <td><a
                                        onclick="update_scat('{{$scategory->id}}',
                                                           '{{$scategory->sct_name}}',
                                                           '{{$scategory->sct_description}}');"
                                      class="btn btn-primary" data-toggle="modal"data-target="#scat_editModal">Edit</a></td>

                                <td><a onclick="delete_scat('{{$scategory->id}}');"class="btn btn-danger" data-toggle="modal"data-target="#scat_deleteModal">Delete</a></td>

                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div>
        </div>


  <!-- - - - -  -  - - -  - - - -  - - create Category - -  - - - -  - - - - - - -->
  <!-- The Modal -->
  <div class="modal fade" id="scat_createModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Category</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="POST" action="{{ route('scat_create' ) }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Sub Category Name') }}</label>

                <div class="col-md-6">
                    <input  type="text" class="form-control @error('ct_name') is-invalid @enderror" name="sct_name" value="{{ old('ct_name') }}" required autocomplete="name" autofocus>

                    @error('sct_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                <div class="col-md-6">
                    <input  type="text" class="form-control @error('sct_description') is-invalid @enderror" name="sct_description" value="{{ old('ct_description') }}" required autocomplete="name" autofocus>

                    @error('sct_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" >Create</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>

      </div>
    </div>
  </div>
  <!-- - - - -  -  - - -  - - - -  - - create Sub Category end - -  - - - -  - - - - - - -->





        <!-- - - - -  -  - - -  - - - -  - - Edit Sub Category - -  - - - -  - - - - - - -->

        <!-- The Modal -->
          <div class="modal fade" id="scat_editModal">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Edit Category</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form method="POST" action="{{ route('scat_update' ) }}">
                    @csrf
                    @method('PATCH')


                  <input id="sct_id" type="hidden" class="form-control" name="id" />


                  <div class="form-group">

                      <label for="name">Sub Category Name:</label>
                      <input id="sct_name" type="text" class="form-control" name="sct_name" />
                  </div>
                  <div class="form-group">

                      <label for="name">Description:</label>
                      <input id="sct_description" type="text" class="form-control" name="sct_description" />
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

        <!--- - - - -  - -  - - - - - - - - - - -  -Edit Category done ------------------------------>




        <!-- - - - -  -  - - -  - - - -  - - Delete Category - -  - - - -  - - - - - - -->


        <!-- The Modal -->
          <div class="modal fade" id="scat_deleteModal">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Delete Category</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form method="POST" action="{{ route('scat_delete' ) }}">
                    @csrf
                    @method('PATCH')


                  <input id="scat_id" type="hidden" class="form-control" name="id" />

                  <strong>Are you syre you want to delete?</strong>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" >Delete</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </form>

              </div>
            </div>
          </div>

        <!--- - - - -  - -  - - - - - - - - - - -  -Delete Category done ------------------------------>






</div>


<script>
                function update_scat(id,sct_name,sct_description)
                {
                    document.getElementById("sct_id").value  = id;
                    document.getElementById("sct_name").value  = sct_name;
                    document.getElementById("sct_description").value  = sct_description;
                }
                function delete_scat(id)
                {
                    document.getElementById("scat_id").value  = id;
                }
</script>





@endsection
