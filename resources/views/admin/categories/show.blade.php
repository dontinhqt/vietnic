@extends('layouts.admin.app')

@section('content')
    <!-- Main content -->
    <section class="content">

    @include('layouts.errors-and-messages')
    <!-- Default box -->
        @if($category)
            <div class="box">
                <div class="box-body">
                    <h2>Category</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <td class="col-md-4">Name</td>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $category->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                @if(!$products->isEmpty())
                    <div class="box-body">
                        <h2>Products</h2>
                        @include('admin.shared.products', ['products' => $products])
                    </div>
                @endif
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="btn-group">
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-default btn-sm">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        @endif

    </section>
    <!-- /.content -->
@endsection
