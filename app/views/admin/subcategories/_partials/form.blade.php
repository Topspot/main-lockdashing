<div class="form-group" style="height: 40px;">
    <label class="col-sm-3 control-label no-padding-right" > Name </label>

    <div class="col-sm-9">
        {{ Form::text('name',null ,array('class' => 'col-xs-10 col-sm-5')) }}
     
    </div>
</div>
<div class="form-group" style="height: 40px;">
    <label class="col-sm-3 control-label no-padding-right" > Category </label>

    <div class="col-sm-9">
        {{ Form::select('category_id', Category::lists('name', 'id'),null,array('class' => 'col-xs-10 col-sm-5')) }}
       
    </div>
</div>
<div class="clearfix form-actions" style=" height: 100px;">
    <div class="col-md-offset-3 col-md-9">
        {{ Form::submit('Save',array('class' => 'btn btn-info')) }}
        &nbsp; &nbsp; &nbsp;
        <a href="/admin/brands" class="btn btn-grey">Back</a>
    </div>
</div>