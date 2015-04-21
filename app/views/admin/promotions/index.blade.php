@extends('laravel-authentication-acl::admin.layouts.base')

@section('content')
<h1>Promotion Images</h1>
{{ link_to_route('admin.promotions.create', 'Add new Promotion Image',array(), array('class' => 'btn btn-inverse')) }}
<button class="btn btn-danger" onclick="multipleDelete('promotions');"><i class="icon-trash bigger-130"></i> Multiple Delete</button>
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
                                                <th>Image</th>
                                                <th></th>
                                        </tr>
                                </thead>

                                <tbody class="product-table">
                                    @if(count($promotions))
                                     @foreach($promotions as $promotion)
                                        <tr data-id="<?php echo $promotion->id ?>">
                                                <td class="center">
                                                        <label>
                                                                <input type="checkbox" class="ace checkbox1" />
                                                                <span class="lbl"></span>
                                                        </label>
                                                </td>
                                                <td>

                                                       <img src="<?php echo URL::to('/'); ?>/<?php echo $promotion->image; ?>" width="300px" height="300px" alt="brand image">
                                                </td>

                                                <td>
                                                        <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                                                                
                                                                <a class="green" href="<?php echo URL::to('/'); ?>/admin/promotions/<?php echo $promotion->id ?>/edit">
                                                                        <i class="icon-pencil bigger-130"></i>
                                                                </a>

                                                                <a class="red" href="#" onclick="openModal('promotions','<?php echo $promotion->id; ?>','Promotions image');">
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
                </div>
        </div>
</div>
@stop