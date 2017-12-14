<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee as Employee;
use App\User as User;
use Validator;

use Illuminate\Support\Facades\DB;
class EmployeeController extends AdminController
{


    function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the Employees.
     *@author Tareq Hossain
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show employees in table
        $data['employees']= User::where('role','emp')->leftJoin('emp_leave','users.id','=', 'emp_leave.user_id')->paginate(10);
        return view('admin.employees.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Showing Employee create form

        return view('admin.employees.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validating employee form data

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password'=>'required|min:6',
            
        ]);

        if ($validator->fails()) {
            return redirect('admin/employees/create')
                        ->withErrors($validator)
                        ->withInput($request->all());
        }

        //Stroe  employee on datbase using user model
        
        if(!empty($request->obtained_leave)):
            $obtained_leave = $request->obtained_leave;
        else:
            $obtained_leave = DB::table('settings')->where('name','obtained_leave')->first()->data;
        endif;

        $user = User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password' => bcrypt($request->password),
            'role' => 'emp'

        ]);


        DB::table('emp_leave')->insert([
            'user_id'=>$user->id,
            'obtained_leave' => $obtained_leave
        ]);

        return redirect()->route('admin.employees.index')->with($this->saved);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Show Employee Edit form

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['emp']= User::find($id);
        $data['obtained_leave']=DB::table('emp_leave')->where('user_id',$id)->first()->obtained_leave;

        return view('admin.employees.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id )
    {
       


        //Update  employee on datbase using user model
        if(!empty($request->obtained_leave)):
            $obtained_leave = $request->obtained_leave;
        else:
            $obtained_leave = 20;
        endif;
        $id = $request->id;

        //Updating User using User Model
        User::where('id',$id)->update([
            'name'=> $request->name,
            'email'=>$request->email,
            'password' => bcrypt($request->password),
            'role' => 'emp'

        ]);

        //Updating Obtained leaves using DB Facde
        DB::table('emp_leave')->where('user_id',$id)->update([
           'obtained_leave' => $request->obtained_leave
        ]);

        return redirect()->route('admin.employees.index')->with($this->update);
    }

    /**
     * Remove Employee from db
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete Employee from Db
        DB::table('emp_leave')->where('user_id',$id)->delete();
        DB::table('leaves')->where('emp_id',$id)->delete();
        DB::table('notification')->where('notifiable_id',$id)->delete();
        User::where('id',$id)->delete();

        return redirect()->back()->with($this->delete);
    }
}
