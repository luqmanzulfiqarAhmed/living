<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Society;
use Hash;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp;
use json_decode;
class AdminRegistration extends Controller
{
    
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
        return view('SignUp.adminRegistration');
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
            'adminFirstName' =>'required',
            'adminLastName' =>'required',
            'adminPassword' =>'required',
            'adminCnic' =>'required',
            'adminEmail' =>'required',
            'adminPhoneNo' =>'required',
            'scoietyName' =>'required',
            'scoietyLocation' =>'required',
            'societyArea' =>'required',
            'facilities' =>'required'
        ]);
        $admin = new Admin();
         $society = new Society();
            //insertAdmin Data
            // $$adminImage  
            // $adminFirstName          = $request->input('adminFirstName');
            // $adminLastName           = $request->input('adminLastName');
            // $adminPassword           = $request->input('adminPassword');
            // $adminCnic               = $request->input('adminCnic');
            // $adminEmail              = $request->input('adminEmail');
            // $adminPhoneNo            = $request->input('adminPhoneNo');
            // $admindateofBirth        = $request->input('admindateofBirth');

            $admin->setFirstName($request->input('adminFirstName'));
            $admin->setLastName($request->input('adminLastName'));
            $admin->setPassword($request->input('adminPassword'));
            $admin->setCnic($request->input('adminCnic'));
            $admin->setEmail($request->input('adminEmail'));
            $admin->setPhoneNo($request->input('adminPhoneNo'));
            $admin->setdateofBirth($request->input('admindateofBirth'));
            $admin->setHousingSocietyID(111);

            $scoietyName             = $request->input('scoietyName');
            $scoietyLocation         = $request->input('scoietyLocation');
            $societyArea             = $request->input('societyArea');

            //adminID SociietyID

            $client = new \GuzzleHttp\Client();
            $res = $client->get('http://uliving.azurewebsites.net/api/admin');
            echo $res->getStatusCode();  // 200
            $client = new Client([
    'headers' => [ 'Content-Type' => 'application/json' ]
]);

$response = $client->post('http://uliving.azurewebsites.net/api/admin',
    ['body' => json_encode(
        [
            'adminId' => '1230',
            'adminFirstName'=> 'Asad',
            'adminLastName' => 'sg',
            'adminPassword' => 'dg',
            'adminCnic' => 'dg',
            'adminEmail' => 'dg',
            'adminPhoneNo' => 'hf',
            'admindateofBirth' => 'dfd',
            'HousingSocietyID' => 'ity'
        ]
    )]
);
echo $response;
            // function sendRequest($data,$url)
            // {
            //     $postdata = http_build_query(array('data'=>$data));
            //     $opts = array('http' =>
            //       array(
            //           'method'  => 'POST',
            //           'header'  => "Content-type: application/x-www-form-urlencoded \r\n",
            //           'content' => $postdata,
            //           'ignore_errors' => true,
            //           'timeout' =>  10,
            //       ),
            //     );
            //     $context  = stream_context_create($opts);
            //     return file_get_contents($url,false, $context);
            // }
            
           
            // // 1.- add your json
            // $data = '[{
            //     "attributes"  : {
            //         "adminId"   : ["123"],
            //         "adminFirstName"     : ["Asad"],
            //         "adminLastName": ["Mehmood"]
            //     },
            // }]';
            
            // // 2.- add api endpoint
            // $url= "http://uliving.azurewebsites.net/api/admin"; 
            
            // // 3.- fire
            // $result = sendRequest($data,$url);
            
           
            

            // $adminId                 = Hash::make($adminLastName);

            // $admin->adminId          = $adminId;
            // $admin->adminFirstName   = $adminFirstName;
            // $admin->adminLastName    = $adminLastName;
            // $admin->adminPassword    = $adminPassword;
            // $admin->adminCnic        = $adminCnic;
            // $admin->adminEmail       = $adminEmail;
            // $admin->adminPhoneNo     = $adminPhoneNo;
            // $admin->admindateofBirth = $admindateofBirth;

            //insert society Data
            // $society->adminEmail      = $adminEmail;
            $society->scoietyName     = $scoietyName;
            $society->scoietyLocation = $scoietyLocation;
            $society->societyArea     = $societyArea;

            //getting facilities from checkboxes
            $facilities = $_POST["facilities"];
            $new        = implode(" " , $facilities);
            //insert facilities

            // $society->societyFeatures  = $new;
            // $admin->save();
            // $society->save();
            
            // //make session with AdminEmail
            // $request->session()->put('adminEmail', $adminEmail);
            // //make session with SocietyName
            // $request->session()->put('SocietyName', $scoietyName);
            // //make session with SocietyFeatures
            // $request->session()->put('SocietyFeatures', $new);

            // return view('AdminPages.adminHomePage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
