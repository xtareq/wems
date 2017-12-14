@extends('admin2.layouts.app')
@section('title','Leaves')
@section('content')


    <div class="row" >
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <a href="{{route('admin.leave.summary')}}" class="btn btn-success">Search Summary</a>
                </div>
                <div class="x_content">
                    <table class="table table-bodered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>Subject</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Count</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php

                            $no =1;
                        @endphp
                        @foreach($leaves as $leave)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{App\User::find($leave->emp_id)->name}}</td>
                                <td>{{$leave->subject}}</td>
                                <td>{{Carbon::parse($leave->start_date)->toFormattedDateString()}}</td>
                                <td>{{Carbon::parse($leave->end_date)->toFormattedDateString()}}</td>
                                <td>{{$leave->count_leave}}</td>
                                <td>
                                    @if($leave->status == 'pending')
                                        <span class="label label-primary"><i class="fa fa-refresh"></i> Pending</span>
                                    @elseif($leave->status == 'accept')
                                        <span class="label label-success"> <i class="fa fa-check"></i> Accepted</span>
                                    @else
                                        <span class="label label-danger"> <i class="fa fa-close"></i> Rejected</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('admin.leave.show',['id'=>$leave->id])}}"  class="btn btn-primary">
                                            <i class="fa fa-search"></i> View</a>
                                        <a href="{{route('admin.leave.accept',['id'=>$leave->id])}}" class="btn btn-success">
                                            <i class="fa fa-check"></i> Accept</a>
                                        <a href="{{route('admin.leave.reject',['id'=>$leave->id])}}" class="btn btn-danger">
                                            <i class="fa fa-close"></i> Reject</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">{{$leaves->links()}}</div>
                </div>
            </div>

    </div>
    </div>
@endsection