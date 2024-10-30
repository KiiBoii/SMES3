<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PinjamBukuComtroller extends Controller
{
    function ajukan(String  $param1){
        echo 'peminjaman buku it berhasil, ID= '. $param1;
    }
    function informasi(){
        phpinfo();
    }
    function hash(String $param2){
        return hash('sha256', $param2);
    }
function rand (String $param3,$param4){
    return rand($param3,$param4);
}
}
