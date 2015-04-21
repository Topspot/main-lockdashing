@extends('laravel-authentication-acl::admin.layouts.base')
@section('content')

<h1>Create Products</h1>
{{ Form::open(array('route' => 'admin.products.store' ,'files' => true, 'class' => 'form-horizontal' ,'id' => 'products-form') ) }}
    @include('admin.products._partials.form')
{{ Form::close() }}
@stop