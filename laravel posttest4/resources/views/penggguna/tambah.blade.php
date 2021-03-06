@extends('master')
@section('container')
<div class="panel panel-primary">
	<div class="panel-heading">
		<strong><a href="{{url('penggguna')}}">
		<i style="color: white;" class="fa text-default fa-chevron-left"></i>
		</a>Tambah data penggguna</strong>
	</div>
	{!! form::open(['url'=>'penggguna/simpan','class'=>'form-horizontal'])!!}
		@include('penggguna.form')
		
		<div style="width: 100%;text-align: right;">
			<button class="btn btn-primary">
				<i class="fa fa-save"></i>Simpan
			</button>
			<button class="btn btn-danger">
				<i class="fa fa-undo"></i>ulangi
			</button>
		</div>
		{!! form::close() !!}
		</div>
@stop