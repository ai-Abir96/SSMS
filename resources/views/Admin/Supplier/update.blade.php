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
    <form method="POST" action="{{ route('sup_update', $supplier->id) }}">
      @csrf
      @method('PATCH')
          <div class="form-group">

              <label for="name">Supplier ID:</label>
              <input type="text" class="form-control" name="s_id" value="{{ $supplier->s_id }}"/>
          </div>
          <div class="form-group">

              <label for="name">Supplier Name:</label>
              <input type="text" class="form-control" name="s_name" value="{{ $supplier->s_name }}"/>
          </div>
          <div class="form-group">

              <label for="name">Contact No:</label>
              <input type="number" class="form-control" name="s_phone" value="{{ $supplier->s_phone }}"/>
          </div>
          <div class="form-group">

              <label for="name">Address:</label>
              <input type="text" class="form-control" name="s_address" value="{{ $supplier->s_address }}"/>
          </div>
          <div class="form-group">

              <label for="name">Description:</label>
              <input type="text" class="form-control" name="description" value="{{ $supplier->description }}"/>
          </div>


          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>

@endsection
