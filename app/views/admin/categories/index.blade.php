@extends('laravel-authentication-acl::admin.layouts.base')

@section('content')

<h1>Categories</h1>
{{ link_to_route('admin.categories.create', 'Create new Product',array(), array('class' => 'btn btn-inverse')) }}
<button class="btn btn-danger" onclick="multipleDelete('categories');"><i class="icon-trash bigger-130"></i> Multiple Delete</button>
<div class="row">
        <div class="col-xs-12">
                <div class="table-responsive">
                        <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                                <thead>
                                        <tr>
                                                <th class="center">
                                                        <label>
                                                                <input type="checkbox" class="ace" id="selectall" />
                                                                <span class="lbl"></span>
                                                        </label>
                                                </th>
                                                <th>Name</th>
                                                <th></th>
                                        </tr>
                                </thead>

                                <tbody class="product-table">
                                    @if(count($categories))
                                     @foreach($categories as $category)
                                        <tr data-id="<?php echo $category->id ?>">
                                                <td class="center">
                                                        <label>
                                                                <input type="checkbox" class="ace checkbox1" />
                                                                <span class="lbl"></span>
                                                        </label>
                                                </td>

                                                <td>
<!--                                                        <a href="#">app.com</a>-->
                                                        {{{ $category->name }}}
                                                </td>

                                                <td>
                                                        <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                                                
                                                                <a class="green" href="<?php echo URL::to('/'); ?>/admin/categories/<?php echo $category->id ?>/edit">
                                                                        <i class="icon-pencil bigger-130"></i>
                                                                </a>

                                                                  <a class="red" href="#" onclick="openModal('categories','<?php echo $category->id; ?>','<?php echo $category->name; ?>');">
                                                                        <i class="icon-trash bigger-130"></i>
                                                                </a>
<!--                                                                        {{ Form::open(array('route' => array('admin.categories.destroy', $category->id), 'method' => 'delete', 'class' => 'destroy')) }}
            {{ Form::submit('Delete') }}-->

                                                        </div>

                                                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                                                                <div class="inline position-relative">
                                                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                                                                <i class="icon-caret-down icon-only bigger-120"></i>
                                                                        </button>

                                                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                                                <li>
                                                                                        <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                                                                <span class="blue">
                                                                                                        <i class="icon-zoom-in bigger-120"></i>
                                                                                                </span>
                                                                                        </a>
                                                                                </li>

                                                                                <li>
                                                                                        <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                                                                <span class="green">
                                                                                                        <i class="icon-edit bigger-120"></i>
                                                                                                </span>
                                                                                        </a>
                                                                                </li>

                                                                                <li>
                                                                                        <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                                                                <span class="red">
                                                                                                        <i class="icon-trash bigger-120"></i>
                                                                                                </span>
                                                                                        </a>
                                                                                </li>
                                                                        </ul>
                                                                </div>
                                                        </div>
                                                </td>
                                        </tr>       
                                           @endforeach
                                        @endif
                                        
                                </tbody>
                        </table>
                     <?php echo $categories->links(); ?>
                
                </div>
        </div>
</div>
<!--@if(count($categories))
    <ul>
    @foreach($categories as $category)
        <li>
            {{ link_to_route('admin.categories.edit', $category->name, array($category->id)) }}
            {{ Form::open(array('route' => array('admin.categories.destroy', $category->id), 'method' => 'delete', 'class' => 'destroy')) }}
            {{ Form::submit('Delete') }}
            {{ Form::close() }}
        </li>
    @endforeach
    </ul>
@endif-->

@stop