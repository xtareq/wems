@extends('admin2.layouts.app')
@section('title', '')



@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Employees <small>employees</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><button class="btn btn-success" onclick="window.open('{{route('admin.employees.create')}}','_self')"> <i class="fa fa-plus"></i> New Employee</button></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Obtained Leave</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                        $no =1;
                        @endphp
                        @foreach($employees as $employee)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->obtained_leave}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('admin.employees.edit',['id'=>$employee->user_id])}}" class="btn btn-warning"> <i class="fa fa-edit"></i>Edit</a>
                                    <a href="{{route('admin.employees.delete',['id'=>$employee->user_id])}}" class="btn btn-danger"><i class="fa fa-close"></i>Delete</a>
                                </div>
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">
                        {{$employees->links()}}
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
