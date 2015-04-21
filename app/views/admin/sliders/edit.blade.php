@extends('laravel-authentication-acl::admin.layouts.base')

@section('content')

<h1>Edit Slider Image</h1>
    {{ Form::model($slider, array('route' => array('admin.sliders.update', $slider->id), 'method' => 'put','files' => true,'class' => 'form-horizontal' ,'id' => 'sliders-form')) }}
        @include('admin.sliders._partials.form')
    {{ Form::close() }}
@stop