<!DOCTYPE html>
<html lang="en">
@include('admin2.partials._head')

<body class="nav-md" >
<div class="container body" ng-app="xapp" ng-controller="xctrl" >

    <div class="main_container">

    {{--top nav--}}
    @include('admin2.partials._sidenav')
    {{--/topnav--}}

    <!-- top navigation -->
    @include('admin2.partials._topnav')
    <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main" >
            <div class="page-title">
                <div class="title_left">
                    <h3>@yield('title')</h3>
                </div>

                <div class="title_right">

                </div>
            </div>
            <div class="clearfix"></div>
            <div class="data-pjax" style="min-height: 550px;">
                @yield('content')

            </div>
        </div>
        <!-- /page content -->
        <div class="clearfix"></div>
        <!-- footer content -->
    @include('admin2.partials._footer')
    <!-- /footer content -->
    </div>
</div>



<script src="{{asset('js/app.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@include('admin2.partials._notification')
@stack('scripts')


</body>
</html>