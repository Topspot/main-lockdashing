@extends('laravel-authentication-acl::admin.layouts.base')

@section('content')

<h1>Add Slider Image</h1>
{{ Form::open(array('route' => 'admin.sliders.store','files' => true, 'class' => 'form-horizontal' ,'id' => 'sliders-form')) }}
    @include('admin.sliders._partials.form')
{{ Form::close() }}
@stop