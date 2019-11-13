@extends('Dashboard.admin_dashboard')

@section('content')

<div class="card uper">
  <div class="card-header">
    Assign Roles to {{$user->name}}
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <form method="POST" action="{{ route('user_update', $user) }}">
      @csrf
      @method('PATCH')
          @foreach($roles as $role)
          <div class='form-check'>
            <input type="checkbox" name="roles[]" value="{{$role->id}}">
            <leble>{{$role->name}}</label>
          </div>
          @endforeach

          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>

@endsection
