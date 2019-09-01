    <html>
        <head>
            <style>
                table td 
                {
                table-layout:fixed;
                width:150px;
                overflow:hidden;
                word-wrap:break-word;
                }
            </style>
        </head>
    <body>
    <!-- Body starts -->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>Dear {{$invoice[0]->name}},</h4>
                <p></p>
                <p>Please find the below invoice details,</p>
                <p></p>
                <h4>Invoice No:GST/{{$invoice[0]->id}}/19-20</h4>
            </div>
            <div class="col-md-6">
                <h4>Date : {{$invoice[0]->date}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="table_id" class="display" border>
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Description</th>
                            <th>Unit</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0;?>
                        @foreach($invoice as $inv)
                        <tr>
                            <?php $amt = $inv->quantity * $inv->rate; $i+=1;?>
                            <td style="text-align: center">{{$i}}</td>
                            <td style="text-align: center">{{$inv->description}}</td>
                            <td style="text-align: center">{{$inv->unit}}</td>
                            <td style="text-align: center">{{$inv->quantity}}</td>
                            <td style="text-align: right">{{$inv->rate}}</td>
                            <td style="text-align: right">{{$amt}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="6" style="text-align: right">Rs. {{$invoice[0]->amount}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                    <h4 style="text-align: left">Maha Foundations Pvt Ltd</h4>
                    <p style="text-align: left">No-5/754 sabari salai, Madipakkam,Chennai-91</p>
                    <p style="text-align: left">GSTIN-33AAFCM0152P1ZG</p>	
            </div>
        </div>
    </div>
    <!-- Body ends -->
    </body>
</html>
