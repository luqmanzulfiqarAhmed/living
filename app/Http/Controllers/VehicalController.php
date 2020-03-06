<?php

namespace App\Http\Controllers;

use App\Vehical;
use Illuminate\Http\Request;

class VehicalController extends Controller
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
        return view('AdminPages.AddNewVehical');
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
            'vehicalNo'       => 'required',
            'vehicalType'     => 'required',
            'modelYear'         => 'required',
            'passengerCapacity'      => 'required',
            'vehicalDescription'        => 'required',
        ]);
        $vehicalNo          = $request->input('vehicalNo'); 
        $vehicalType        = $request->input('vehicalType');
        $modelYear          = $request->input('modelYear');
        $passengerCapacity  = $request->input('passengerCapacity'); 
        $vehicalDescription = $request->input('vehicalDescription');
        
        $vehical = new Vehical();
        $vehical->vehicalNo          = $vehicalNo;
        $vehical->vehicalType        = $vehicalType;
        $vehical->modelYear          = $modelYear;
        $vehical->passengerCapacity  = $passengerCapacity;
        $vehical->vehicalDescription = $vehicalDescription;
        $vehical->societyName        = $request->session()->get('SocietyName');
        $vehical->save();
        return view('AdminPages.AddNewVehical');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehical  $vehical
     * @return \Illuminate\Http\Response
     */
    public function show(Vehical $vehical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehical  $vehical
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehical $vehical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehical  $vehical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehical $vehical)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehical  $vehical
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehical $vehical)
    {
        //
    }
}
