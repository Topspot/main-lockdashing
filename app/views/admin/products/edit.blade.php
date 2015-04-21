@extends('laravel-authentication-acl::admin.layouts.base')

@section('content')

<h1>Edit Product</h1>
    {{ Form::model($product, array('route' => array('admin.products.update', $product->id), 'method' => 'put','files' => true, 'class' => 'form-horizontal' ,'id' => 'products-form')) }}
        @include('admin.products._partials.form')
    {{ Form::close() }}
@stop