@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')
	@if(session('success'))
		<h3>{{ session('success')['messages'] }}</h3>
	@endif

	{!! Form::open(['route' => 'user.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
		@include('user.form-fields')
		@include('templates.formulario.submit', ['input' => 'Cadastrar'])
	{!! Form::close() !!}

	@include('user.list', ['user_list' => $users])
@endsection