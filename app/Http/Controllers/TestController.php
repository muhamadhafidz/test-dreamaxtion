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

    public function hitungSoalNomor3(Request $request)
    {
        $data = $request->all();
        
        $tipe = $data['inputanSoal3tipe'];
        $jumlah = $data['inputanSoal3total'];
        $hari = $data['inputanSoal3hari'];

        $tipeA = 99900;
        $tipeB = 49900;
        $setDiskon1 = 0;
        $setDiskon2 = 0;

        $result = 0;

        if ($tipe == 'a') {
            if ($jumlah > 50) {
                $setDiskon1 = 0.05;
            }

            if ($hari == 'senin' || $hari == 'kamis') {
                $setDiskon2 = 0.1;
            }

            $result = $tipeA * $jumlah - ($tipeA * $jumlah * $setDiskon1) - ($tipeA * $jumlah * $setDiskon2);
        }else {
            if ($jumlah > 100) {
                $setDiskon1 = 0.1;
            }

            if ($hari == 'jumat') {
                $setDiskon2 = 0.05;
            }
            
            $result = $tipeB * $jumlah - ($tipeB * $jumlah * $setDiskon1) - ($tipeB * $jumlah * $setDiskon2);
        }
        
        // set session
        $request->session()->put('resultSoal3', 'Rp.'.$result);
        return redirect('/');
    }
    
}
