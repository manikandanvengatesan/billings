@include('header')

    <!-- Body starts -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <legend>Invoice</legend>
            </div>
        </div>
        <div class="row add-customer">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary" onclick="document.location.href='/dashboard';"><i class="fa fa-arrow-left" style="color:white" aria-hidden="true"></i> Back</button>
                <button type="button" style="float:right;" class="btn btn-primary" id="add_row"><i class="fa fa-pencil" style="color:white" aria-hidden="true"></i> Add</button>
            </div>
        </div>
        <form action="/action_page.php" method="post" id="form1">
        <div class="row">
            <div class="col-md-6">
                <label for="client">Client:</label>
                <select  name="client" id="client">
                    <option value="">Select Client</option>
                    @foreach($customers as $customer)
                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <h4 style="text-align: right">Maha Foundations Pvt Ltd</h4>
                <p style="text-align: right">No-5/754 sabari salai, Madipakkam,Chennai-91</p>
                <p style="text-align: right">Invoice no-GST/024/18-19</p>
                <p style="text-align: right">GSTIN-33AAFCM0152P1ZG</p>	
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
                            <th>Qty</th>
                            <th>Rate</th>
                            <th>Amount</th>
                            <th>Remarks</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="addr0" class="trRow">
                            <td>1</td>
                            <td><input type="text" class="form-control" name="description" value=""></td>
                            <td><input type="text" class="form-control" name="unit" value=""></td>
                            <td><input type="text" class="form-control" name="quantity" value="" id="quantity"></td>
                            <td><input type="text" class="form-control" name="rate" value="" id="rate"></td>
                            <td><input type="text" class="form-control countable" name="amount" id="amount" value="" onChange="totalVal();"></td>
                            <td><input type="text" class="form-control" name="remarks" value=""></td>
                            <td><button type="button" class="btn btn-primary" id="remove_row"><i class="fa fa-trash" style="color:white" aria-hidden="true"></i> Delete</button></td>
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

@include('footer')
