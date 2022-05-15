<?php

namespace App\Http\Controllers;

use App\Http\Requests\NumberRequest;

class NumberController extends Controller
{
    public function get_perfect_numbers(NumberRequest $req){

        if($req->numbers){
           $numbersArray=json_decode($req->numbers);
        }
        
        $returnArray= array_map(array( 'App\Classes\PerfectNumber', 'isPerfectNumber' ),$numbersArray);

        return $this->sendResponse($returnArray,200);
    }
}
