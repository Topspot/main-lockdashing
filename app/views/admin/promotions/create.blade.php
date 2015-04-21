@extends('laravel-authentication-acl::admin.layouts.base')

@section('content')

<h1>Add Promotion Image</h1>
{{ Form::open(array('route' => 'admin.promotions.store','files' => true, 'class' => 'form-horizontal' ,'id' => 'promotions-form')) }}
    @include('admin.promotions._partials.form')
{{ Form::close() }}
@stop