@if(!$products->isEmpty())
    <table class="table">
        <thead>
        <tr>
            <td>ID</td>
            <td>Tên Sản Phẩm</td>
            <td>Số Lượng</td>
            <td>Giá</td>
            <td>Trạng Thái</td>
            <td>Tác Vụ</td>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>
                    @if($admin->hasPermission('view-product'))
                        <a href="{{ route('admin.products.show', $product->id) }}">{{ $product->name }}</a>
                    @else
                        {{ $product->name }}
                    @endif
                </td>
                <td>{{ $product->quantity }}</td>
                <td>{{ config('cart.currency') }} {{ $product->price }}</td>
                <td>@include('layouts.status', ['status' => $product->status])</td>
                <td>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="post"
                          class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="delete">
                        <div class="btn-group">
                            @if($admin->hasPermission('update-product'))<a
                                    href="{{ route('admin.products.edit', $product->id) }}"
                                    class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Sửa</a>@endif
                            @if($admin->hasPermission('delete-product'))
                                <button onclick="return confirm('Bạn muốn xoá sản phẩm này?')" type="submit"
                                        class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Xoá
                                </button>@endif
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif