<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminLoginController extends Controller
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
        return view('LogIn.login');
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
            'adminPassword' =>'required',
            'adminEmail' =>'required|email',
        ]);
            $adminEmail = $request->input('adminEmail');
            $adminPassword = $request->input('adminPassword');
            // echo $adminEmail ; echo $adminPassword;
            $data = DB::select('select adminEmail,adminPassword from admins where adminEmail = ? and adminPassword=?', [$adminEmail,$adminPassword]);
            
            if (count($data) == 1)
            {
                view()->share('adminEmail', $adminEmail);
                $request->session()->put('adminEmail', $adminEmail);
                // $adminEmail = $request->session()->get('adminEmail');
                $SocietyName = DB::table('societies')->where('adminEmail', '=', $adminEmail)->get()->pluck('scoietyName');
                $request->session()->put('SocietyName', $SocietyName);
                return view('AdminPages.adminHomePage'); 
            }
            else
            {
                return view('LogIn.login');
            }
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
