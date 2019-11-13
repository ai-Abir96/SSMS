@extends('Dashboard.admin_dashboard')

@section('content')

<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif

  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ __('User Table') }}</div>

                  <div class="col-md-8 offset-md-0">
                      <a href=""  class="btn btn-primary">
                        <!-- {{ route('role_create_page')}} -->
                          {{ __('Register New') }}
                      </a>
                  </div>
                  <div class="card-body">

                      <table class="table table-striped">
                        <thead>
                            <tr>
                              <td>Id</td>
                              <td>Name</td>
                              <td>Email</td>
                              <td>Role</td>
                              <td colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{implode(',',$user->roles()->get()->pluck('name')->toArray())}}</td>
                                <td><a href="{{ route('user_update_page', $user->id)}}" class="btn btn-primary">Assign Role</a></td>
                                <td>
                                    <form action="{{ route('user_delete', $user->id)}}" method="post">
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
