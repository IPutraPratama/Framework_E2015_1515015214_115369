<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\penggguna;

class pengggunacontroller extends Controller
{
 public function awal(){
 	return view('penggguna.awal',['data'=>penggguna::all()]);
 }
 public function tambah(){
 	return view('penggguna.tambah');
 }
 public function simpan(){
 	$penggguna = new penggguna();
 	$penggguna->username = 'jon_doe';
 	$penggguna->password = 'doe_jon';
 	$penggguna->save();
 	return"data dengan username {$penggguna->username} telah disimpan";
 }

 public function edit($id){
 	$penggguna=penggguna::find($id);
 	return view('penggguna.edit')->with(array('penggguna'=>$penggguna));
 }
 public function lihat($sid){
 	$penggguna=penggguna::find($id);
 	return view('penggguna.lihat')->with(array('penggguna'=>$penggguna));
 }

 public function update($sid,Requests $input){
 	$penggguna=penggguna::find($id);
 	$penggguna->username = $input->username;
 	$penggguna->password = $input->password;
 	$informasi = $penggguna->save() ? 'Berhasil update data':'Gagal Update Data';
 	return redirect('penggguna')->with(['informasi'=>$informasi]);
 }
 public function hapus($id){
 	$penggguna=penggguna::find($id);
 	$informasi= $penggguna->delete() ? 'Berhasil hapus data':'Gagal hapus Data';
 	return redirect('penggguna')->with(['informasi'=>$informasi]);
 }


}
