<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEMS - @yield('title') </title>


    <link rel="stylesheet" href="{{asset('css/vendor.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/datepicker3.css') }}" />
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">


    <style>

        .a {
            box-shadow: 0px 2px 4px red;
            margin:5px;
        }
        .p{
            box-shadow: 0px 2px 4px lime;
            margin:5px;
        }
        .navbar{
            background-color: #2F4050;
            background-image: url(/css/patterns/header-profile.png);
        }
        .page-heading{
            box-shadow:0px 4px 8px;
        }

        .btn-xsuccess{
            background-color: #01a90e;
            border-color: #069e12;
            color:snow !important;
            border-radius: 0;
            border-left: 10px solid #1b9a13;
            margin-top: 30px;

        }
        .form-control{
            background-color: snow;
            border :1px solid #86c5ea;
        }
        input[type = text]{
            border :1px solid #86c5ea;
        }

        select{
            border :1px solid #86c5ea;
        }

        .ibox{
            box-shadow:2px 4px 10px;
        }
        .ibox-title{
            color:snow;
            box-shadow:0px 2px 4px #084f92;
            background:#de124b;
        }
        .ibox-content{
            box-shadow:0px 2px 4px #de124b;
        }

        .nav-tabs>li{
            background: #1c50c6 !important;
            border-left: 5px solid #01a90e !important;
        }
        .wrapper-content{

        }
        .tabs-container .nav-tabs > li.active > a, .tabs-container .nav-tabs > li.active > a:hover, .tabs-container .nav-tabs > li.active > a:focus {
            color: blue;
            background-color: #f99a23;
        }

    </style>

</head>
<body ng-app="xtareq">
@php

    $modules = App\Module::all();
    use App\Setting as Setting;
    $sys_name= Setting::settings('system_name');
    $sys_email = Setting::settings('system_email');
@endphp

<!-- Wrapper-->
<div id="wrapper">

    <!-- Navigation -->
@include('admin.layouts.navigation')

<!-- Page wraper -->
    <div id="page-wrapper" class="gray-bg">

        <!-- Page wrapper -->
    @include('admin.layouts.topnavbar')

    <!-- Main view  -->
    @yield('content')

    <!-- Footer -->
        @include('admin.layouts.footer')

    </div>
    <!-- End page wrapper-->

</div>
<!-- End wrapper-->

<script src="{{ asset('js/jquery.min.js')}}" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js"></script>
<script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/xtareq.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/datatables.min.js')}}" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@section('scripts')



@show
<!-- Page-Level Scripts -->
<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [


                {extend: 'print',
                    message: 'This print was produced using the Print button for DataTables',

                    customize: function (win){

                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');

                    }
                }
            ]

        });

    });

</script>
<script>
            @if(Session::has('message'))

    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>
</body>
</html>
