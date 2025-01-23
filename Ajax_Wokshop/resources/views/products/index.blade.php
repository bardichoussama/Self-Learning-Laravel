@extends('products.layouts.app')
@section('content')
<button><a id="show" href="{{route('products.create')}}">create product</a></button>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr id="product-{{ $product->id }}">
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>
                    <button class="btn btn-danger btn-sm delete-product" data-id="{{ $product->id }}">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
@section('script')
<script>
    $(document).ready(function () {
        // Open Create Product Form
        $(document).on('click', '#show', function (e) {
            e.preventDefault();

            let url = $(this).attr('href');

            $.ajax({
                type: "GET",
                url: url,
                success: function (res) {
                    bootbox.dialog({
                        title: "Create Product",
                        message: "<div class='createForm'></div>",
                    });

                    $('.createForm').html(res);
                }
            });
        });

        // Submit Create Product Form
        $(document).on('submit', '#addProduct', function (e) {
            e.preventDefault();

            let formData = new FormData($('#addProduct')[0]);

            $.ajax({
                type: 'POST',
                url: "{{ route('products.store') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function (res) {
                    if (res.status === 200) {
                        bootbox.hideAll(); // Close modal
                        location.reload(); // Reload table
                    } else {
                        alert('Error: ' + res.errors.join('\n'));
                    }
                }
            });
        });

        // Handle Delete Product
        $(document).on('click', '.delete-product', function (e) {
            e.preventDefault();

            let productId = $(this).data('id');
            let url = `/products/${productId}`;

            if (confirm('Are you sure you want to delete this product?')) {
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function (res) {
                        if (res.status === 200) {
                            $(`#product-${productId}`).remove(); // Remove the row
                        } else {
                            alert('Error: ' + res.message);
                        }
                    }
                });
            }
        });
    });
</script>
@endsection
