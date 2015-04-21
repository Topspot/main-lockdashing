@extends('laravel-authentication-acl::admin.layouts.base')

@section('content')

<h1>Create Brands</h1>
{{ Form::open(array('route' => 'admin.brands.store','files' => true, 'class' => 'form-horizontal' ,'id' => 'brands-form')) }}
    @include('admin.brands._partials.form')
{{ Form::close() }}
@stop