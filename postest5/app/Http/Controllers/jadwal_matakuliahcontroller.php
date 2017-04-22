<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\jadwal_matakuliah;
use App\dosen;
use App\matakuliah;

class jadwal_matakuliahcontroller extends Controller
{
    public function awal(){
   return view('jadwal_matakuliah.awal', ['data'=>jadwal_matakuliah::all()]);
}
	public function tambah(){
	$dosen = Dosen::all();
    $daftar = array('' => '');
    foreach($dosen as $temp)
        $daftar[$temp->id] = $temp->nama;
    return View::make('jadwal_matakuliah.tambah', compact('daftar'));
}
public function simpan(Requests $input){
	$set = Input::get('id');
    $nama = Nama::where('id', $set)->get();
    $title = Title::where('id', $set)->get();

    switch (Input::get('type')) {
        case 'nama':
            $return = '<option value=""> Nama Dosen .....</option>';
            foreach ($nama as $temp) 
                $return = "<option value='$temp->id>$temp->nama</option>";
            return $return;
            break;
        case 'title':
            $return = '<option value=""> Matakuliah .....</option>';
            foreach ($title as $temp) 
                $return = "<option value='$temp->id'>$temp->title</option>";
            return $return;
            break;
        endswitch;
}
public function edit($id){
    $jadwal_matakuliah = jadwal_matakuliah::find($id);
    return view('jadwal_matakuliah.edit')->with(array('jadwal_matakuliah'=>$jadwal_matakuliah));
    }
public function lihat($id){
    $jadwal_matakuliah = jadwal_matakuliah::find($id);
    return view('jadwal_matakuliah.lihat')->with(array('jadwal_matakuliah'=>$jadwal_matakuliah));
}
public function update($id, Request $input){
    $jadwal_matakuliah = jadwal_matakuliah::find($id);
    $jadwal_matakuliah->mahasiswa_id = $input->mahasiswa_id;
    $jadwal_matakuliah->ruangan_id = $input->ruangan_id;
    $jadwal_matakuliah->dosen_matakuliah_id = $input->dosen_matakuliah_id;
    $informasi = $jadwal_matakuliah->save() ? 'Berhasil update data' : 'Gagal update data';
    return redirect('jadwal_matakuliah')->with(['informasi'=>$informasi]);
}
public function hapus($id){
    $jadwal_matakuliah = jadwal_matakuliah::find($id);
    $informasi = $jadwal_matakuliah->delete() ? 'Berhasil hapus data' : 'Gagal hapus data';
    return redirect('jadwal_matakuliah')->with(['informasi'=>$informasi]);
}

}
