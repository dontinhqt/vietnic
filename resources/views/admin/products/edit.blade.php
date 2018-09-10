@extends('layouts.admin.app')

@section('content')
<!-- Main content -->
<section class="content">
    @include('layouts.errors-and-messages')
    <div class="box">
        <form action="{{ route('admin.products.update', $product->id) }}" method="post" class="form" enctype="multipart/form-data">
            <div class="box-body">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">
                <h2>{{ ucfirst($product->name) }}</h2>

                <div class="form-group">
                    <label for="sku">SKU <span class="text-danger">*</span></label>
                    <input type="text" name="sku" id="sku" placeholder="xxxxx" class="form-control" value="{!! $product->sku !!}">
                </div>

                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{!! $product->name !!}">
                </div>

                <div class="form-group">
                    <label for="description">Description </label>
                    <textarea class="form-control ckeditor" name="description" id="description" rows="5" placeholder="Description">{!! $product->description  !!}</textarea>
                </div>

                <div class="form-group">
                    <div class="col-md-3">
                        <div class="row">
                            <img src="{{ $product->image }}" alt="" class="img-responsive img-thumbnail">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="image">Image </label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity <span class="text-danger">*</span></label>
                    <input type="text" name="quantity" id="quantity" placeholder="Quantity" class="form-control" value="{!! $product->quantity !!}">
                </div>

                <div class="form-group">
                    <label for="price">Price <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon">VND</span>
                        <input type="text" name="price" id="price" placeholder="Price" class="form-control" value="{!! $product->price !!}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="sale_price">Sale Price</label>
                    <div class="input-group">
                        <span class="input-group-addon">VND</span>
                        <input type="text" name="sale_price" id="sale_price" placeholder="Sale Price" class="form-control" value="{{ $product->sale_price }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="category_id">Categories</label>
                    <select name="category_id" id="category_id" class="form-control select2">
                        {{ categorySelect($categories, 0, " ", $product->category_id) }}
                    </select>
                </div>

                @if(!$brands->isEmpty())
                <div class="form-group">
                    <label for="brand_id">Brand </label>
                    <select name="brand_id" id="brand_id" class="form-control select2">
                        <option value=""></option>
                        @foreach($brands as $brand)
                        <option @if($brand->id == $product->brand_id) selected="selected" @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                @endif

                <div class="form-group">
                    @include('admin.shared.status-select', ['status' => $product->status])
                </div>
                <!-- /.box-body -->
            </div>
            <div class="box-footer">
                <div class="btn-group">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-default btn-sm">Back</a>
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
@endsection
@section('css')
<style type="text/css">
label.checkbox-inline {
    padding: 10px 5px;
    display: block;
    margin-bottom: 5px;
}
label.checkbox-inline > input[type="checkbox"] {
    margin-left: 10px;
}
ul.attribute-lists > li > label:hover {
    background: #3c8dbc;
    color: #fff;
}
ul.attribute-lists > li {
    background: #eee;
}
ul.attribute-lists > li:hover {
    background: #ccc;
}
ul.attribute-lists > li {
    margin-bottom: 15px;
    padding: 15px;
}
</style>
@endsection
@section('js')
<script type="text/javascript">

</script>
@endsection