@extends('laravel-authentication-acl::admin.layouts.base')

@section('content')

<h1>Edit Sub Categories</h1>
    {{ Form::model($subcategory, array('route' => array('admin.subcategories.update', $subcategory->id), 'method' => 'put','class' => 'form-horizontal' ,'id' => 'subcategories-form')) }}
        @include('admin.subcategories._partials.form')
    {{ Form::close() }}
@stop