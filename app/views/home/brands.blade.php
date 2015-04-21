@extends('_layouts.default')
@section('content')
@if(count($allbrands))
<?php $count=0; ?>
    @foreach($allbrands as $brand)
<div class="item-box">
    <figure>
        <img src="<?php echo $brand->image; ?>" alt="image">

    </figure>
    <div class="item-box-text"> <span style="font-size:14px; color: #801d0a; margin-bottom: 10px;" >{{{ $brand->name }}}</span></div>

</div>  
    <?php $count=$count + 1; ?>
    
    @if($count == 3)
    <div style="margin-bottom: 20px; border-top: 2px solid #ede8dd; border-bottom: 2px solid #fff; width: 100%; height: 0px; float: left;"></div>
    <?php $count=0; ?>
    @endif
    @endforeach

@endif
<?php echo $allbrands->links(); ?>
@stop