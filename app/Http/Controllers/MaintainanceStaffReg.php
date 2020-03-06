<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MaintainanceStaff;

class MaintainanceStaffReg extends Controller
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
        return view ('AdminPages.MaintainanceStaffReg');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mStaffFirstName   = $request->input('mStaffFirstName');
        $mStaffLastName    = $request->input('mStaffLastName');
        $mStaffCNIC        = $request->input('mStaffCNIC');
        $mStaffPhoneNo     = $request->input('mStaffPhoneNo');
        $mStaffEmail       = $request->input('mStaffEmail'); 
        $mStaffType        = $request->input('mStaffType');
        $mStaffExperience  = $request->input('mStaffExperience'); 
        $mStaffhomeAddress = $request->input('mStaffhomeAddress'); 
        $mStaffDescription = $request->input('mStaffDescription');
        $DateofBirth       = $request->input('DateofBirth');

        $staff = new MaintainanceStaff();
        $staff->mStaffFirstName   = $mStaffFirstName;
        $staff->mStaffLastName    = $mStaffLastName;
        $staff->mStaffCNIC        = $mStaffCNIC;
        $staff->mStaffPhoneNo     = $mStaffPhoneNo;
        $staff->employeeEmail     = $mStaffEmail;
        $staff->mStaffType        = $mStaffType;
        $staff->mStaffExperience  = $mStaffExperience;
        $staff->mStaffhomeAddress = $mStaffhomeAddress;
        $staff->mStaffDescription = $mStaffDescription;
        $staff->DateofBirth       = $DateofBirth;
        $staff->scoietyName       = $request->session()->get('SocietyName');
        $staff->save();
        return view ('AdminPages.MaintainanceStaffReg');
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
        $data = MaintainanceStaff::all()->where('scoietyName',"$societyName");
        return view ('AdminPages.HomeMaintainance.ViewHomeMaintainanceStaff')->with('data' ,$data);
        //HomeMaintainance ViewHomeMaintainanceStaff
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
