<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id){
        function validateNumericString($str) {
            for ($i = 0; $i < strlen($str); $i++) {
                if (!is_numeric($str[$i])) {
                    return false;
                }
            }
            return true;
        }
        // validateNumericString($id);
        // $idInNum = (int)$id;
        // echo $idInNum."\n"."\n";
        // echo gettype($idInNum)."\n"."\n";

        if(validateNumericString($id)==true){
            $name = "Donald Trump";
            $age = "75";
            $data = [
                'id' => $id,
                'name' => $name,
                'age' => $age,
            ];
    
            $cookie = cookie(
                $name = 'access_token',
                $value = '123-XYZ',
                $minutes = 1,
                $path = '/',
                $domain = $_SERVER['SERVER_NAME'],
                $secure = false,
                $httpOnly = true
            );
            return response($data, 200)->withCookie($cookie);
        }else{
            return abort(404);
        }

    }
}
