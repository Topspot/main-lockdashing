{{ Form::hidden('user_id',App::make('authenticator')->getLoggedUser()->getId()) }}
<div class="form-group" style="height: 40px;">
    <label class="col-sm-3 control-label no-padding-right" > Brands </label>

    <div class="col-sm-9">
        {{ Form::select('brand_id', Brand::lists('name', 'id'),null,array('class' => 'col-xs-10 col-sm-5')) }}
      
    </div>
</div>
<div class="form-group" style="height: 40px;">
    <label class="col-sm-3 control-label no-padding-right" > Category </label>

    <div class="col-sm-9">
        {{ Form::select('category_id', Category::lists('name', 'id'),null,array('class' => 'col-xs-10 col-sm-5 category-list')) }}
       
    </div>
</div>
<div class="form-group" style="height: 40px;">
    <label class="col-sm-3 control-label no-padding-right" > Sub category </label>

    <div class="col-sm-9">
        {{ Form::select('subcategory_id', array(),null,array('class' => 'col-xs-10 col-sm-5 subcategory-list')) }}
       
    </div>
</div>
<div class="form-group" style="height: 40px;">
    <label class="col-sm-3 control-label no-padding-right" > Title </label>

    <div class="col-sm-9">
        {{ Form::text('title',null,array('class' => 'col-xs-10 col-sm-5')) }}
    </div>
</div>

<div class="form-group" style="height: 40px;">
    <label class="col-sm-3 control-label no-padding-right" > Sub Title </label>

    <div class="col-sm-9">
        {{ Form::text('subtitle',null,array('class' => 'col-xs-10 col-sm-5')) }}
   
    </div>
</div>

<div class="form-group" >
    <label class="col-sm-3 control-label no-padding-right" > Price </label>

    <div class="col-sm-9">
        {{ Form::text('price',null,array('class' => 'col-xs-10 col-sm-5')) }}
      
    </div>
</div>     
<!--<div class="form-group" >
    <label class="col-sm-3 control-label no-padding-right" > Likes </label>

    <div class="col-sm-9">-->
        {{ Form::hidden('likes',0,array('class' => 'col-xs-10 col-sm-5')) }}
      
<!--    </div>
</div>        -->
<!--<div class="form-group" >
    <label class="col-sm-3 control-label no-padding-right" > Star </label>

    <div class="col-sm-9">-->
        {{ Form::hidden('star',0,array('class' => 'col-xs-10 col-sm-5')) }}
     
<!--    </div>
</div>-->
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" > File </label>

    <div class="col-sm-9">
         <?php if(isset($product)){?>
         {{ Form::file('image',array('class' => 'col-xs-10 col-sm-5','id' => 'fileupload')) }}
        <?php }else{ ?>  
        {{ Form::file('image',array('class' => 'col-xs-10 col-sm-5 required','id' => 'fileupload')) }}
        <?php } ?>  
    </div>
  
</div>
<?php if(isset($product)){?>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" >  </label>
    <div class="col-sm-9">               
    <div >
        
        <img src="<?php echo URL::to('/'); ?>/<?php echo $product->image; ?>" width="200px" height="200px" alt="form product image"></div>
    </div>  
</div>
  <?php } ?>  
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" > File </label>

    <div class="col-sm-9">
         <?php if(isset($product)){?>
         {{ Form::file('image1',array('class' => 'col-xs-10 col-sm-5','id' => 'fileupload')) }}
        <?php }else{ ?>  
        {{ Form::file('image1',array('class' => 'col-xs-10 col-sm-5 required','id' => 'fileupload')) }}
        <?php } ?>  
    </div>
  
</div>
<?php if(isset($product)){?>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" >  </label>
    <div class="col-sm-9">               
    <div >
        
        <img src="<?php echo URL::to('/'); ?>/<?php echo $product->image1; ?>" width="200px" height="200px" alt="form product image"></div>
    </div>  
</div>
  <?php } ?>  
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" > File </label>

    <div class="col-sm-9">
         <?php if(isset($product)){?>
         {{ Form::file('image2',array('class' => 'col-xs-10 col-sm-5','id' => 'fileupload')) }}
        <?php }else{ ?>  
        {{ Form::file('image2',array('class' => 'col-xs-10 col-sm-5 required','id' => 'fileupload')) }}
        <?php } ?>  
    </div>
  
</div>
<?php if(isset($product)){?>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" >  </label>
    <div class="col-sm-9">               
    <div >
        
        <img src="<?php echo URL::to('/'); ?>/<?php echo $product->image2; ?>" width="200px" height="200px" alt="form product image"></div>
    </div>  
</div>
  <?php } ?>  
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" > File </label>

    <div class="col-sm-9">
         <?php if(isset($product)){?>
         {{ Form::file('image3',array('class' => 'col-xs-10 col-sm-5','id' => 'fileupload')) }}
        <?php }else{ ?>  
        {{ Form::file('image3',array('class' => 'col-xs-10 col-sm-5 required','id' => 'fileupload')) }}
        <?php } ?>  
    </div>
  
</div>
<?php if(isset($product)){?>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" >  </label>
    <div class="col-sm-9">               
    <div >
        
        <img src="<?php echo URL::to('/'); ?>/<?php echo $product->image3; ?>" width="200px" height="200px" alt="form product image"></div>
    </div>  
</div>
  <?php } ?>  
{{ Form::hidden('featured',0,array('class' => 'col-xs-10 col-sm-5')) }}

<div style="clear: both;"></div>
<div class="clearfix form-actions">
    <div class="col-md-offset-3 col-md-9">
        {{ Form::submit('Save',array('class' => 'btn btn-info')) }}
        &nbsp; &nbsp; &nbsp;
        <a href="/admin/products" class="btn btn-grey">Back</a>
<!--        <button class="btn" type="reset">            
            Back
        </button>-->
    </div>
</div>
