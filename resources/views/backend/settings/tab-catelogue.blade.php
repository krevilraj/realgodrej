<div class="tab-pane fade" id="custom-tabs-four-catelogue-us" role="tabpanel"
     aria-labelledby="custom-tabs-four-catelogue-us-tab">


  <div class="form-group{{ $errors->has('catelogue') ? ' has-error' : '' }}">
    <label for="catelogue" class="col-sm-2 control-label">Catelogue</label>
    <div class="col-sm-10">
      <input type="file" name="catelogue" id="catelogue" class="form-control">
      @if ($errors->has('catelogue'))
        <span class="help-block">
                    {{ $errors->first('catelogue') }}
                </span>
      @endif

      @if(getConfiguration('catelogue'))
        <div class="mt-15 half-width">

          <a href="{{ url('storage') . '/' . getConfiguration('catelogue') }}">
            <img src="{{asset('images/pdfimg.png')}}"
                 class="thumbnail img-responsive">
          </a>
        </div>
      @endif
    </div>
  </div>


</div>
<!-- /.tab-pane -->