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





}
