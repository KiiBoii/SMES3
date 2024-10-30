<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testcontroller extends Controller
{
    //pertemuan3
  public  function test(String $parameter=''){
    echo "perkenalkan nama saya " .$parameter;
   }

   public function versi(String $andi){
    echo phpinfo();
   }

   public function hash(String $paramter3){
    echo hash ("sha256",$paramter3);
   }

   public function rand(String $paramter4, String $parameter5 ){
    echo rand($paramter4,$parameter5);
   }
}
