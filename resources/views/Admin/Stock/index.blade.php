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
              <div class="card" >
                  <div class="card-header">{{ __('Stock Details') }}</div>

                  <table>
                    <tr >
                      <td>
                        <a href="{{ route('stock_create_page')}}"  class="btn btn-primary">
                          {{ __('Create New') }}
                      </a>
                    </td>
                    <td style="width:810px"></td>


                        <td>
                          <a onclick="myApp.printTable()" class="btn btn-default" bgcolor="gray"><i class="fa fa-print">Print Page</i>

                        </a>
                      </td>
                    </tr>

                  </table>

                  <div class="card-body" >

                      <table id="toPrint" class="table table-responsive-xl table-striped table-hover">
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


@endsection
