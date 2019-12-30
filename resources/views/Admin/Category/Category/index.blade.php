@extends((Auth::user()->roles->pluck('name')=='Admin') ? 'Dashboard.admin_dashboard' : 'Dashboard.salesman_dashboard')

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
                  <div class="card-header">{{ __('Categories') }}</div>

                  <div class="col-md-8 offset-md-0">
                      <a class="btn btn-primary" data-toggle="modal"data-target="#cat_createModal">
                          {{ __('Create New') }}
                      </a>
                  </div>
                  <div class="card-body">

                      <table id="_search"class="table table-striped">
                        <thead>
                            <tr>
                              <td>Category Name</td>
                              <td>Description</td>
                              <td colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category->ct_name}}</td>
                                <td>{{$category->ct_description}}</td>
                                <td><a
                                        onclick="update_cat('{{$category->id}}',
                                                           '{{$category->ct_name}}',
                                                           '{{$category->ct_description}}');"
                                      class="btn btn-primary" data-toggle="modal"data-target="#cat_editModal">Edit</a></td>

                                <td><a onclick="delete_cat('{{$category->id}}');"class="btn btn-danger" data-toggle="modal"data-target="#cat_deleteModal">Delete</a></td>


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
  <div class="modal fade" id="cat_createModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Category</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="POST" action="{{ route('cat_create' ) }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                <div class="col-md-6">
                    <input  type="text" class="form-control @error('ct_name') is-invalid @enderror" name="ct_name" value="{{ old('ct_name') }}" required autocomplete="name" autofocus>

                    @error('ct_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                <div class="col-md-6">
                    <input  type="text" class="form-control @error('ct_description') is-invalid @enderror" name="ct_description" value="{{ old('ct_description') }}" required autocomplete="name" autofocus>

                    @error('ct_description')
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
  <!-- - - - -  -  - - -  - - - -  - - create Category end - -  - - - -  - - - - - - -->





        <!-- - - - -  -  - - -  - - - -  - - Edit Category - -  - - - -  - - - - - - -->

        <!-- The Modal -->
          <div class="modal fade" id="cat_editModal">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Edit Category</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form method="POST" action="{{ route('cat_update' ) }}">
                    @csrf
                    @method('PATCH')


                  <input id="ct_id" type="hidden" class="form-control" name="id" />


                  <div class="form-group">

                      <label for="name">Category Name:</label>
                      <input id="ct_name" type="text" class="form-control" name="ct_name" />
                  </div>
                  <div class="form-group">

                      <label for="name">Description:</label>
                      <input id="ct_description" type="text" class="form-control" name="ct_description" />
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
          <div class="modal fade" id="cat_deleteModal">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Delete Category</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form method="POST" action="{{ route('cat_delete' ) }}">
                    @csrf
                    @method('PATCH')


                  <input id="cat_id" type="hidden" class="form-control" name="id" />

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
                function update_cat(id,ct_name,ct_description)
                {
                    document.getElementById("ct_id").value  = id;
                    document.getElementById("ct_name").value  = ct_name;
                    document.getElementById("ct_description").value  = ct_description;
                }
                function delete_cat(id)
                {
                    document.getElementById("cat_id").value  = id;
                }
</script>





@endsection
