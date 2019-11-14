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
                  <div class="card-header">{{ __('Employee Status ') }}</div>

                  <div class="col-md-8 offset-md-0">
                      <a href="{{ route('Estatus_create_page')}}"  class="btn btn-primary">
                          {{ __('Create New') }}
                      </a>
                  </div>
                  <div class="card-body">

                      <table class="table table-striped">
                        <thead>
                            <tr>
                              <td>ID</td>
                              <td>Position Name</td>
                              <td colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($status as $st)
                            <tr>
                                <td>{{$st->id}}</td>
                                <td>{{$st->name}}</td>
                                <td><a href="{{route('Estatus_update_page',$st->id)}}" class="btn btn-primary">Edit</a></td>
                                <td>
                                    <form action="{{ route('Estatus_delete', $st->id) }}" method="post">
                                      @csrf
                                      @method('PATCH')
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
