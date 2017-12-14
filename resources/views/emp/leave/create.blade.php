@extends('emp.layouts.app')
@section('title','Dashboard')
@section('content')
    <div class="row ">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">

                </div>
                <div class="x_content">
                    <form action="{{route('emp.leave.create')}}" method="post" class="form-horizontal">
                        {{csrf_field()}}

                        <h3>Leave Application Form</h3>
                        <div class="form-gorup">
                            <label for="subject" class="control-label col-md-2">Subject:</label>
                            <div class="col-md-10">
                                <input type="text" id="subject" class="form-control" name="subject"
                                       value="{{old('subject')}}" required>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                            <label for="description" class=" control-label col-md-2">Description:</label>
                            <div class="col-md-10">
                                <textarea name="description" id="description" class="form-control" cols="100" rows="10"
                                >{{old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                            <label for="start_date" class="control-label col-md-2 col-lg-2">Start Date:</label>
                            <div class="col-lg-4 col-md-4">
                                <input type="date" id="start_date" class="form-control" name="start_date"
                                       value="{{old('start_date')}}"  required>
                            </div>

                            <label for="end_date" class=" control-label col-md-2 col-lg-2" required>
                                End Date:</label>
                            <div class="col-md-4 col-lg-4">
                                <input type="date" id="end_date" class="form-control" name="end_date"
                                {{old('end_date')}}>
                            </div>


                        </div>
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                               <button type="submit" class="btn btn-success btn-block"> <span class="fa fa-check"></span>Send</button>

                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection