@extends('layouts.app')

@section('content')
<div class="container">
    <button class="btn btn-primary mb-3" id="add-product-btn">Add Product</button>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="product-table-body">
            @foreach ($products as $product)
            <tr id="product-{{ $product->id }}">
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <button class="btn btn-danger delete-product" data-id="{{ $product->id }}">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Product Modal -->
<div id="add-product-modal" style="display: none;">
    <form id="add-product-form">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input type="number" name="price" class="form-control" required step="0.01">
        </div>
        <button type="submit" class="btn btn-success">Add Product</button>
    </form>
</div>
@endsection

@section('script')
<script>
$(document).ready(function () {

    $('#add-product-btn').on('click', function () {
        bootbox.dialog({
            title: 'Add Product',
            message: $('#add-product-modal').html(),
        });
    });


    $(document).on('submit', '#add-product-form', function (e) {
        e.preventDefault();
        const formData = $(this).serialize();

        $.post("{{ route('admin.products.store') }}", formData, function (res) {
            if (res.status === 200) {
                location.reload();
            } else {
                alert(res.message);
            }
        });
    });

    // Delete product
    $(document).on('click', '.delete-product', function () {
        const productId = $(this).data('id');

        if (confirm('Are you sure you want to delete this product?')) {
            $.ajax({
                url: `/admin/products/${productId}`,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function (res) {
                    if (res.status === 200) {
                        $(`#product-${productId}`).remove();
                    } else {
                        alert(res.message);
                    }
                },
            });
        }
    });
});
</script>
@endsection
