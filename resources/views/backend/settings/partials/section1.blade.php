<div class="row well">

  <div class="col-md-12">
    <h3>Product Section 1</h3>
    <div class="form-group{{ $errors->has('trending2title') ? ' has-error' : '' }}">
      <label for="trending2title" class="col-sm-2 control-label">Section Title *</label>
      <div class="col-sm-10">
        <input type="text" name="trending2title" class="form-control" id="trending2title"
               value="{{ getConfiguration('trending2title') }}">
        @if ($errors->has('trending2title'))
          <span class="help-block">
                    {{ $errors->first('trending2title') }}
                </span>
        @endif
      </div>
    </div>
    <div class="form-group">
      <label for="home_products_section1" class="col-sm-2 control-label">Select Options</label>
      <div class="col-sm-10">
        <div class="product-categories-dropdown">
          {!! Form::select('trending2[]', getProduct(getConfiguration('trending2')), getJsonConfiguration('trending2'), ['class' => 'form-control full-width product-list','multiple'=>true]) !!}
        </div>
      </div>
    </div>
  </div>
</div>
