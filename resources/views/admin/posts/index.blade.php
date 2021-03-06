@extends('admin.layout')

@section('header')
	<h1> Todas las publicaciones <small>Listado</small> </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Posts</li>
  </ol>
@stop

@section('content')
	<h1>Dashboard</h1>
	<div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">Listado de publicaciones</h3>
      <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
        <i class="fa fa-plus"></i> Crear publicación
      </button>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="posts-table" class="table table-bordered table-striped">
        <thead>
	        <tr>
	          <th>ID</th>
	          <th>Titulo</th>
	          <th>Extracto</th>
	          <th>Acciones</th>
	        </tr>
        </thead>
        <tbody>
        	@foreach($posts as $post)
        		<tr>
        			<td>{{ $post->id }}</td>
        			<td>{{ $post->title }}</td>
        			<td>{{ $post->excerpt }}</td>
        			<td>
        				<a class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
        				<a class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
        			</td>
        		</tr>
        	@endforeach
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
@stop


@push('styles')
	<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('/adminlte/datatables-net/css/dataTables.bootstrap.min.css')}}">
	<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset('/adminlte/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endpush

@push('scripts')
	<!-- bootstrap datepicker -->
	<script src="{{ asset('/adminlte/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
  
  <!-- datables -->
  <script src="{{ asset('/adminlte/datatables-main/js/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('/adminlte/datatables-net/js/dataTables.bootstrap.min.js') }}"></script>

	<!-- page script -->
	<script>
  	$(function () {
    	$('#posts-table').DataTable();
  	});
	</script>
  




@endpush