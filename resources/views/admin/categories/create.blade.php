@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.categories.store') }}" method="post" class="form"
                  enctype="multipart/form-data">
                <div class="box-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="parent">Danh Mục Cha</label>
                        <select name="parent" id="parent" class="form-control select2">
                            <option value="0"> -- ROOT --</option>
                            {{ categorySelect($categories, 0, " ", old('parent')) }}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Tên Danh Mục <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control"
                               value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Trang </label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Enable</option>
                            <option value="0">Disable</option>
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-default">Quay Lại</a>
                        <button type="submit" class="btn btn-primary">Thêm Mới</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
