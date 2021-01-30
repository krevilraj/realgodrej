<div class="tab-pane fade" id="custom-tabs-four-home" role="tabpanel"
     aria-labelledby="custom-tabs-four-home-tab">
    <div class="form-group{{ $errors->has('home_about_title') ? ' has-error' : '' }}">
        <label for="home_about_title" class="col-sm-2 control-label">About us title</label>
        <div class="col-sm-10">

            <input type="text" name="home_about_title" class="form-control" id="home_about_title"
                   value="{{ getConfiguration('home_about_title') }}">
            @if ($errors->has('home_about_title'))
                <span class="help-block">
                    {{ $errors->first('home_about_title') }}
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('home_about_description') ? ' has-error' : '' }}">
        <label for="home_about_description" class="col-sm-2 control-label">About us Description</label>
        <div class="col-sm-10">

            <textarea name="home_about_description" id="home_about_description" class="form-control"
                      rows="5">{{ getConfiguration('home_about_description') }}</textarea>
            @if ($errors->has('home_about_description'))
                <span class="help-block">
                    {{ $errors->first('home_about_description') }}
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('home_about_image') ? ' has-error' : '' }}">
        <label for="home_about_image" class="col-sm-2 control-label">About Image</label>
        <div class="col-sm-10">
            <input type="file" name="home_about_image" id="home_about_image"
                   class="form-control">
            @if ($errors->has('home_about_image'))
                <span class="help-block">
                    {{ $errors->first('home_about_image') }}
                </span>
            @endif

            @if(getConfiguration('home_about_image'))
                <div class="mt-15 half-width">
                    <img src="{{ url('storage') . '/' . getConfiguration('home_about_image') }}" width="150px"
                         class="thumbnail img-responsive">
                </div>
            @endif
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @include("backend.settings.partials.section1")
        </div>

    </div>

    <div class="card">
        <div class="card-body">
            <h4>Products Section 1 </h4>
            <div class="form-group">
                <label for="home_about_title" class="col-sm-6 control-label">Our Offerings</label>
                <div class="col-sm-10">

                    <input type="text" name="top_product_title" class="form-control" id="home_about_title"
                           value="{{ getConfiguration('top_product_title') }}">

                </div>
            </div>
            <div class="form-group">
                <label for="home_products_section1" class="col-sm-6 control-label">Select Options</label>
                <div class="col-sm-10">
                    <div class="product-categories-dropdown">
                        {!! Form::select('products_section_1[]', $categories, $selectedCategories_1, ['class' => 'form-control full-width select2', 'multiple' => 'multiple']) !!}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="card">
        <div class="card-body">
            <h4>Category Section 1 </h4>
            <div class="form-group">
                <label for="cat_title_section1" class="col-sm-6 control-label">Section Title</label>
                <div class="col-sm-10">

                    <input type="text" name="cat_title_section1" class="form-control" id="cat_title_section1"
                           value="{{ getConfiguration('cat_title_section1') }}">

                </div>
            </div>
            <div class="form-group">
                <label for="home_products_section1" class="col-sm-6 control-label">Select Options</label>
                <div class="col-sm-10">
                    <div class="product-categories-dropdown">
                        {!! Form::select('cat_section1', $categories, getConfiguration('cat_section1'), ['class' => 'form-control full-width select2']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="cat_item_no_section1" class="col-sm-12 control-label">No of product to display</label>
                <div class="col-sm-10">

                    <input type="text" name="cat_item_no_section1" class="form-control" id="cat_item_no_section1"
                           value="{{ getConfiguration('cat_item_no_section1') }}">

                </div>
            </div>
        </div>

    </div>

    <div class="card">
        <div class="card-body">
            <h4>Category Section 2 </h4>
            <div class="form-group">
                <label for="cat_title_section2" class="col-sm-6 control-label">Section Title</label>
                <div class="col-sm-10">

                    <input type="text" name="cat_title_section2" class="form-control" id="cat_title_section2"
                           value="{{ getConfiguration('cat_title_section2') }}">

                </div>
            </div>
            <div class="form-group">
                <label for="home_products_section2" class="col-sm-6 control-label">Select Options</label>
                <div class="col-sm-10">
                    <div class="product-categories-dropdown">
                        {!! Form::select('cat_section2', $categories, getConfiguration('cat_section2'), ['class' => 'form-control full-width select2']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="cat_item_no_section2" class="col-sm-12 control-label">No of product to display</label>
                <div class="col-sm-10">

                    <input type="text" name="cat_item_no_section2" class="form-control" id="cat_item_no_section2"
                           value="{{ getConfiguration('cat_item_no_section2') }}">

                </div>
            </div>
        </div>

    </div>
</div>


<!-- /.tab-pane -->
