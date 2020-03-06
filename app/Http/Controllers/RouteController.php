<?php

namespace App\Http\Controllers;

use App\TransportRoute;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminPages.AddNewRoute');
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
            'vehicalNumber'    => 'required',
            'driverPhoneNo'     => 'required',
            'drivertName'         => 'required',
            'departurelocation'      => 'required',
            'arrivallocation'        => 'required',
            'departureTime'    => 'required',
            'arrivalTime'   => 'required'
        ]);
         $vehicalNumber    = $request->input('vehicalNumber'); 
        $drivertName       = $request->input('drivertName');
        $driverPhoneNo     = $request->input('driverPhoneNo'); 
        $departurelocation = $request->input('departurelocation'); 
        $arrivallocation   = $request->input('arrivallocation');
        $departureTime     = $request->input('departureTime');
        $arrivalTime       = $request->input('arrivalTime');
        $busStop           = $request->input('busStop');
        
        $transportRoute = new TransportRoute();
        $transportRoute->vehicalNumber     = $vehicalNumber;
        $transportRoute->driverName        = $drivertName;
        $transportRoute->driverPhoneNo     = $driverPhoneNo;
        $transportRoute->departurelocation = $departurelocation;
        $transportRoute->arrivallocation   = $arrivallocation;
        $transportRoute->departureTime     = $departureTime;
        $transportRoute->arrivalTime       = $arrivalTime;
        $transportRoute->busStop           = $busStop;
        $transportRoute->societyName       = $request->session()->get('SocietyName');

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/HousingSociety.json');
        $firebase = (new Factory)->withServiceAccount($serviceAccount)->create();
        $database = $firebase->getDatabase();
        $ref =  $database->getReference('Transport');
        $ref->getChild($vehicalNumber)->set([
         'busNumber' =>   $vehicalNumber,
         'driverName'=>   $drivertName  ,
         'driverPhone'=>  $driverPhoneNo  ,
         'departurePoint'=> $departurelocation  ,
         'arrivalPoint'=> $arrivallocation  ,
         'departureTime'=> $departureTime  ,
         'arrivalTime'=> $arrivalTime  ,
         'busStops'=> $busStop 
         ]);
        $transportRoute->save();

        return view('AdminPages.AddNewRoute');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $societyName = $request->session()->get('SocietyName');
        $data = TransportRoute::all()->where('societyName',"$societyName");
        return view('AdminPages.Transport.ViewTransportRoutes')->with('data' ,$data);
        // ViewTransportRoutes
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function edit(Route $route)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Route $route)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Route  $route
     * @return \Illuminate\Http\Response
     */
    public function destroy(Route $route)
    {
        //
    }
}
