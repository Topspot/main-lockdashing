<div class="form-group" style="height: 40px;">
    <label class="col-sm-3 control-label no-padding-right" > File </label>

    <div class="col-sm-9">
         <?php if(isset($promotion)){?>
         {{ Form::file('image',array('class' => 'col-xs-10 col-sm-5','id' => 'fileupload')) }}
        <?php }else{ ?>  
        {{ Form::file('image',array('class' => 'col-xs-10 col-sm-5 required','id' => 'fileupload')) }}
        <?php } ?>  
    </div>
  
</div>
<?php if(isset($promotion)){?>
<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" >  </label>
    <div class="col-sm-9">               
    <div ><img src="<?php echo URL::to('/'); ?>/<?php echo $promotion->image; ?>" width="300px" height="200px"></div>
    </div>  
</div>
  <?php } ?>  
<div style="clear: both;"></div>
<div class="clearfix form-actions" style=" height: 100px;">
    <div class="col-md-offset-3 col-md-9">
        {{ Form::submit('Save',array('class' => 'btn btn-info')) }}
        &nbsp; &nbsp; &nbsp;
        <a href="<?php echo URL::to('/'); ?>/admin/promotions" class="btn btn-grey">Back</a>
    </div>
</div>