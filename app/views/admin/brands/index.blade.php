@extends('laravel-authentication-acl::admin.layouts.base')

@section('content')
<h1>Brands</h1>
{{ link_to_route('admin.brands.create', 'Create new Brand',array(), array('class' => 'btn btn-inverse')) }}
<button class="btn btn-danger" onclick="multipleDelete('brands');"><i class="icon-trash bigger-130"></i> Multiple Delete</button>
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
                                                <th>Image</th>
                                                <th></th>
                                        </tr>
                                </thead>

                                <tbody class="product-table">
                                    @if(count($brands))
                                     @foreach($brands as $brand)
                                        <tr data-id="<?php echo $brand->id ?>">
                                                <td class="center">
                                                        <label>
                                                                <input type="checkbox" class="ace checkbox1" />
                                                                <span class="lbl"></span>
                                                        </label>
                                                </td>

                                                <td>
<!--                                                        <a href="#">app.com</a>-->
                                                        {{{ $brand->name }}}
                                                </td>
                                                <td>

                                                       <img src="<?php echo URL::to('/'); ?>/<?php echo $brand->image; ?>" width="50px" height="50px" alt="brand image">
                                                </td>

                                                <td>
                                                        <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                                                
                                                                <a class="green" href="<?php echo URL::to('/'); ?>/admin/brands/<?php echo $brand->id ?>/edit">
                                                                        <i class="icon-pencil bigger-130"></i>
                                                                </a>

                                                                <a class="red" href="#" onclick="openModal('brands','<?php echo $brand->id; ?>','<?php echo $brand->name; ?>');">
                                                                        <i class="icon-trash bigger-130"></i>
                                                                </a>
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
                     <?php echo $brands->links(); ?>
                </div>
        </div>
</div>
@stop