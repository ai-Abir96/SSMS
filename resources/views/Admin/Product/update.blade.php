@extends((Auth::user()->roles->pluck('id')=='[1]') ? 'Dashboard.admin_dashboard' : 'Dashboard.salesman_dashboard')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create User Roles') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('product_update', $products->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product Code') }}</label>

                            <div class="col-md-6">
                              <select class="form-control" name="sp_id">
                                <option value="{{$products->stocks->id}}">{{ $products->stocks-> p_code }} - {{ $products->stocks-> p_name }}</option>
                                @foreach ($stocks as $stock)

                                  <option value="{{$stock->id}}">{{ $stock-> p_code }} - {{ $stock-> p_name }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product Image') }}</label>

                            <div class="col-md-6">
                              <input id="p_image" type="file"  name="p_image" placeholder="Image"  >

                                @error('p_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product Price[৳]') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="number" class="form-control @error('name') is-invalid @enderror" name="p_price"value="{{$products->p_price}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Discount[%]') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="number" class="form-control @error('name') is-invalid @enderror" name="p_discount" value="{{$products-> p_discount}}" required autocomplete="name" autofocus>

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
                                    {{ __('Update') }}
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
