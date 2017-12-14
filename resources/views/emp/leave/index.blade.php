@extends('emp.layouts.app')
@section('title','Leaves')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Leaves <small>leaves</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                       <li><a href="{{route('emp.leave.create')}}" class="btn btn-success">Apply For Leave</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p class="text-muted font-13 m-b-30">

                    </p>
                    <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row"><div class="col-sm-6"><div class="dataTables_length" id="datatable_length">
                                    <label>Show <select name="datatable_length" aria-controls="datatable" class="form-control input-sm">
                                            10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select>
                                        entries</label></div></div>
                            <div class="col-sm-6"><div id="datatable_filter" class="dataTables_filter">
                                    <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="datatable"></label>
                                </div></div></div><div class="row"><div class="col-sm-12">
                                <table id="datatable" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 157px;">#</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 259px;">Application Id</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 117px;">Subject</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 60px;">Begin Date</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 60px;">End Date</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 60px;">Days</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 115px;">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 90px;">Action</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                    @php
                                    $no = 1;

                                    //dd($leaves);
                                    @endphp
                                    @foreach($leaves as $leave)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{$no++}}</td>
                                        <td>app-{{$leave->id}}</td>
                                        <td>{{$leave->subject}}</td>
                                        <td>{{$leave->start_date}}</td>
                                        <td>{{$leave->end_date}}</td>
                                        <td>{{$leave->count_leave}}</td>
                                        <td><span class="label
                                          <?php if($leave->status == 'success'):
                                                echo "label-success";
                                            elseif($leave->status == 'rejected'):
                                                echo "label-danger";

                                                else:
                                                echo "label-info";
                                            endif;?>
                                        ">
                                               <?php if($leave->status == 'success'):
                                                    echo "Granted";
                                                elseif($leave->status == 'rejected'):
                                                    echo "Rejected";

                                                else:
                                                    echo "Pending";
                                                endif;?>
                                            </span></td>
                                        <td><a href="" class="btn

                                         btn-primary">View</a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection