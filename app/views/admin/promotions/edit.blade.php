@extends('laravel-authentication-acl::admin.layouts.base')

@section('content')

<h1>Edit Promotion Image</h1>
    {{ Form::model($promotion, array('route' => array('admin.promotions.update', $promotion->id), 'method' => 'put','files' => true,'class' => 'form-horizontal' ,'id' => 'promotions-form')) }}
        @include('admin.promotions._partials.form')
    {{ Form::close() }}
@stop