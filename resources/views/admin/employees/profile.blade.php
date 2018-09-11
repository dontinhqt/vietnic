@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @include('layouts.errors-and-messages')
        <form action="{{ route('admin.employee.profile.update', $employee->id) }}" method="post" class="form">
            <input type="hidden" name="_method" value="put">
            {{ csrf_field() }}
            <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="col-md-4">Tên</td>
                                <td class="col-md-4">Email</td>
                                <td class="col-md-4">Mật Khẩu</td>
                            </tr>
                        </tbody>
                        <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control" value="{{ $employee->name }}">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control" value="{{ $employee->email }}">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input name="password" type="password" class="form-control" value="" placeholder="xxxxxx">
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-default btn-sm">Quay Lại</a>
                        <button class="btn btn-success btn-sm" type="submit"> <i class="fa fa-save"></i> Lưu</button>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </form>

    </section>
    <!-- /.content -->
@endsection
