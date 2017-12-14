@extends('admin2.layouts.app')
@section('title', 'Main page')
@section('content')


<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2> Edit Employee</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{route('admin')}}">Home</a>
                        </li>
                        <li>
                            <a>Edit</a>
                        </li>
                     
                    </ol>
                </div>
                <div class="col-lg-2">
 <a href="{{route('admin.employees.create')}}" class="btn btn-xsuccess pull-right">Add Employee</a>
                </div>
                
</div>`
 <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Edit {{$emp->name}}</h5>
                            
                        </div>
                        <div class="ibox-content">
                            <form class="form-horizontal" action="{{route('admin.employees.update',$emp->id)}}" method="post">
                              {{csrf_field()}}
                              {{ method_field('PATCH') }}
                              <input type="hidden" name="id" value="{{$emp->id}}">
                            
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} ">
                                <label class="col-lg-2 control-label">Employee Name :</label>
                                    <div class="col-lg-10">
                                    <input type="text" name="name" placeholder="e.g: John Doe" class="form-control" required="required" value="{{$emp->name}}">
                                        @if($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name')}}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }} ">
                                <label class="col-lg-2 control-label">Email :</label>
                                    <div class="col-lg-10">
                                    <input type="email" name="email" placeholder="e.g: john@example.com" class="form-control" required="required" autofocus value="{{$emp->email}}">
                                        @if($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group ">
                                <label class="col-lg-2 control-label">Obtained Leave (optional) :</label>
                                    <div class="col-lg-10">
                                    <input type="text" name="obtained_leave" placeholder="e.g: 10, 15" class="form-control" value="{{$obtained_leave}}">
                                    </div>
                                </div>



                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-lg-2 control-label">Password :</label>
                                    <div class="col-lg-10">
                                    <input type="password" name="password" placeholder="e.g. ********" class="form-control" required="required">

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>



                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-sm btn-primary btn-block" type="submit"><i class="fa fa-check"></i>&nbsp;Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                </div>
            </div>
@endsection
