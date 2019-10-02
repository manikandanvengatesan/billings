@include('header')

    <!-- Body starts -->
    <div class="container">
        <div class="row">
            <legend><h2>Billing System</h2></legend>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="login-start">
                    <h3 class="login-heading">Login</h3>                
                </div>
                <div class="form-data">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (isset($message))
                    <div class="alert alert-danger">
                            <ul>
                                {{ $message }}
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="login">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="telephone" class="form-control" value="9944825292" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" value="m@n!@123" class="form-control" name="password">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        </div>
                        <button type="submit" class="btn btn-default buttonColor">Submit</button>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    <!-- Body ends -->

@include('footer')
