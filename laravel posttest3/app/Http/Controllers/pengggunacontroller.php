<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\penggguna;

class pengggunacontroller extends Controller
{
 public function awal(){
 	return "hello dari pengggunacontroller";
 }
 public function tambah(){
 	return $this->simpan();
 }
 public function simpan(){
 	$penggguna = new penggguna();
 	$penggguna->username = 'jon_doe';
 	$penggguna->password = 'doe_jon';
 	$penggguna->save();
 	return"data dengan username {$penggguna->username} telah disimpan";
 }

}
