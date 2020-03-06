<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddUtlityBill extends Controller
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
        return view('AdminPages.AddUtilityBill');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $residentCnic  = $request->input('residentCnic'); 
        // $residentEmail = $request->input('residentEmail');
        // $issueDate     = $request->input('issueDate');
        // $dueDate       = $request->input('dueDate');
        // $billType      = $request->input('billType');

        // echo $residentCnic  ; echo "<br>";
        // echo $residentEmail ; echo "<br>";
        // echo $issueDate     ; echo "<br>";
        // echo $dueDate       ; echo "<br>";
        // echo $billType      ; echo "<br>";
        echo "mmdsbhjfds;";
        // // electricty
        // if ($billType =="Electricity")
        // {
        //     $electricMeterNumber   = $request->input('electricMeterNumber');
        //     $electricUnitsConsumed = $request->input('electricUnitsConsumed');
        //     $electricMeterRent     = $request->input('electricMeterRent');
        //     $electrictyDuty        = $request->input('electrictyDuty');
        //     $N_J_Surcharges        = $request->input('N_J_Surcharges');

        //     echo $electricMeterNumber   ; echo "<br>";
        //     echo $electricUnitsConsumed ; echo "<br>";
        //     echo $electricMeterRent     ; echo "<br>";
        //     echo $electrictyDuty        ; echo "<br>";
        //     echo $N_J_Surcharges        ; echo "<br>";
        // }
        // //Sui Gas
        // if ($billType =="Sui Gas")
        // {
        //     $suiGacmeterNumber = $request->input('suiGacmeterNumber');
        //     $suiGasMeterRent   = $request->input('suiGasMeterRent'); 
        //     $GST               = $request->input('GST');

        //     echo $suiGacmeterNumber ; echo "<br>";
        //     echo $suiGasMeterRent   ; echo "<br>";
        //     echo $GST               ; echo "<br>";
        // }
        // //Internet
        // if ($billType =="Sui Gas")
        // {
        //     $internetCharges = $request->input('internetCharges');
        //     $serviceTax      = $request->input('serviceTax');
        //     $withHoldingTax  = $request->input('withHoldingTax');
        //     $currentBill     = $request->input('currentBill');

        //     echo $internetCharges ; echo "<br>";
        //     echo $serviceTax      ; echo "<br>";
        //     echo $withHoldingTax  ; echo "<br>";
        //     echo $currentBill     ; echo "<br>";
        // }
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
