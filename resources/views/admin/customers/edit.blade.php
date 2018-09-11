@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <div class="box">
            <form action="{{ route('admin.customers.update', $customer->id) }}" method="post" class="form">
                <div class="box-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label for="name">Tên <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control"
                               value="{!! $customer->name ?: old('name')  !!}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" name="email" id="email" placeholder="Email" class="form-control"
                                   value="{!! $customer->email ?: old('email')  !!}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật Khẩu <span class="text-danger">*</span></label>
                        <input type="password" name="password" id="password" placeholder="xxxxx" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="status">Trạng Thái </label>
                        <select name="status" id="status" class="form-control">
                            <option value="0" @if($customer->status == 0) selected="selected" @endif>Disable</option>
                            <option value="1" @if($customer->status == 1) selected="selected" @endif>Enable</option>
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.customers.index') }}" class="btn btn-default btn-sm">Quay Lại</a>
                        <button type="submit" class="btn btn-primary btn-sm">Cập Nhật</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
