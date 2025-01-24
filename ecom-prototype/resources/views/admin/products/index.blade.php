@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Add Product Button -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#add-product-modal">Add Product</button>

    <!-- Product Table -->
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
<div class="modal fade" id="add-product-modal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add-product-form">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="product-name" class="form-label">Name</label>
                        <input type="text" name="name" id="product-name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="product-description" class="form-label">Description</label>
                        <textarea name="description" id="product-description" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="product-price" class="form-label">Price</label>
                        <input type="number" name="price" id="product-price" class="form-control" required step="0.01">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Add Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function () {
    // Add Product Form Submission
    $('#add-product-form').on('submit', function (e) {
        e.preventDefault();
        const formData = $(this).serialize();

        $.post("{{ route('admin.products.store') }}", formData, function (res) {
            if (res.status === 200) {
                // Close the modal
                $('#add-product-modal').modal('hide');

                // Clear form fields
                $('#add-product-form')[0].reset();

                // Get the new product data from the response
                const product = res.product;

                // Create a new row for the product and append it to the table
                const newRow = `
                    <tr id="product-${product.id}">
                        <td>${product.id}</td>
                        <td>${product.name}</td>
                        <td>${product.description}</td>
                        <td>${product.price}</td>
                        <td>
                            <button class="btn btn-danger delete-product" data-id="${product.id}">Delete</button>
                        </td>
                    </tr>
                `;
                $('#product-table-body').prepend(newRow); // Use prepend to add to the top
            } else {
                alert(res.message);
            }
        }).fail(function (xhr) {
            alert('Failed to add the product. Please try again.');
        });
    });

    // Delete Product
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
                error: function () {
                    alert('Failed to delete the product. Please try again.');
                },
            });
        }
    });
});

</script>
@endsection

