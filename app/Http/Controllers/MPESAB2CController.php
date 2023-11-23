<?php

namespace App\Http\Controllers;

use App\Mpesa\B2C;
use Iankumu\Mpesa\Facades\Mpesa;
use Illuminate\Http\Request;

class MPESAB2CController extends Controller
{
    public function simulate(Request $request)
    {
        $phoneno = $request->input('phonenumber');
        $amount = $request->input('amount');
        $remarks = $request->input('remarks');
        $command = $request->input('command');


        $response = Mpesa::b2c($phoneno, $command, $amount, $remarks);

        $result = json_decode((string)$response);

        return $result;
    }
}
