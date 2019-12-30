@extends((Auth::user()->roles->pluck('name')=='Admin') ? 'Dashboard.admin_dashboard' : 'Dashboard.salesman_dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create User Roles') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('stock_update', $stocks->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product Code') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="p_code" value="{{$stocks->p_code}}"required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="p_name" value="{{$stocks->p_name}}"required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                            <div class="col-md-6">
                              <select id="cat" class="form-control" name="fcat_id">
                                <option >----Select a Category----</option>
                                @foreach ($categories as $key => $category)

                                  <option value="{{$key}}" >{{ $category }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Sub Category Name') }}</label>

                            <div class="col-md-6">
                              <select id="subcat" class="form-control" name="fscat_id">


                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Supplier Name') }}</label>

                            <div class="col-md-6">
                              <select class="form-control" name="fsup_id">
                                @foreach ($suppliers as $supplier)
                                  <option value="{{$supplier->id}}">{{$supplier->s_id}}-{{ $supplier-> s_name }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="number" class="form-control @error('name') is-invalid @enderror" name="quantity" value="{{$stocks->quantity}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Stock Price') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="st_price" value="{{$stocks->st_price}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Description ') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="description" value="{{$stocks->description}}"required autocomplete="name" autofocus>

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



<script src="{{ asset('js/ajax-select-query.js') }}"></script>
<script type="text/javascript">
$('#cat').change(function(){
    var fcat_id = $(this).val();

    if(fcat_id){
        $.ajax({
           type:"GET",
           url:"{{url('/stocks/get-subcat-list')}}?cat_id="+fcat_id,
           success:function(res){
            if(res){
                $("#subcat").empty();
                $("#subcat").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#subcat").append('<option value="'+key+'">'+value+'</option>');
                });

            }else{
               $("#subcat").empty();
            }
           }
        });
    }else{
        $("#subcat").empty();

    }
   });

</script>
@endsection
