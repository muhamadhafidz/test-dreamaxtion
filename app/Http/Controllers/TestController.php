<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return '';

    }

    public function hitungSoalNomor1(Request $request)
    {
        $data = $request->all();
        
        $loop = true;
        $alphabet = '';
        $stringLength = strlen($data['inputanSoal1']);
        $result = '';
        $i = 0;
        while($loop) {
            $alphabet = substr($data['inputanSoal1'], 0, 1);

            $data['inputanSoal1'] = str_replace($alphabet, '', $data['inputanSoal1']);

            $result .= $alphabet . ((int)$stringLength - (int)strlen($data['inputanSoal1']));

            if(strlen($data['inputanSoal1']) == 0) {
                $loop = false;
            }
        }
        // set session
        $request->session()->put('resultSoal1', $result);
        return redirect('/');
    }

    public function hitungSoalNomor2(Request $request)
    {
        $data = $request->all();
        
        $stringLength = strlen($data['inputanSoal2']);
        // string to array
        $array = str_split($data['inputanSoal2']);
        $newArray = [];
        foreach($array as $key => $value) {
            if($key == 0){
                array_push($newArray, $value);
            }else {
                if((int)$value >= (int)$newArray[count($newArray) - 1]){
                    array_push($newArray, $value);
                    if($key == 4){
                        dd($array, $newArray);
                    }
                    
                }else {
                    foreach($newArray as $key2 => $value2) {
                        if((int)$value < (int)$value2){
                            array_splice($newArray, $key2, 0, $value);
                            break;
                        }
                    }
                }
            }
        }

        // array as string
        $result = implode('', $newArray);
        // set session
        $request->session()->put('resultSoal2', $result);
        return redirect('/');
    }
    
}
