@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">
    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($categories)
            <div class="box">
                <div class="box-body">
                    <h2>Categories</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <td class="col-md-3">Tên Danh Mục</td>
                            <td class="col-md-3">Tình Trạng</td>
                            <td class="col-md-3">Tác Vụ</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->name }}</a>
                                </td>
                                <td>@include('layouts.status', ['status' => $category->status])</td>
                                <td>
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post"
                                          class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                                               class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Sửa</a>
                                            <button onclick="return confirm('Bạn chắc chắn muốn xoá danh mục này?')"
                                                    type="submit" class="btn btn-danger btn-sm"><i
                                                        class="fa fa-times"></i> Xoá
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection
