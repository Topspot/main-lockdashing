@extends('laravel-authentication-acl::admin.layouts.base')

@section('content')

<h1>Create Populars</h1>
{{ Form::open(array('route' => 'admin.populars.store', 'class' => 'form-horizontal' ,'id' => 'populars-form')) }}
    @include('admin.populars._partials.form')
{{ Form::close() }}
@stop