@extends('laravel-authentication-acl::admin.layouts.base')

@section('content')

<h1>Create Categories</h1>
{{ Form::open(array('route' => 'admin.categories.store', 'class' => 'form-horizontal' ,'id' => 'brands-form')) }}
    @include('admin.categories._partials.form')
{{ Form::close() }}
@stop