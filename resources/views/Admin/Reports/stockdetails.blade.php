
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
                      <td style="width:810px"></td>


                        <td>
                          <a onclick="myApp.printTable()" class="btn btn-default" bgcolor="gray"><i class="fa fa-print">Print Page</i>

                        </a>
                      </td>
                    </tr>

                  </table>

                  <div id="toPrint" class="card-body" >
                    <h3><center>SSMS</center></h3>
                    <h4>Empty Stock Report</h4>
                      <table id="_search"  class="table table-responsive-xl table-bordered table-hover">
                        <thead>
                            <tr>
                              <td>Product Code</td>
                              <td>Product Name</td>
                              <td>Category</td>
                              <td>Sub Category</td>
                              <td>Supplier Name</td>
                              <td>Quantity</td>
                              <td>Stock Price</td>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stockdetails as $stock)
                            <tr>
                                <td>{{$stock->p_code}}</td>
                                <td>{{$stock->p_name}}</td>
                                <td>{{$stock->categories-> ct_name}}</td>
                                <td>{{$stock->subcategories-> sct_name}}</td>
                                <td>{{$stock->suppliers-> s_id}}</td>
                                <td>{{$stock->quantity}}</td>
                                <td>{{$stock->st_price}}</td>


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
