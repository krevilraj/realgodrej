<div class="row">
    <div class="col-md-9">
        <!-- general form elements -->
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">Slideshow Info</h3>
            </div>
            <div class="card-body">
                <div class="form-group">

                    {!! Form::label('name','Name *', ['class' => 'control-label']) !!}
                    {!! Form::text('name',null, ['class'=> 'form-control']) !!}
                    @if ($errors->has('name'))
                        <span class="help-block">
                        {{ $errors->first('name') }}
                    </span>
                    @endif
                </div>
                <div class="form-group hidden @if ($errors->has('caption')) has-error @endif">
                    {!! Form::label('caption','Content', ['class' => 'control-label']) !!}
                    {{ Form::text('caption', null, ['class' => 'form-control']) }}
                    @if ($errors->has('caption'))
                        <span class="help-block">
                        {{ $errors->first('caption') }}
                    </span>
                    @endif

                </div>
                <div class="form-group">
                    {!! Form::label('link','Link *', ['class' => 'control-label']) !!}
                    {!! Form::text('link',null, ['class'=> 'form-control']) !!}
                    @if ($errors->has('link'))
                        <span class="help-block">
                        {{ $errors->first('link') }}
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('priority','Priority *', ['class' => 'control-label']) !!}
                    {{ Form::text('priority', null, ['class' => 'form-control']) }}
                    @if ($errors->has('priority'))
                        <span class="help-block">
                        {{ $errors->first('priority') }}
                    </span>
                    @endif
                </div>



            </div>
            <!-- /.card-body -->


        </div>
    </div>
    <div class="col-md-3">
        <div class="card ">

            <div class="card-body">
                <div class="form-group @if ($errors->has('active')) has-error @endif">
                    {!! Form::label('active','Enable/Disable', ['class' => 'control-label']) !!}
                    {{ Form::select('active', [1 => 'Enable', 0 => 'Disable'], null, ['class' => 'form-control']) }}
                    @if ($errors->has('active'))
                        <span class="help-block">
                        {{ $errors->first('active') }}
                    </span>
                    @endif
                </div>
                <div class="form-group">

                    <div class="custom-file">
                        {!! Form::label('featured_image','Featured Image', ['class' => 'control-label']) !!}
                        {!! Form::file('featured_image', ['class'=> 'form-control']) !!}
                        @if ($errors->has('featured_image'))
                            <span class="help-block">
                        {{ $errors->first('featured_image') }}
                    </span>
                        @endif


                    </div>

                    @error('featured-image')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    @if(isset($slideshow) && null !== $slideshow->getImage())
                        <div class="mt-15">
                            <img src="{{ $slideshow->getImage()->mediumUrl }}" style="width:100%;" class="thumbnail img-responsive mb-none">
                        </div>
                    @endif
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
            </div>
        </div>
    </div>
</div>
