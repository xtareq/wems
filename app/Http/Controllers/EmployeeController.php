<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as User;
use Auth;
use Carbon\Carbon;
use App\Notifications\NotifyAdmin;
use App\Leave as Leave;
use App\Setting as Setting;
use Illuminate\Support\Facades\Input;


class EmployeeController extends Controller
{
    //

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
        return view('emp.dashboard');
    }

    public function leaves()
    {
        $data['leaves']=Leave::where('emp_id',Auth::id())->get();

        return view('emp.leave.index',$data);
    }
    public function createLeaveApplication()
    {
        return view('emp.leave.create');
    }

    public function storeLeave(Request $request)
    {
        $start =Carbon::parse($request->start_date);
        $start_name = $start->format("D");

        $end = Carbon::parse($request->end_date);
        $end_name = $end->format("D");

        //difference between two dates
        $diff = $end->diffInDays($start) + 1;

        //get weekends from setting table through setting model
        $weekend = Setting::where('name','weekend')->first();
        $weekend = json_decode($weekend->data);

        //checking dates
        if(in_array($start_name,$weekend) or in_array($end_name,$weekend)):

            return redirect()
                    ->back()
                    ->with($this->alert('Start or End date shouldn \'t be weekend!','warning'))
                    ->withInput(Input::all());

        else:



        $data=[
            'subject'=> $request->subject,
            'emp_id' => Auth::user()->id,
            'emp_name'=>Auth::user()->name,
            'description'=>$request->description,
            'start_date'=>$start,
            'end_date' => $end,
            'status' => 'pending',
            'count_leave' => $diff
        ];

        $leave =Leave::create($data);
        //$data = Leave::find($leave->id);
        $message =[
            'leave_id'=>$leave->id,
            'emp_name'=>Auth::user()->name,
            'subject'=>$leave->subject,
            'emp_id'=>auth()->user()->id
        ];
        $admin = User::find(1);
        $admin->notify(new NotifyAdmin($message));

        return redirect()->route('emp.leaves')->with($this->sent);
        endif;
    }

    public function checkAvilableDates($start,$end,$diff)
    {

        $day_name = date_format($start,'D');
        $weekend = [];
        //if start_date or end_date is weekend
        if(in_array($start,$weekend) && in_array($end,$weekend)):
            $diff = $start == $end ?  $diff :  $diff-2;
        return $diff;
        elseif( in_array($start,$weekend)  or in_array($end,$weekend)):
            return $diff-1;
        else:
            return $diff;
        endif;
    }
}
