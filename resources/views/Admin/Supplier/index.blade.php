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
              <div class="card">
                  <div class="card-header">{{ __('Supplier Information') }}</div>

                  <div class="col-md-8 offset-md-0">
                      <a href="{{ route('sup_create_page')}}"  class="btn btn-primary">
                          {{ __('Create New') }}
                      </a>
                  </div>
                  <div class="card-body">

                      <table class="table table-responsive-xl table-striped table-hover">
                        <thead>
                            <tr>
                              <td>Supplier ID</td>
                              <td>Supplier Name</td>
                              <td>Phone No</td>
                              <td>Address</td>
                              <td>Description</td>

                              <td colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody id="_search">
                            @foreach($suppliers as $supplier)
                            <tr>
                                <td>{{$supplier->s_id}}</td>
                                <td>{{$supplier->s_name}}</td>
                                <td>{{$supplier->s_phone}}</td>
                                <td>{{$supplier->s_address}}</td>
                                <td>{{$supplier->description}}</td>
                                <td><a href="{{ route('sup_update_page', $supplier->id)}}" class="btn btn-primary">Edit</a></td>
                                <td>
                                    <form action="{{ route('sup_delete', $supplier->id)}}" method="post">
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
