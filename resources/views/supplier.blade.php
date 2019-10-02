@include('header')

    <!-- Body starts -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <legend>Supplier Master</legend>
            </div>
        </div>
        <div class="row add-customer">
            <div class="col-md-12">
            <button type="button" class="btn btn-primary" onclick="document.location.href='/dashboard';"><i class="fa fa-arrow-left" style="color:white" aria-hidden="true"></i> Back</button>  
            <button type="button" style="float:right;" class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="fa fa-user-plus" style="color:white" aria-hidden="true"></i> Add New Supplier</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>S No.</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $sno = 0; ?>
                    @foreach($suppliers as $supplier)
                        <tr>
                            <td>{{$sno+=1}}</td>
                            <td>{{$supplier->name}}</td>
                            <td>{{$supplier->mobile}}</td>
                            <td>{{$supplier->email}}</td>
                            <td>{{$supplier->address}}</td>
                            <td style="text-align: center;"><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal{{$sno}}"><i class="fa fa-pencil" style="color:white" aria-hidden="true"></i></button></td>
                            <!-- Modal for editing supplier -->
                            <div class="modal fade" id="myModal{{$sno}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="modal-title">Edit Supplier</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="/supplier">
                                        @method('PUT')
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="id" value="{{$supplier->id}}">
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input class="form-control" type="text" id="name" name="name" value="{{$supplier->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile:</label>
                                            <input class="form-control" type="text" id="mobile" name="mobile" value="{{$supplier->mobile}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input class="form-control" type="email" id="email" name="email" value="{{$supplier->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label>GST No:</label>
                                            <input class="form-control" type="text" id="gst_no" name="gst_no" value="{{$supplier->gst_no}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Address:</label>
                                            <textarea class="form-control" rows="4" id="address" name="address">{{$supplier->address}}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btnSave" class="btn btn-primary">Save</button>
                                    </div>
                                    </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- <td><button type="button" class="btn btn-primary"><i class="fa fa-trash" style="color:white" aria-hidden="true"></i></button></td> -->
                            <td style="text-align: center;"><a href="/deleteSupplier/{{$supplier->id}}" class="btn btn-xs btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" style="color:white" aria-hidden="true"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- Modal for adding new supplier-->
                <div class="modal fade" id="addModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title">Add Supplier</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="/supplier">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label>Name:</label>
                                <input class="form-control" type="text" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label>Mobile:</label>
                                <input class="form-control" type="text" id="mobile" name="mobile">
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input class="form-control" type="email" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label>GST No:</label>
                                <input class="form-control" type="text" id="gst_no" name="gst_no">
                            </div>
                            <div class="form-group">
                                <label>Address:</label>
                                <textarea class="form-control" rows="4" id="address" name="address"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="btnSave" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>
        </div>
    </div>
    <!-- Body ends -->

    @include('footer')
