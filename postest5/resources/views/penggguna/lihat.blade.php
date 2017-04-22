@extends('master')
@section('container')

<div class="panel panel-warning">
	<div class="panel-heading">
		<strong><a href="{{ url('penggguna') }}">
		<i style="color:#8a6d3b" class="fa text-default fa-chevron-left"></i>
		</a>Detail data penggguna</strong>
	</div>
	
	<table class="table">
		<tr>
			<td>Username:</td>
			<td>{{$penggguna->username}}</td>
		</tr>

		<tr>
			<td>Password</td>
			<td>:</td>
			<td>{{ $penggguna->password}}</td>
		</tr>

		<tr>
			<td class="col-xs-4">Dibuat tanggal</td>
			<td class="col-xs-1">:</td>
			<td>{{$penggguna->created_at}}</td>
		</tr>

		<tr>
			<td class="col-xs-4">Diperbarui tanggal</td>
			<td class="col-xs-1">:</td>
			<td>{{$penggguna->updated_at}}</td>
		</tr>
	</table>
	</div>
@stop