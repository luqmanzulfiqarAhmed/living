<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Society;
use DB;
use OCI_Collection;
use OCI_Lob;

class EmployeeRegistration extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPages.EmployeeRegistration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request ,[
            'employeeFirstName'    => 'required',
            'employeeLastName'     => 'required',
            'employeeCNIC'         => 'required',
            'employeePhoneNo'      => 'required',
            'employeeEmail'        => 'required',
            'department'           => 'required',
            'homeAddress'          => 'required',
            'employeeDescription'  => 'required',
            'employeeDateofBirth'  => 'required'
        ]);

        $employee = new Employee();

        $employeeFirstName   = $request->input('employeeFirstName');
        $employeeLastName    = $request->input('employeeLastName');
        $employeeCNIC        = $request->input('employeeCNIC');
        $employeePhoneNo     = $request->input('employeePhoneNo');
        $employeeEmail       = $request->input('employeeEmail'); 
        $department          = $request->input('department');
        $homeAddress         = $request->input('homeAddress');
        $employeeDescription = $request->input('employeeDescription');
        $employeeDateofBirth = $request->input('employeeDateofBirth');

        $employee->employeeFirstName   = $employeeFirstName   ; 
        $employee->employeeLastName    = $employeeLastName    ; 
        $employee->employeeCNIC        = $employeeCNIC        ; 
        $employee->employeePhoneNo     = $employeePhoneNo     ; 
        $employee->employeeEmail       = $employeeEmail       ; 
        $employee->department          = $department          ; 
        $employee->homeAddress         = $homeAddress         ;  
        $employee->employeeDescription = $employeeDescription ; 
        $employee->employeeDateofBirth = $employeeDateofBirth ;
        $employee->scoietyName         = $request->session()->get('SocietyName');
        $employee->save();
        return view('AdminPages.EmployeeRegistration');
        // echo session()->get('SocietyName', 'default');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         $societyName = $request->session()->get('SocietyName');
        $data = Employee::all()->where('scoietyName',"$societyName");
        return view ('AdminPages.Employee.EmployeeDetails')->with('data' ,$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
