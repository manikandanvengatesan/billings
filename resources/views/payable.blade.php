@include('header')

    <!-- Body starts -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <legend>Payable</legend>
            </div>
        </div>
        <div class="row add-customer">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary" onclick="document.location.href='/dashboard';"><i class="fa fa-arrow-left" style="color:white" aria-hidden="true"></i> Back</button>
                <button type="button" style="float:right;" class="btn btn-primary" id="add_row"><i class="fa fa-pencil" style="color:white" aria-hidden="true"></i> Add</button>
            </div>
        </div>
        <form action="/createPayable" method="POST" id="form1">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="row">
            <div class="col-md-6">
                <label for="supplier">Supplier:</label>
                <select required name="supplier" id="supplier">
                    <option value="">Select Supplier</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                    @endforeach
                </select>
                <div class="cus_address">
                    <p class="mobile"></p>
                    <p class="email"></p>
                    <p class="address"></p>
                </div>
            </div>
            <div class="col-md-6">
                <h4 style="text-align: right">{{env('APP_NAME')}}</h4>
                <p style="text-align: right">{{env('APP_ADDRESS')}}</p>
                <p style="text-align: right">{{env('APP_GST')}}</p>	
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Description</th>
                            <th>Unit</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                            <th>Amount</th>
                            <th>Remarks</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="addr0" class="trRow">
                            <td>1</td>
                            <td><input required type="text" class="form-control" name="description" value=""></td>
                            <td><input required type="text" class="form-control" name="unit" value=""></td>
                            <td><input required type="text" class="form-control" name="quantity" value="" id="quantity"></td>
                            <td><input required type="text" class="form-control" name="rate" value="" id="rate"></td>
                            <td><input required type="text" class="form-control countable" name="amount" id="amount" value="" onChange="totalVal();"></td>
                            <td><input type="text" class="form-control" name="remarks" value=""></td>
                            <td><button type="button" class="btn btn-danger" id="remove_row"><i class="fa fa-trash" style="color:white" aria-hidden="true"></i> Delete</button></td>
                        </tr>
                        <tr id="addr1" class="trRow"></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
                <p style="text-align: right">Amount: <span id="sum">0</span></p>
                <input type="hidden" class="form-control" id="sumHidden" name="sumHidden" value="">
                <input type="hidden" class="form-control" id="count" name="count" value="">
            </div>
        </div>
        </form>
        <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
            <button style="float: right;" type="submit" form="form1" value="Submit" class="btn btn-primary"><i class="fa fa-print" style="color:white" aria-hidden="true"></i> Submit</button>
            </div>
        </div>
    </div>
    <!-- Body ends -->
    <script>
 $('#supplier').on('change',function(e)
 {
    console.log($('#supplier').val());
    var cus_id = $('#supplier').val();

    //ajax
    $.get('/supplier/' + cus_id, function (data)
    {
        console.log(data.address);
        $('.address').text("Address : "+data.address);
        $('.email').text("Email : "+data.email);
        $('.mobile').text("Mobile : "+data.mobile);
    });

 });
 </script>
@include('footer')
