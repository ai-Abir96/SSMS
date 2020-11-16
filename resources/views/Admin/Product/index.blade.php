@extends((Auth::user()->roles->pluck('id')=='[1]') ? 'Dashboard.admin_dashboard' : 'Dashboard.salesman_dashboard')

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
                  <div class="card-header">{{ __('Product Details') }}</div>

                  <div class="col-md-4 offset-md-0">
                      <a href="{{ route('product_create_page')}}"  class="btn btn-primary">
                          {{ __('Create New') }}
                      </a>
                  </div>
                  <div class="card-body">

                      <table id="_search" class="table table-responsive-xl table-striped table-hover">
                        <thead>
                            <tr>
                              <td>Product Code</td>
                              <td>Product Name</td>
                              <td>Product Image</td>
                              <td>Price[৳]</td>
                              <td>Discount[%]</td>
                              <td colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->stocks->p_code}}</td>
                                <td>{{$product->stocks->p_name}}</td>
                                <td><img src="{{ asset('Images/Product_Image') }}/{{ $product->p_image }}" class="rounded" alt="{{ $product->p_image }}" style="width:50px;height:50px";></td>
                                <td>{{$product->p_price}}</td>
                                <td>{{$product->p_discount}}</td>

                                <td><a href="{{ route('product_update_page', $product->id)}}" class="btn btn-primary">Edit</a></td>
                                <td>
                                    <form action="{{ route('product_delete', $product->id)}}" method="post">
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
