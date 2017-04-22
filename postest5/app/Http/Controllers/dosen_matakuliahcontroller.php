<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\dosen_matakuliah;
use App\dosen;
use App\matakuliah;
use App\jadwal_matakuliah;

class dosen_matakuliahcontroller extends Controller
{
    public function awal(){

     $Semua_dosen_matakuliah = dosen_matakuliah::all();
        return view('dosen_matakuliah.awal', compact('Semua_dosen_matakuliah'));
}
	public function tambah(){
	$dosen = new Dosen;
        $matakuliah = new Matakuliah;
        return view('dosen_matakuliah.tambah',compact('dosen','matakuliah'));
        return $this->simpan();
}
public function simpan(){
	$dosen_matakuliah = new dosen_matakuliah($input->only('dosen_id','matakuliah_id'));
            if($dosen_matakuliah->save()) $this->informasi = "Matakuliad dan Dosen Mengajar berhasil disimpan";
            return redirect('dosen_matakuliah')->with(['informasi'=>$this->informasi]);

 }
 public function lihat($id){
        $dosen_matakuliah = dosen_matakuliah::find($id);
        return view('dosen_matakuliah.lihat',compact('dosen_matakuliah'));
    }
    public function edit($id){
        $dosen_matakuliah = dosen_matakuliah::find($id);
        $dosen = new Dosen;
        $matakuliah = new Matakuliah;
        return view('dosen_matakuliah.edit',compact('dosen','matakuliah','dosen_matakuliah'));
    }
    public function update($id,Request $input)
    {
        $dosen_matakuliah = dosen_matakuliah::find($id);
        $dosen_matakuliah->fill($input->only('dosen_id','matakuliah_id'));
        if($dosen_matakuliah->save()) $this->informasi = "Matakuliad dan Dosen Mengajar berhasil diperbarui";
        return redirect('dosen_matakuliah')->with(['informasi'=>$this->informasi]);
    }
    public function hapus($id,Request $input)
    {
        $dosen_matakuliah = dosen_matakuliah::find($id);
        if($dosen_matakuliah->delete()) $this->informasi = "Matakuliad dan Mahasiswa berhasil dihapus";
        return redirect('dosen_matakuliah')-> with(['informasi'=>$this->informasi]);
    }

}
