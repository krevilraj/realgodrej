<div class="row">
    <div class="col-md-9">
        <!-- general form elements -->
        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Add New Product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! Form::label('name','Name *') !!}
                    {!! Form::text('name',null, ['class'=> 'form-control']) !!}

                    @if ($errors->has('name'))
                        <span class="help-block">
                        {{ $errors->first('name') }}
                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('short_description') ? ' has-error' : '' }}">
                    {!! Form::label('short_description','Short Description') !!}
                    {{ Form::textarea('short_description', null, ['rows' => 6, 'class' => 'form-control ckeditor']) }}

                    @if ($errors->has('short_description'))
                        <span class="help-block">
                        {{ $errors->first('short_description') }}
                    </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    {!! Form::label('description','Description') !!}
                    {{ Form::textarea('description', null, ['rows' => 10, 'class' => 'form-control ckeditor']) }}

                    @if ($errors->has('description'))
                        <span class="help-block">
                        {{ $errors->first('description') }}
                    </span>
                    @endif
                </div>

                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Images</h3>
                    </div>
                    <div class="card-body">
                        <!-- Color Picker -->
                        <div class="form-group">
                            @include('backend.products.images')
                        </div>
                        <!-- /.form group -->
                    </div>
                    <!-- /.card-body -->
                </div>



                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">SEO</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group{{ $errors->has('page_title') ? ' has-error' : '' }}">
                            {!! Form::label('page_title','Page Title', ['class' => 'control-label col-sm-3']) !!}
                            <div class="col-sm-9">
                                {!! Form::text('page_title',null, ['class'=> 'form-control']) !!}

                                @if ($errors->has('page_title'))
                                    <span class="help-block">
                                                {{ $errors->first('page_title') }}
                                            </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group{{ $errors->has('page_description') ? ' has-error' : '' }}">
                            {!! Form::label('page_description','Page Description', ['class' => 'control-label col-sm-3']) !!}
                            <div class="col-sm-9">
                                {{ Form::textarea('page_description', null, ['rows' => 3, 'class' => 'form-control']) }}

                                @if ($errors->has('page_description'))
                                    <span class="help-block">
                                                {{ $errors->first('page_description') }}
                                            </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>


                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Product Specification</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-specifications">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($product->specifications))
                                @foreach($product->specifications as $specification)
                                    <tr data-row="{{ $loop->iteration }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text"
                                                       name="specifications[title][{{ $specification->id }}]"
                                                       value="{{ $specification->title }}"
                                                       class="form-control" required>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text"
                                                       name="specifications[description][{{ $specification->id }}]"
                                                       value="{{ $specification->description }}"
                                                       class="form-control" required>
                                            </div>
                                        </td>
                                        <td>
                                            <button type="button"
                                                    class="btn btn-danger btn-xs btn-delete-specification"
                                                    data-specification="{{ $specification->id }}"><i
                                                    class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                                    <button class="btn btn-danger btn-sm btn-add-specification">Add New</button>
                                </th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('dashboard.product.index') }}" class="btn btn-default">Cancel</a>
                {!! Form::submit($submitButtonText, ['class'=>'btn btn-danger pull-right']) !!}
            </div>
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-3">
        <!-- general form elements -->
        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Status</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group mb-none{{ $errors->has('status') ? ' has-error' : '' }}">
                    {{ Form::select('status', [ '1' => 'Enabled', '0' => 'Disabled'], null, ['class' => 'form-control']) }}

                    @if ($errors->has('status'))
                        <span class="help-block">
                        {{ $errors->first('status') }}
                    </span>
                    @endif
                </div>
            </div>
        </div>
        <!-- /.card -->
        <!-- general form elements -->
        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Product Categories</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="product-categories">
                    <ul class="pl-none">
                        @foreach($categories as $category)
                            <li>
                                {{ Form::checkbox('category[]', $category->id, (isset($selectedCategories) && in_array($category->id, $selectedCategories)) ? $category->id : null, ['class' => 'minimal-red']) }}{{ $category->name }}
                            </li>
                            @include('backend.products.category')
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.card -->

        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Featured</h3>
            </div>
            <div class="card-body">
                <div class="form-group">

                    <div class="col-sm-12">
                        <label class="mb-15">
                            {{ Form::checkbox('is_featured', 1, null, ['class' => 'minimal-red']) }}
                            Enable as featured product
                        </label>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>


    </div>
</div>
