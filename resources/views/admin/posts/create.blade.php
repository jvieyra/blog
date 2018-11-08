@extends('admin.layout')
@section('header')
	<h1> POSTS <small>Crear Publicación </small> </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="{{ route('admin.posts.index') }}"><i class="fa fa-list"></i> Posts</a></li>
    <li class="active">Crear</li>
  </ol>
@stop

@section('content')
	<div class="row">
		<form method="POST" action="{{ route('admin.posts.store') }}">
			{{ csrf_field() }}
			<div class="col-md-8">
				<div class="box box-primary">
					<div class="box-body">
						<div class="form-group {{ $errors->has('title') ? 'has-error':''}}">
							<label>Titulo de la publicación</label>
							<input name="title" value="{{ old('title') }}" class="form-control" placeholder="Ingresa aqui el titulo de la publicación"></input>
							{!! $errors->first('title','<span class="help-block">:message</span>') !!}
						</div>
						<div class="form-group {{ $errors->has('body') ? 'has-error':''}}">
							<label>Contenido de la publicación</label>
							<textarea name="body" id="editor"   class="form-control" rows="10" placeholder="Ingresa el contenido completo de la publicación">{{ old('body') }}</textarea>
							{!! $errors->first('body','<span class="help-block">:message</span>') !!}
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="box box-primary">
					<div class="box-body">
						<!-- Date -->
            <div class="form-group">
              <label>Fecha de publicación</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" value="{{ old('published_at') }}" name="published_at" class="form-control pull-right" id="datepicker">
              </div>
              <!-- /.input group -->
            </div>
            <!-- /.form group -->

						<div class="form-group {{ $errors->has('category') ? 'has-error':''}}">
							<label for="">Categorias</label>
							<select name="category" class="form-control">
								<option value="">Selecciona una categoria</option>
								@foreach($categories as $category)
									<option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : ''}} >{{ $category->name }}</option>

								@endforeach
							</select>
							{!! $errors->first('category','<span class="help-block">:message</span>') !!}
						</div>
						<!-- /.form group -->

						<div class="form-group {{ $errors->has('tags') ? 'has-error':''}}">
							<label for="">Etiquetas </label>
							<select name="tags[]" class="form-control select2" multiple="multiple"
											data-placeholder="Selecciona una o más etiquetas."
                      style="width: 100%;">
								@foreach($tags as $tag)
									<option {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}"> {{ $tag->name }} </option>
								@endforeach
              </select>
							{!! $errors->first('tags','<span class="help-block">:message</span>') !!}
						</div>
						<!-- /.form group -->

						<div class="form-group {{ $errors->has('excerpt') ? 'has-error':''}}">
							<label>Extracto publicación</label>
							<textarea name="excerpt" rows="4"class="form-control"  placeholder="Ingresa un extracto de la publicación">{{ old('excerpt') }}</textarea>
							{!! $errors->first('excerpt','<span class="help-block">:message</span>') !!}
						</div>
						<!-- /.form group -->

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Guardar Publicación</button>
						</div>
						<!-- /.form group -->
					</div>
				</div>
			</div>
		</form>
	</div>
@stop


@push('styles')
	<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{ asset('/adminlte/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('/adminlte/select2/dist/css/select2.min.css')}}">
@endpush

@push('scripts')
	<!-- CK Editor -->
	<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
	<!-- bootstrap datepicker -->
	<script src="{{ asset('/adminlte/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
	<!-- Select2 -->
	<script src="{{ asset('/adminlte/select2/dist/js/select2.full.min.js')}}"></script>


	<script>
 		//Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    CKEDITOR.replace('editor');

    //Initialize Select2 Elements
    $('.select2').select2();


	</script>

@endpush




