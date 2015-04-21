@extends('_layouts.default')
@section('content')
<div style="width:100%; height:500px;">
    <div style="width:30%; float: left;">
        <div class="zoom-section">    	  
            <div class="zoom-small-image">
                <a href='#' class = 'cloud-zoom' id='zoom1' rel="adjustX:10, adjustY:-4"><img src="<?php echo URL::to('/'); ?>/<?php echo $current_product->image; ?>" alt='' width="240" height="320" title="Optional title display" /></a></div>
            <div class="zoom-desc">
                <h3></h3>       
                <p>
                    <?php if(isset($current_product->image1) && !empty($current_product->image1)){?>
                    <a href='#' class='cloud-zoom-gallery' title='Red' rel="useZoom: 'zoom1', smallImage: '<?php echo URL::to('/'); ?>/<?php echo $current_product->image; ?>' "><img class="zoom-tiny-image" src="<?php echo URL::to('/'); ?>/<?php echo $current_product->image; ?>" width="48" height="64" alt = "Thumbnail 1"/></a>
                    <a href='#' class='cloud-zoom-gallery' title='Red' rel="useZoom: 'zoom1', smallImage: '<?php echo URL::to('/'); ?>/<?php echo $current_product->image1; ?>' "><img class="zoom-tiny-image" src="<?php echo URL::to('/'); ?>/<?php echo $current_product->image1; ?>" width="48" height="64" alt = "Thumbnail 1"/></a>
                    <a href='#' class='cloud-zoom-gallery' title='Red' rel="useZoom: 'zoom1', smallImage: '<?php echo URL::to('/'); ?>/<?php echo $current_product->image2; ?>' "><img class="zoom-tiny-image" src="<?php echo URL::to('/'); ?>/<?php echo $current_product->image2; ?>" width="48" height="64" alt = "Thumbnail 1"/></a>


                    <a href='#' class='cloud-zoom-gallery' title='Blue' rel="useZoom: 'zoom1', smallImage: '<?php echo URL::to('/'); ?>/<?php echo $current_product->image3; ?>' "><img class="zoom-tiny-image" src="<?php echo URL::to('/'); ?>/<?php echo $current_product->image3; ?>" width="48" height="64" alt = "Thumbnail 3"/></a>
                    <?php } ?>    
                </p>

            </div>
        </div><!--zoom-section end-->
    </div>
    <div style="width: 60%; float: right; padding: 20px 0px;">
        <p class="main-title">{{{ $current_product->title }}}</p>
        <p class="main-subtitle">{{{ $current_product->subtitle }}}</p>
        <img src="<?php echo URL::to('/'); ?>/images/rating.png" alt="rating">
        <div style="width: 100%; height:39px;   margin: 15px 0px;">
            <p class="main-price">Rs{{{ $current_product->price }}}</p>
            <div style="width: 60%;float: right; font-weight: bold; margin-left: 20px;">Size : <select name="mydropdown" style="width: 60%; font-weight: normal;">
                    <option value="">Select size</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
        </div>
        <p style="margin: 10px 0px; width: 100%">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' </p>
        <div>
                <a href="<?php echo URL::to('/'); ?>/cart/<?php echo $current_product->id; ?>"> <button name="add to card" type="button" class="paypal_btn"><i class="fa fa-shopping-cart"></i> Add to cart</button></a>


        </div>

    </div>

</div>
<div style="color: #871606; margin-bottom: 20px; font-size: 21px;">Latest products</div>

<div style="width: 100%">

    @if(count($products))
<?php $count = 0; ?>
    @foreach($products as $product)
    <div class="item-box">
        <figure>
            <img src="<?php echo URL::to('/'); ?>/<?php echo $product->image; ?>" alt="image">

            <figcaption>
                <div class="item-star"></div>                        
                <a  style="border: none; padding: 0px;" href="<?php echo URL::to('/'); ?>/details/<?php echo  $product->id; ?>"><div class="item-search-icon"><i class="fa fa-search search-icon fa-2x"></i></div></a>     
                <div class="fivestar"> <img src="<?php echo URL::to('/'); ?>/images/rating.png" alt="rating" style=" width: 62px !important;height: 13px !important;padding: 1px;"></div>

                <!--<p><a href="#">Read More</a></p>-->
                <div class="item-options">
                    <a href="#" class="option-price">Rs{{{ $product->price }}}</a>
                    <a href="#" class="option-cart"><i class="fa fa-cart-plus"></i></a>
                    <a href="#"class="option-heart" data-bind="<?php echo $product->id; ?>"><i class="fa fa-heart"></i><div class="likes-no">{{{ $product->likes }}}</div></a>
                    <a href="<?php echo URL::to('/'); ?>/details/<?php echo $product->id; ?>"class="option-detail">View Details</a>

                </div>
            </figcaption>
        </figure>
        <div class="item-box-text"> <span style="font-size:14px; color: #801d0a; margin-bottom: 10px;" >{{{ $product->title }}}</span></br> <p style="margin-top: 6px;">{{{ $product->subtitle }}}</p></div>

    </div>  
        <?php $count = $count + 1; ?>

    @if($count == 3)
    <div style="margin-bottom: 20px; border-top: 2px solid #ede8dd; border-bottom: 2px solid #fff; width: 100%; height: 0px; float: left;"></div>
        <?php $count = 0; ?>
    @endif
    @endforeach

    @endif

</div>

@stop