@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.products.store') }}" method="post" class="form" enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <h2>Product</h2>
                        <div class="form-group">
                            <label for="sku">SKU <span class="text-danger">*</span></label>
                            <input type="text" name="sku" id="sku" placeholder="xxxxx" class="form-control"
                                   value="{{ old('sku') }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Tên Sản Phẩm <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control"
                                   value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Mô Tả </label>
                            <textarea class="form-control ckeditor" name="description" id="description" rows="5"
                                      placeholder="Description">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Hình Ảnh</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Số Lượng <span class="text-danger">*</span></label>
                            <input type="text" name="quantity" id="quantity" placeholder="Quantity" class="form-control"
                                   value="{{ old('quantity') }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Giá <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-addon">VND</span>
                                <input type="text" name="price" id="price" placeholder="Price" class="form-control"
                                       value="{{ old('price') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Phân Loại <span class="text-danger">*</span></label>
                            <select name="category_id" id="category_id" class="form-control select2">
                                {{ categorySelect($categories, 0, " ", old('category_id')) }}
                            </select>
                        </div>

                        @if(!$brands->isEmpty())
                            <div class="form-group">
                                <label for="brand_id">Hãng Sản Xuất </label>
                                <select name="brand_id" id="brand_id" class="form-control select2">
                                    <option value=""></option>
                                    @foreach($brands as $brand)
                                        <option @if(old('brand_id') == $brand->id) selected="selected"
                                                @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        @include('admin.shared.status-select', ['status' => 1])
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-default">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
