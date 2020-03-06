<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Announcement;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class Announcements extends Controller
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
        return view('AdminPages.makeAnnouncement');
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
            'announcementID'    => 'required',
            'subject'     => 'required',
            'description'         => 'required'
        ]);


        $announcementID = $request->input('announcementID');
        $subject        = $request->input('subject');
        $description    = $request->input('description');

        $ann = new Announcement();

        $ann->announcementID = $announcementID;
        $ann->subject = $subject;
        $ann->description = $description;
        $ann->save();

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/HousingSociety.json');
        $firebase = (new Factory)->withServiceAccount($serviceAccount)->create();
        $database = $firebase->getDatabase();
        $ref =  $database->getReference('Announcements');
        $key = $ref->push()->getKey();
        $ref->getChild($key)->set([
         'Admin Email' =>  $request->session()->get('adminEmail', 'default'),
         'Announcement ID' =>   $announcementID,
         'Subject'=>   $subject  ,
         'Date'=>  date("M,d,Y h:i:s A"),
         'Description'=> $description  ,
         'Duration'=> '1 Week'  
         ]);
        return view('AdminPages.makeAnnouncement');
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
