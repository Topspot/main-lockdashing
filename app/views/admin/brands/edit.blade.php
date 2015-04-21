@extends('laravel-authentication-acl::admin.layouts.base')

@section('content')

<h1>Edit Brands</h1>
    {{ Form::model($brand, array('route' => array('admin.brands.update', $brand->id), 'method' => 'put','files' => true,'class' => 'form-horizontal' ,'id' => 'brands-form')) }}
        @include('admin.brands._partials.form')
    {{ Form::close() }}
@stop