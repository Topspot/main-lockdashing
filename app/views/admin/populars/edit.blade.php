@extends('laravel-authentication-acl::admin.layouts.base')

@section('content')

<h1>Edit Populars</h1>
    {{ Form::model($popular, array('route' => array('admin.populars.update', $popular->id), 'method' => 'put','class' => 'form-horizontal' ,'id' => 'populars-form')) }}
        @include('admin.populars._partials.form')
    {{ Form::close() }}
@stop