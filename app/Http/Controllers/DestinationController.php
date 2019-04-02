<?php

namespace App\Http\Controllers;

use App\Model\DestinationModel;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function getDestination(Request $request){
        $destination = DestinationModel::get();
        return response()->json($destination);
    }
}
