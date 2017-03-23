@extends('master')
@section('container')
<div class="panel panel-info">
	<div class="panel-heading">
		<strong><a href="{{url('penggguna')}}">
		<i class="fa text-default fa-chevron-left"></i>
		</a>Perbraui data penggguna</strong>
	</div>
	{!! form::model($penggguna,['url'=>'penggguna/edit/'.$penggguna->id,'class'=>'form-horizontal'])!!}
		@include('penggguna.form')
		<div style="width: 100%;text-align: right;">
			<button class="btn btn-info">
				<i class="fa fa-save"></i>Perbarui
			</button>
			<button type="reset" class="btn btn-danger">
				<i class="fa fa-undo"></i>Ulangi
			</button>
		</div>
		{!!form::close()!!}
		</div>
@stop