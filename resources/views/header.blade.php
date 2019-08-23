<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{env('APP_NAME')}}</title>

        <!-- Jquery js -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Bootstrap css -->
        <link rel="stylesheet" href="{{ asset('libs/bootstrap-3.3.6-dist/css/bootstrap.min.css') }}" />
        <script src="{{ asset('libs/bootstrap-3.3.6-dist/js/bootstrap.min.js') }}"></script>
		<!-- Font Awesome -->
		<link rel="stylesheet" href="{{ asset('libs/font-awesome-4.6.3/css/font-awesome.min.css') }}" />
        <!-- Local css -->
        <link href="{{ asset('css/header.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/footer.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
        <!-- Datatable -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="{{ asset('js/invoice.js') }}"></script>
    </head>
    <body>
<!-- Header starts -->
<header class="header-fixed">
        <div class="header-limiter">
            <h1><a href="/">{{env('APP_NAME')}}</span></a></h1>
            <!-- <h1>{{Session::get('name')}}</h1> -->
            <a style="padding-left: 880px;" href="/logout">Logout</a>
            <!-- <nav>
            <a href="/" class="selected">Home</a>
            <a href="/about-us">About</a>
            <a href="/faq">FAQ</a>
            <a href="/contact">Contact</a>
            </nav> -->
        </div>
    </header>
    <div class="header-fixed-placeholder"></div>
    <!-- Header ends -->