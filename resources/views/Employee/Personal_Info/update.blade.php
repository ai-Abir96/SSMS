@extends('Dashboard.admin_dashboard')

@section('content')

<div class="card uper">
  <div class="card-header">
    Update Roles
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
    <form method="POST" action="{{ route('role_update', $role->id) }}">
      @csrf
      @method('PATCH')
          <div class="form-group">

              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" value="{{ $role->name }}"/>
          </div>

          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>

@endsection
