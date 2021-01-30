<div class="row">


<div class="col-md-9">
    <div class="card card-default">
        <div class="card-body">

            <div class="form-group @if ($errors->has('title')) has-error @endif">
                {!! Form::label('title','Title *', ['class' => 'control-label']) !!}
                {!! Form::text('title',null, ['class'=> 'form-control']) !!}

                @if ($errors->has('title'))
                    <span class="help-block">
                        {{ $errors->first('title') }}
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

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</div>

<div class="col-md-3">
    <div class="card card-default">
        <div class="card-body">

            <div class="form-group @if ($errors->has('status')) has-error @endif">
                {!! Form::label('status','Status', ['class' => 'control-label']) !!}
                {{ Form::select('status', [1 => 'Enabled', 0 => 'Disabled'], null, ['class' => 'form-control']) }}

                @if ($errors->has('status'))
                    <span class="help-block">
                        {{ $errors->first('status') }}
                    </span>
                @endif
            </div>


        </div>
        <div class="card-footer">
            {!! Form::submit($submitButtonText, ['class'=>'btn btn-danger pull-right']) !!}
        </div>
    </div>
</div>
</div>
