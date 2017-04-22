<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\penggguna;
use Input;
use Redirect;
use informasi;

class pengggunacontroller extends Controller
{
 public function awal(){
 	return view('penggguna.awal',['data'=>penggguna::all()]);
 }
 public function tambah(){
 	return view('penggguna.tambah');
 }
 public function simpan(Request $input){
 	$penggguna = new penggguna();
 	$penggguna->username = $input->username;
 	$penggguna->password = $input->password;
 	$informasi= $penggguna->save()? 'berhasil simpan data' : 'gagal simpan data';
 	return redirect('penggguna')->with(['informasi=>'=>informasi]);
 }

 public function edit($id){
 	$penggguna=penggguna::find($id);
 	return view('penggguna.edit')->with(array('penggguna'=>$penggguna));
 }
 public function lihat($id){
 	$penggguna=penggguna::find($id);
 	return view('penggguna.lihat')->with(array('penggguna'=>$penggguna));
 }

 public function update($id,Request $input){
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
