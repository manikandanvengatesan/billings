   
    @include('header')
    <!-- Body starts -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="customers"><div class="box-part text-center">                        
                    <i class="fa fa-user-plus fa-3x" aria-hidden="true"></i>                    
                    <div class="title">
                        <h4>Customer Master</h4>
                    </div>                                      
                </div></a>
            </div>
            <div class="col-md-4">
                <a href="suppliers"><div class="box-part text-center">                        
                    <i class="fa fa-user-plus fa-3x" aria-hidden="true"></i>                    
                    <div class="title">
                        <h4>Supplier Master</h4>
                    </div>                                      
                </div></a>
            </div>
            <div class="col-md-4">
                <a href="invoice"><div class="box-part text-center">                        
                    <i class="fa fa-money fa-3x" aria-hidden="true"></i>                    
                    <div class="title">
                        <h4>Generate Invoice</h4>
                    </div>                                      
                </div></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="payable"><div class="box-part text-center">                        
                    <i class="fa fa-money fa-3x" aria-hidden="true"></i>                    
                    <div class="title">
                        <h4>Generate Payables</h4>
                    </div>                                      
                </div></a>
            </div>
            <div class="col-md-4">
                <a href="reports"><div class="box-part text-center">                        
                    <i class="fa fa-flag-o fa-3x" aria-hidden="true"></i>                    
                    <div class="title">
                        <h4>Reports</h4>
                    </div></a>                                    
                </div>
            </div>
        </div>
    </div>
    <!-- Body ends -->
@include('footer')
