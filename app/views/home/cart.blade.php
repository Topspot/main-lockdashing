@extends('_layouts.default')
@section('content')

<?php
//$current_user_id = App::make('authenticator')->getLoggedUser()->getID();
//$allcart = Session::get($current_user_id . '_cart');
?>
@if(count($all_product)) 
<div class="CSSTableGenerator" >
    <table >

        <tr>
            <td>
                Product
            </td>

            <td>
                Quality
            </td>
            <td>
                Price
            </td>
            <td>
                Action
            </td>
        </tr>
        <?php 
        $total=0;
        $count = 0; ?>
        @foreach($all_product as $cart)
        <?php // print_r($cart);exit(); ?>
        <tr>
            <td >
                <div style="width: 100%;">
                    <img src="<?php echo URL::to('/'); ?>/<?php echo $cart->image; ?>" style="float: left;" width="100" height="100" alt="product image">
                    <span style="margin-left: 10px; font-weight: bold; font-size: 20px; margin-top: 5px; width: 60%;float: left;">{{{ $cart->title }}}</span>
                    <span style="margin-left: 10px; font-weight: bold; font-size: 12px; margin-top: 5px; width: 60%;float: left;">{{{ $cart->subtitle }}}</span>
                    <span style="margin-left: 10px; font-weight: bold; font-size: 14px; margin-top: 10px; width: 60%;float: left;">${{{ $cart->price }}}</span>

                </div>
            </td>
            <td>
                <form method="get" action="<?php echo URL::to('/'); ?>/cart/<?php echo $cart->product_id; ?>" id="quality-form-<?php echo $count; ?>">
                    <!--<input name="id"  type="hidden" value="">-->
                    <input name="quality"  class="quality" style="width: 50px; height: 20px; text-align: center;" value="<?php echo $cart->quality; ?>" >
                    <input name="cart_id"  class="cart_id" type="hidden" value="<?php echo $cart->id; ?>" >
                </form>
            </td>
            <?php $count = $count + 1; ?>
            <td  data-price=<?php echo $cart->price; ?>>
                <?php $orginal_price= $cart->price * $cart->quality;
                $total= $total + $orginal_price; ?>
                <p class="prod-price">  Rs {{{ $orginal_price }}} </p>
            </td>
            <td>
                <a class="cancel" href="<?php echo URL::to('/'); ?>/cart/<?php echo $cart->product_id; ?>?removeid=<?php echo $cart->id; ?>">Cancel</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
<div class="total_div">
    Total : Rs <?php echo $total; ?>
</div>
<div style="width: 100%; margin: 55px 10px;">
<form action="" method="post" class="smart-green">
    <h1>Delivery Form 
        <span>Please fill all the texts in the fields.</span>
    </h1>
    <label>
        <span>First Name :</span>
        <input id="firstname" type="text" name="firstname" placeholder="First Name" />
    </label>
    <label>
        <span>Last Name :</span>
        <input id="lastname" type="text" name="lastname" placeholder="Last Name" />
    </label>
    <label>
        <span>Address 1 :</span>
        <input id="address1" type="text" name="address1" placeholder="Address 1" />
    </label>
    <label>
        <span>Address 2 :</span>
        <input id="address2" type="text" name="address2" placeholder="Address 2" />
    </label>
    <label>
        <span>City :</span>
        <input id="city" type="text" name="city" placeholder="City" />
    </label>
    <label>
        <span>Mobile No. :</span>
        <input id="mobileno" type="text" name="mobileno" placeholder="Mobile No." />
    </label>
    
    <label>
        <span>Your Email :</span>
        <input id="email" type="email" name="email" placeholder="Valid Email Address" />
    </label>
    
<!--    <label>
        <span>Message :</span>
        <textarea id="message" name="message" placeholder="Your Message to Us"></textarea>
    </label> 
     <label>
        <span>Subject :</span><select name="selection">
        <option value="Job Inquiry">Job Inquiry</option>
        <option value="General Question">General Question</option>
        </select>
    </label>    -->
     <label>
        <span>&nbsp;</span> 
        <input type="button" class="button" value="Checkout" /> 
        <span>&nbsp;</span> 
        <input type="button" class="button" value="Continue" /> 
    </label>    
</form>
</div>  





@endif
@stop