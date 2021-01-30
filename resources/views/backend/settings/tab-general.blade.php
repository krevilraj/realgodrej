<div class="tab-pane fade active show" id="custom-tabs-four-general" role="tabpanel"
     aria-labelledby="custom-tabs-four-general-tab">
    <div class="form-group{{ $errors->has('ribbon_text') ? ' has-error' : '' }}">
        <label for="ribbon_text" class="col-sm-2 control-label">Ribbon Text
            *</label>
        <div class="col-sm-10">
            <input type="text" name="ribbon_text" class="form-control"
                   id="ribbon_text"
                   value="{{ getConfiguration('ribbon_text') }}">
            @if ($errors->has('ribbon_text'))
                <span class="help-block">
                    {{ $errors->first('ribbon_text') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('site_title') ? ' has-error' : '' }}">
        <label for="site_title" class="col-sm-2 control-label">Site Title *</label>
        <div class="col-sm-10">
            <input type="text" name="site_title" class="form-control"
                   id="site_title"
                   value="{{ getConfiguration('site_title') }}">
            @if ($errors->has('site_title'))
                <span class="help-block">
                    {{ $errors->first('site_title') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('site_description') ? ' has-error' : '' }}">
        <label for="site_description" class="col-sm-2 control-label">Site
            Description</label>
        <div class="col-sm-10">
            <input type="text" name="site_description" class="form-control"
                   id="site_description"
                   value="{{ getConfiguration('site_description') }}">
            <span>In a few words, explain what this site is about.</span>
            @if ($errors->has('site_description'))
                <span class="help-block">
                    {{ $errors->first('site_description') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('site_primary_email') ? ' has-error' : '' }}">
        <label for="site_primary_email" class="col-sm-2 control-label">Primary Email
            *</label>
        <div class="col-sm-10">
            <input type="email" name="site_primary_email" class="form-control"
                   id="site_primary_email"
                   value="{{ getConfiguration('site_primary_email') }}" required>
            @if ($errors->has('site_primary_email'))
                <span class="help-block">
                    {{ $errors->first('site_primary_email') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('site_secondary_email') ? ' has-error' : '' }}">
        <label for="site_secondary_email" class="col-sm-2 control-label">Secondary
            Email *</label>
        <div class="col-sm-10">
            <input type="email" name="site_secondary_email" class="form-control"
                   id="site_secondary_email"
                   value="{{ getConfiguration('site_secondary_email') }}">
            @if ($errors->has('site_secondary_email'))
                <span class="help-block">
                    {{ $errors->first('site_secondary_email') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('site_primary_phone') ? ' has-error' : '' }}">
        <label for="site_primary_phone" class="col-sm-2 control-label">Primary Phone
            *</label>
        <div class="col-sm-10">
            <input type="text" name="site_primary_phone" class="form-control"
                   id="site_primary_phone"
                   value="{{ getConfiguration('site_primary_phone') }}" required>
            @if ($errors->has('site_primary_phone'))
                <span class="help-block">
                    {{ $errors->first('site_primary_phone') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('site_secondary_phone') ? ' has-error' : '' }}">
        <label for="site_secondary_phone" class="col-sm-2 control-label">Secondary
            Phone</label>
        <div class="col-sm-10">
            <input type="text" name="site_secondary_phone" class="form-control"
                   id="site_secondary_phone"
                   value="{{ getConfiguration('site_secondary_phone') }}">
            @if ($errors->has('site_secondary_phone'))
                <span class="help-block">
                    {{ $errors->first('site_secondary_phone') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('site_address') ? ' has-error' : '' }}">
        <label for="site_address" class="col-sm-2 control-label">Address
            *</label>
        <div class="col-sm-10">
            <textarea name="site_address" id="site_address" class="form-control"
                      rows="6">{{ getConfiguration('site_address') }}</textarea>
            @if ($errors->has('site_address'))
                <span class="help-block">
                    {{ $errors->first('site_address') }}
                </span>
            @endif
        </div>
    </div>


    <div class="form-group{{ $errors->has('site_logo') ? ' has-error' : '' }}">
        <label for="site_logo" class="col-sm-2 control-label">Site Logo</label>
        <div class="col-sm-10">
            <input type="file" name="site_logo" id="site_logo" class="form-control">
            @if ($errors->has('site_logo'))
                <span class="help-block">
                    {{ $errors->first('site_logo') }}
                </span>
            @endif

            @if(getConfiguration('site_logo'))
                <div class="mt-15 half-width">
                    <img src="{{ url('storage') . '/' . getConfiguration('site_logo') }}" width="150px"
                         class="thumbnail img-responsive">
                </div>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('footer_logo') ? ' has-error' : '' }}">
        <label for="footer_logo" class="col-sm-2 control-label">Footer logo</label>
        <div class="col-sm-10">
            <input type="file" name="footer_logo" id="footer_logo"
                   class="form-control">
            @if ($errors->has('footer_logo'))
                <span class="help-block">
                    {{ $errors->first('footer_logo') }}
                </span>
            @endif

            @if(getConfiguration('footer_logo'))
                <div class="mt-15 half-width">
                    <img src="{{ url('storage') . '/' . getConfiguration('footer_logo') }}" width="150px"
                         class="thumbnail img-responsive">
                </div>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('copyright') ? ' has-error' : '' }}">
        <label for="copyright" class="col-sm-2 control-label">Copyright</label>
        <div class="col-sm-10">
            <input type="text" name="copyright" class="form-control"
                   id="copyright"
                   value="{{ getConfiguration('copyright') }}">
            @if ($errors->has('copyright'))
                <span class="help-block">
                    {{ $errors->first('copyright') }}
                </span>
            @endif
        </div>
    </div>
</div>
<!-- /.tab-pane -->
