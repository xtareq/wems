<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Leave as Leave;
use Carbon\Carbon;

class AdminController extends Controller
{

    public $delete;
    public $update;
    public $saved;
    public $warning;
    public $sent;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->delete =$this->alert('Data deleted Succefully','success');
        $this->saved =$this->alert('Data Saved Succefully','success');
        $this->update =$this->alert('Data Updated Succefully','success');
        $this->warning =$this->alert('Invalid! check your data carefully!','warning');
        $this->sent = $this->alert('Sent Succefully!','success');

    }


    public function alert($data = null , $type = null)
    {

        $notification = array(
            'message' => $data.'!',
            'alert-type' => $type
        );

        return $notification;
    }

    public function index()
    {
        return view('admin.dashboard');
    }


    //create employees

    public function create()
    {

    }

    public function leaves()
    {
        $data['leaves']= Leave::orderByRaw("FIELD(status , 'pending', 'accept', 'reject') ASC")->latest()->paginate(10);
        return view('admin.leaves.index',$data);
    }

    public function showLeave($id)
    {
        $data['leave']=Leave::find($id);
        return view('admin.leaves.show',$data);
    }

    public function acceptLeave($id)
    {
        $data['status']='accept';
        Leave::where('id',$id)->update($data);
        return redirect()->back();
    }

    public function rejectLeave($id)
    {
        $data['status']='reject';
        Leave::where('id',$id)->update($data);
        return redirect()->back();
    }

    public function showLeaveSummaryForm()
    {
        $data['leaves']=null;
        return view('admin.leaves.leave_summary',$data);
    }


    public function showLeaveSummary(Request $request)
    {
        $start_date=Carbon::parse($request->start_date);
        $end_date=Carbon::parse($request->end_date);

        $data['leaves'] = Leave::whereBetween('created_at',[$start_date,$end_date])->paginate(10);
        //dd($data['leaves']);
        return view('admin.leaves.leave_summary',$data);
    }


}
