@extends('laravel-authentication-acl::admin.layouts.base')

@section('content')

<h1>Create Sub Categories</h1>
{{ Form::open(array('route' => 'admin.subcategories.store', 'class' => 'form-horizontal' ,'id' => 'subcategories-form')) }}
    @include('admin.subcategories._partials.form')
{{ Form::close() }}
@stop