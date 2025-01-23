@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Product Management</h3>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</button>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="product-table-body">
                    @foreach ($products as $product)
                        <tr id="product-row-{{ $product->id }}">
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm" onclick="deleteProduct({{ $product->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add-product-form">
                        <div class="mb-3">
                            <label for="product-name" class="form-label">Product Name</label>
                            <input type="text" id="product-name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="product-description" class="form-label">Description</label>
                            <textarea id="product-description" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="product-price" class="form-label">Price</label>
                            <input type="number" id="product-price" class="form-control" required step="0.01">
                        </div>
                        <div class="mb-3">
                            <label for="product-stock" class="form-label">Stock</label>
                            <input type="number" id="product-stock" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Add Product
        $('#add-product-form').on('submit', function (e) {
            e.preventDefault();
            const name = $('#product-name').val();
            const description = $('#product-description').val();
            const price = $('#product-price').val();
            const stock = $('#product-stock').val();

            $.ajax({
                url: '{{ route('products.store') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    name: name,
                    description: description,
                    price: price,
                    stock: stock
                },
                success: function (product) {
                    // Add the new product to the table
                    $('#product-table-body').append(`
                        <tr id="product-row-${product.id}">
                            <td>${product.name}</td>
                            <td>${product.description}</td>
                            <td>${product.price}</td>
                            <td>${product.stock}</td>
                            <td>
                                <button class="btn btn-danger btn-sm" onclick="deleteProduct(${product.id})">Delete</button>
                            </td>
                        </tr>
                    `);
                    $('#addProductModal').modal('hide');
                    $('#add-product-form')[0].reset();
                }
            });
        });

        // Delete Product
        function deleteProduct(id) {
            $.ajax({
                url: `/products/${id}`,
                method: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function () {
                    // Remove the deleted product row from the table
                    $(`#product-row-${id}`).remove();
                }
            });
        }
    </script>
@endsection
