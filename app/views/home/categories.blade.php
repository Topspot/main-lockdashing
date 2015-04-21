@extends('_layouts.default')
@section('content')
@if(count($gotdata))
<?php $count=0; ?>
    @foreach($gotdata as $product)
<div class="item-box">
    <figure>
        <img src="<?php echo $product->image; ?>" alt="image">

            <figcaption>
                <div class="item-star"></div>                        
                <a  style="border: none; padding: 0px;" href="<?php echo URL::to('/'); ?>/details/<?php echo  $product->id; ?>"><div class="item-search-icon"><i class="fa fa-search search-icon fa-2x"></i></div></a>     
                <div class="fivestar"> <img src="<?php echo URL::to('/'); ?>/images/rating.png" alt="rating" style=" width: 62px !important;height: 13px !important;padding: 1px;"></div>

                <!--<p><a href="#">Read More</a></p>-->
                <div class="item-options">
                    <a href="#" class="option-price">Rs{{{ $product->price }}}</a>
                    <a href="#" class="option-cart"><i class="fa fa-cart-plus"></i></a>
                    <a href="#"class="option-heart" data-bind="<?php echo  $product->id; ?>"><i class="fa fa-heart"></i><div class="likes-no">{{{ $product->likes }}}</div></a>
                    <a href="<?php echo URL::to('/'); ?>/details/<?php echo  $product->id; ?>"class="option-detail">View Details</a>
                </div>
            </figcaption>
    </figure>
    <div class="item-box-text"> <span style="font-size:14px; color: #801d0a; margin-bottom: 10px;" >{{{ $product->title }}}</span></br> <p style="margin-top: 6px;">{{{ $product->subtitle }}}</p></div>

</div>  
    <?php $count=$count + 1; ?>
    
    @if($count == 3)
    <div style="margin-bottom: 20px; border-top: 2px solid #ede8dd; border-bottom: 2px solid #fff; width: 100%; height: 0px; float: left;"></div>
    <?php $count=0; ?>
    @endif
    @endforeach

@endif
<?php echo $gotdata->links(); ?>
@stop