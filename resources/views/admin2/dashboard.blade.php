@extends('admin2.layouts.app')
@section('title','Dashboard')
@section('content')
    <div class="container">
        <div class="row top_tiles">
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-users"></i></div>
                    <div class="count">{{count(App\User::where('role','emp')->get())}}</div>
                    <h3><a href="#">Employees</a></h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="count">1</div>
                    <h3><a href="#">Admin</a></h3>
                </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats">
                    <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                    <div class="count">4</div>
                    <h3><a href="#">Leave Requests</a></h3>
                </div>
            </div>
        </div>
    </div>

@endsection