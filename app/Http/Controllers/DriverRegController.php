<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Session\Session;

class DriverRegController extends Controller
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
        return view('AdminPages.AddDriver');
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
            'driverFirstName'    => 'required',
            'driverLastName'     => 'required',
            'driverCNIC'         => 'required',
            'driverPhoneNo'      => 'required',
            'driverEmail'        => 'required',
            'driverLicenseNo'    => 'required',
            'driverExperience'   => 'required',
            'driverhomeAddress'  => 'required',
            'driverDescription'  => 'required',
            'driverDateofBirth'  => 'required',
        ]);
        $driverFirstName   = $request->input('driverFirstName');
        $driverLastName    = $request->input('driverLastName');
        $driverCNIC        = $request->input('driverCNIC');
        $driverPhoneNo     = $request->input('driverPhoneNo');
        $driverEmail       = $request->input('driverEmail');
        $driverLicenseNo   = $request->input('driverLicenseNo');
        $driverExperience  = $request->input('driverExperience');
        $driverhomeAddress = $request->input('driverhomeAddress');
        $driverDescription = $request->input('driverDescription');
        $driverDateofBirth = $request->input('driverDateofBirth');

        $driver   = new Driver();
        $driver->driverFirstName   = $driverFirstName;
        $driver->driverLastName    = $driverLastName;
        $driver->driverCNIC        = $driverCNIC;
        $driver->driverPhoneNo     = $driverPhoneNo;
        $driver->driverEmail       = $driverEmail;
        $driver->driverLicenseNo   = $driverLicenseNo;
        $driver->driverExperience  = $driverExperience;
        $driver->driverhomeAddress = $driverhomeAddress;
        $driver->driverDescription = $driverDescription;
        $driver->driverDateofBirth = $driverDateofBirth;
        $driver->societyName       = $request->session()->get('SocietyName');

        $driver->save();
        return view('AdminPages.AddDriver');

        
        // $request->session()->put('DriverName', $driverFirstName);

        // $name = $request->session()->get('DriverName', 'default');

        // echo $name;

                   //////////////////guzle
                    // $client = new Client();
                    // $res = $client->request('GET', 'http://localhost:5000/api/Admin', ['verify' => false]);
                    // echo $res->getStatusCode();           // 200
                    // //echo $res->getHeader('content-type'); // 'application/json; charset=utf8'
                    // echo $res->getBody();                 // {"type":"User"...'
                    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DriverReg  $driverReg
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $societyName = $request->session()->get('SocietyName');
        $data = Driver::all()->where('societyName',"$societyName");
        return view('AdminPages.Transport.ViewDrivers')->with('data' ,$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DriverReg  $driverReg
     * @return \Illuminate\Http\Response
     */
    public function edit(DriverReg $driverReg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DriverReg  $driverReg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DriverReg $driverReg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DriverReg  $driverReg
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriverReg $driverReg)
    {
        //
    }
}
