<!-- general form elements -->
<div class="card">
    <div class="card-header with-border">
        <h3 class="card-title">Add New</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::text('name',null, ['class'=> 'form-control', 'placeholder' => 'Name']) !!}

            @if ($errors->has('name'))
                <span class="help-block">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </div>

        <div style="display:none" class="form-group mb-none{{ $errors->has('parent_id') ? ' has-error' : '' }}">
            <select name="parent_id" id="parent" class="form-control select2">
                <option value="0">Select Parent Category</option>
                @foreach($allCategories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @include('backend.categories.category-dropdown')
                @endforeach
            </select>

            @if ($errors->has('parent_id'))
                <span class="help-block">
                    {{ $errors->first('parent_id') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="home_about_title" class="col-sm-12 control-label">Description</label>
            <div class="col-sm-10">

                <textarea name="description" id="description" cols="30" rows="10"></textarea>
            </div>
        </div>

        <div class="form-group @if ($errors->has('featured_image')) has-error @endif">
            {!! Form::label('featured_image','Featured Image', ['class' => 'control-label']) !!}
            {!! Form::file('featured_image', ['class'=> 'form-control']) !!}
            @if ($errors->has('featured_image'))
                <span class="help-block">
                        {{ $errors->first('featured_image') }}
                    </span>
            @endif

            @if(isset($cat) && null !== $cat->getImage())
                <div class="mt-15">
                    <img src="{{ $cat->getImage()->mediumUrl }}" class="thumbnail img-responsive mb-none">
                </div>
            @endif

        </div>

        <div class="form-group @if ($errors->has('banner_img')) has-error @endif">
            {!! Form::label('banner_img','Banner Image', ['class' => 'control-label']) !!}
            {!! Form::file('banner_img', ['class'=> 'form-control']) !!}
            @if ($errors->has('banner_img'))
                <span class="help-block">
                        {{ $errors->first('banner_img') }}
                    </span>
            @endif



        </div>

    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        {!! Form::submit($submitButtonText, ['class'=>'btn btn-danger pull-right']) !!}
    </div>
</div>
<!-- /.card -->
