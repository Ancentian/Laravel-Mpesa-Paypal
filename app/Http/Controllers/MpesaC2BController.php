<?php

namespace App\Http\Controllers;

use App\Models\MpesaC2B;
use App\Mpesa\C2B;
use Iankumu\Mpesa\Facades\Mpesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MpesaC2BController extends Controller
{
    public function registerURLS(Request $request)
    {
        $shortcode = $request->input('shortcode');
        $response = Mpesa::c2bregisterURLS($shortcode);
        $result = json_decode((string)$response, true);

        //return $result;
        return response()->json($result);
    }

    public function simulate(Request $request)
    {
        $phonenumber = $request->input('phonenumber');
        $amount = $request->input('amount');
        $account = $request->input('account');
        $shortcode = $request->input('shortcode');
        $command = $request->input('command');

        if ($command == "CustomerPayBillOnline") {
            $response = Mpesa::c2bsimulate($phonenumber, $amount, $shortcode, $command, $account);
        } else {
            $response = Mpesa::c2bsimulate($phonenumber, $amount, $shortcode, $command);
        }

        $result = json_decode((string)$response, true);
        //return $result;
        return response()->json($result);
    }

    public function validation()
    {
        Log::info('Validation endpoint has been hit');
        $result_code = "0";
        $result_description = "Accepted validation request";
        return Mpesa::validationResponse($result_code, $result_description);
    }

    public function confirmation(Request $request)
    {

        return (new C2B())->confirm($request);
    }
}
