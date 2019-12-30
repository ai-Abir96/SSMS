@extends('Dashboard.admin_dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Job Details of an Employee') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('Ejob_create') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Employee Id') }}</label>

                            <div class="col-md-6">
                              <select class="form-control" name="emp_id" >
                                @foreach ($einfos as $ef)
                                  <option value="{{ $ef->id }}" >{{ $ef->id }}  {{$ef->name}}</option>
                                @endforeach
                              </select>
                        </div>
                      </div>



                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Position Name') }}</label>

                            <div class="col-md-6">
                              <select class="form-control" name="position_id">
                                @foreach ($epsn as $ep)
                                  <option value="{{$ep->id}}">{{ $ep->name }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Salary ') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="number" class="form-control @error('name') is-invalid @enderror" name="salary" value="{{ old('salary') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    

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

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Signing Date') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="date" class="form-control @error('name') is-invalid @enderror" name="signing_date" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                                <button class="btn btn-primary">
                                    {{ __('Back') }}
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
