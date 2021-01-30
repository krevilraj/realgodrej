<div class="tab-pane fade" id="custom-tabs-four-about-us" role="tabpanel"
     aria-labelledby="custom-tabs-four-about-us-tab">

    <div class="form-group{{ $errors->has('about_description') ? ' has-error' : '' }}">
        <label for="about_description" class="col-sm-2 control-label">About us Description</label>
        <div class="col-sm-10">
            <textarea name="about_description" id="about_description" class="form-control"
                      rows="5">{{ getConfiguration('about_description') }}</textarea>
            @if ($errors->has('about_description'))
                <span class="help-block">
                    {{ $errors->first('about_description') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('ceo_message') ? ' has-error' : '' }}">
        <label for="ceo_message" class="col-sm-2 control-label">Message from CEO</label>
        <div class="col-sm-10">
            <textarea name="ceo_message" id="ceo_message" class="form-control"
                      rows="6">{{ getConfiguration('ceo_message') }}</textarea>
            @if ($errors->has('ceo_message'))
                <span class="help-block">
                    {{ $errors->first('ceo_message') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('ceo_image') ? ' has-error' : '' }}">
        <label for="ceo_image" class="col-sm-2 control-label">CEO Image</label>
        <div class="col-sm-10">
            <input type="file" name="ceo_image" id="ceo_image" class="form-control">
            @if ($errors->has('ceo_image'))
                <span class="help-block">
                    {{ $errors->first('ceo_image') }}
                </span>
            @endif

            @if(getConfiguration('ceo_image'))
                <div class="mt-15 half-width">
                    <img src="{{ url('storage') . '/' . getConfiguration('ceo_image') }}"
                         class="thumbnail img-responsive">
                </div>
            @endif
        </div>
    </div>


</div>
<!-- /.tab-pane -->