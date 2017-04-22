<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests;

class DosenRequest extends Request
{
	public function authorize()
	{
		return true;
	}

	public function rules()
	{
		$validasi=['nama'=>'required','nipp'=>'required|integer','alamat'=>'required','username'=>'required'];
		if($this->is('dosen/tambah')){
			$validasi['password'] = 'required';
		}
		return $validasi;
	}
}