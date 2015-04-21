@extends('laravel-authentication-acl::admin.layouts.base')

@section('content')

<h1>Edit Category</h1>
    {{ Form::model($category, array('route' => array('admin.categories.update', $category->id), 'method' => 'put','class' => 'form-horizontal' ,'id' => 'categories-form')) }}
        @include('admin.categories._partials.form')
    {{ Form::close() }}
@stop