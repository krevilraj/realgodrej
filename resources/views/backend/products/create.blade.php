@extends('backend.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li><a href="{{ route('dashboard.product.index') }}">Products</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('backend.partials.message-success')
                        @include('backend.partials.message-error')
                    </div>
                </div>
                {!! Form::open(['route'=>'dashboard.product.store', 'files' => true, 'class' => '']) !!}
                @include('backend.products.form', ['submitButtonText' => 'Submit'])
                {!! Form::close() !!}
            </div>
        </section>
    </div>


@endsection

@push('scripts')
    <script>
        /**
         * Generate random integer
         *
         * @returns {number}
         */
        function generateRandomInteger() {
            return Math.floor(Math.random() * 90000) + 10000;
        }

        $(function () {

            jQuery(document).on('click', '.product-image-list .is_main_image_button', function (e) {
                e.preventDefault();

                jQuery('.product-image-list .is_main_image_button').removeClass('active');
                jQuery('.product-image-list .is_main_image_hidden_field').val(0);


                if (jQuery(this).hasClass('active')) {

                    jQuery(this).removeClass('active');
                    jQuery(this).parents('.image-preview:first').find('.is_main_image_hidden_field').val(0);
                } else {
                    jQuery(this).addClass('active');
                    jQuery(this).parents('.image-preview:first').find('.is_main_image_hidden_field').val(1);
                }

            });

            jQuery(document).on('click', '.product-image-list .image-preview .destroy-image', function (e) {

                var token = jQuery('.product-image-element').attr('data-token');
                var path = jQuery(e.target).parents('.image-preview:first').find('.img-tag').attr('data-path');
                var data = {_token: token, path: path};
                jQuery.ajax({
                    url: '{{ url('/dashboard/product/image/delete') }}',
                    data: data,
                    dataType: 'json',
                    type: 'post',
                    success: function (response) {
                        if (response.success === true) {
                            jQuery(e.target).parents('.image-preview:first').remove();
                        }

                    }
                });

            });

            jQuery('.product-image-element').change(function (e) {
                var files = e.target.files;

                if (files.length <= 0) {
                    return;
                }

                var formData = new FormData();

                formData.append('_token', jQuery(e.target).attr('data-token'));
                for (var i = 0, file; file = files[i]; ++i) {
                    formData.append('image', file);
                }

                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ url('/dashboard/product/image/upload') }}', true);
                xhr.onload = function (e) {
                    if (this.status === 200) {
                        jQuery('.product-image-list').append(this.response);
                        if (jQuery('.product-image-list .image-preview').length === 1) {
                            jQuery('.product-image-list .image-preview .is_main_image_button').trigger('click');
                        }
                    }
                };

                xhr.send(formData);

                jQuery(".product-image-element").val('');
            });
            jQuery(document).on('click', '.btn-delete-specification', function (e) {
                e.preventDefault();

                var $this = $(this);

                $this.closest("tr").remove();
            });

            jQuery(document).on('click', '.btn-add-specification', function (e) {
                e.preventDefault();

                var lastRow = $('table.table-specifications > tbody > tr').last().attr('data-row');

                var counter = lastRow ? parseInt(lastRow) + 1 : 1;

                var randomInteger = generateRandomInteger();

                var newRow = jQuery('<tr data-row="' + counter + '">' +
                    '<td>' + counter + '</td>' +
                    '<td><input type="text" name="specifications[title][' + randomInteger + ']" class="form-control" required/></td>' +
                    '<td><input type="text" name="specifications[description][' + randomInteger + ']" class="form-control" required/></td>' +
                    '<td><button type="button" class="btn btn-danger btn-xs btn-delete-specification" data-specification=""><i class="fa fa-trash"></i></button></td>' +
                    '</tr>');

                jQuery('table.table-specifications').append(newRow);

            });

        });

    </script>
@endpush
