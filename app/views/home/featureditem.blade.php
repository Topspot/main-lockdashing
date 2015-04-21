@extends('_layouts.default')
@section('content')
@if(count($featureditems))
<?php $count=0; ?>
    @foreach($featureditems as $featureditem)
<div class="item-box">
    <figure>
        <img src="<?php echo $featureditem->image; ?>" alt="image">

            <figcaption>
                <div class="item-star"></div>                        
                <div class="item-search-icon"><i class="fa fa-search search-icon fa-2x"></i></div>     
                <div class="fivestar"></div>

                <!--<p><a href="#">Read More</a></p>-->
                <div class="item-options">
                    <a href="#" class="option-price">Rs{{{ $featureditem->price }}}</a>
                    <a href="#" class="option-cart"><i class="fa fa-cart-plus"></i></a>
                    <a href="#"class="option-heart" data-bind="<?php echo  $featureditem->id; ?>"><i class="fa fa-heart"></i><div class="likes-no">{{{ $featureditem->likes }}}</div></a>
                    <a href="<?php echo URL::to('/'); ?>/details/<?php echo  $featureditem->id; ?>"class="option-detail">View Details</a>
                </div>
            </figcaption>
    </figure>
    <div class="item-box-text"> <span style="font-size:14px; color: #801d0a; margin-bottom: 10px;" >{{{ $featureditem->title }}}</span></br> <p style="margin-top: 6px;">{{{ $featureditem->subtitle }}}</p></div>

</div>  
    <?php $count=$count + 1; ?>
    
    @if($count == 3)
    <div style="margin-bottom: 20px; border-top: 2px solid #ede8dd; border-bottom: 2px solid #fff; width: 100%; height: 0px; float: left;"></div>
    <?php $count=0; ?>
    @endif
    @endforeach

@endif
<?php echo $featureditems->links(); ?>
@stop