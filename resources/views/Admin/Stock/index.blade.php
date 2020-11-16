
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
              <div class="card" >
                  <div class="card-header">{{ __('Stock Details') }}</div>

                  <table>
                    <tr >
                      <td>
                        <a href="{{ route('stock_create_page')}}"  class="btn btn-primary">
                          {{ __('Create New') }}
                      </a>
                    </td>

                    </tr>

                  </table>

                  <div class="card-body" >

                      <table id="_search"  class="table table-responsive-xl table-striped table-hover">
                        <thead>
                            <tr>
                              <td>Product Code</td>
                              <td>Product Name</td>
                              <td>Category</td>
                              <td>Sub Category</td>
                              <td>Supplier Name</td>
                              <td>Quantity</td>
                              <td>Stock Price</td>
                              <td>Description</td>
                              <td colspan="2">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stocks as $stock)
                            <tr>
                                <td>{{$stock->p_code}}</td>
                                <td>{{$stock->p_name}}</td>
                                <td>{{$stock->categories-> ct_name}}</td>
                                <td>{{$stock->subcategories-> sct_name}}</td>
                                <td>{{$stock->suppliers-> s_id}}</td>
                                <td>{{$stock->quantity}}</td>
                                <td>{{$stock->st_price}}</td>
                                <td>{{$stock->description}}</td>


                                <td><a href="{{ route('stock_update_page', $stock->id)}}" class="btn btn-primary">Edit</a></td>
                                <td><a onclick="update('{{$stock->id}}','{{$stock->quantity}}','{{$stock->st_price}}');" class="btn btn-primary" data-toggle="modal"data-target="#pq">Price/Quantity</a></td>
                                <td>
                                    <form action="{{ route('stock_delete', $stock->id)}}" method="post">
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


        <!-- - - - -  -  - - -  - - - -  - - Edit Status - -  - - - -  - - - - - - -->

          <!-- The Modal -->
          <div class="modal fade" id="pq">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Edit Status</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <form method="POST" action="{{ route('update_quantity_price' ) }}">
                    @csrf

                    <input type="hidden" name="id" id="id">
                      <div class="form-group row">
                          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

                          <div class="col-md-6">
                              <input id="quantity" type="number" min='0' class="form-control @error('name') is-invalid @enderror" name="quantity"  required autocomplete="name" autofocus>

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
                              <input id="price" type="text" min='0' class="form-control @error('name') is-invalid @enderror" name="st_price"  required autocomplete="name" autofocus>

                              @error('name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" >Save Changes</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
              </form>

              </div>
            </div>
          </div>





</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script >

  var myApp = new function () {
         this.printTable = function () {
             var tab = document.getElementById('toPrint');
             var win = window.open('', '', 'height=700,width=700');
             win.document.write(tab.outerHTML);
             win.document.close();
             win.print();
         }
     }


</script>

<script>
                function update(id,quantity,price)
                {
                  document.getElementById("id").value  = id;
                  document.getElementById("quantity").value  = quantity;
                  document.getElementById("price").value  = price;
                }
                function delete_cat(id)
                {
                    document.getElementById("cat_id").value  = id;
                }
</script>

@endsection
