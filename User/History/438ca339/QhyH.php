<x-app-layout background="bg-white dark:bg-gray-900" headerVariant="v3" sidebarVariant="v2">
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Add Product</h1>
        </div>

        <div>

            <!-- Components -->
            <div class="space-y-8 mt-8">

                <!-- Input Types -->
                <div>

                    <form action="" method="POST" id="addProductForm">
                        <div class="grid gap-5 md:grid-cols-2">

                            @csrf
                            <div>
                                <!-- Product Name -->
                                <div>
                                    <label class="block text-sm font-medium mb-1" for="name">Product Name <span class="text-red-500">*</span></label>
                                    <input id="name" class="form-input w-full" type="text" required />
                                </div>
                            </div>

                            <div>
                                <!-- SKU -->
                                <div>
                                    <label class="block text-sm font-medium mb-1" for="sku">SKU <span class="text-red-500">*</span></label>
                                    <input id="sku" class="form-input w-full" type="text" required />
                                </div>
                            </div>

                            <div>
                                <!-- Quantity in Stock -->
                                <div>
                                    <label class="block text-sm font-medium mb-1" for="quantity_in_stock">Quantity in Stock <span class="text-red-500">*</span></label>
                                    <input id="quantity_in_stock" class="form-input w-full" type="number" required />
                                </div>
                            </div>

                            <div>
                                <!-- Supplier Dropdown -->
                                <div>
                                    <label class="block text-sm font-medium mb-1" for="supplier_id">Supplier <span class="text-red-500">*</span></label>
                                    <select id="supplier_id" class="form-select w-full" name="supplier_id" required>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div>
                                <div class="m-1.5">
                                    <!-- Submit Button -->
                                    <button class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white" type="submit">Submit</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Get the CSRF token from the meta tag
            const csrfToken = $('meta[name="csrf-token"]').attr('content');

            $('#addProductForm').submit(function(event) {
                event.preventDefault(); // Prevent default form submission

                // Collect form data
                const name = $('#name').val();
                const sku = $('#sku').val();
                const quantity_in_stock = $('#quantity_in_stock').val();
                const supplier_id = $('#supplier_id').val();

                // Send AJAX request
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/products',
                    method: 'POST',
                    contentType: 'application/json',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken, // Pass the CSRF token in the headers
                        'Authorization': 'Bearer 8|9HeRRJs9IU4E45h8afT5kFyM9YWBjTd4VV1mJI7A423d5ffe' // Pass the Bearer token
                    },
                    data: JSON.stringify({
                        name: name,
                        sku: sku,
                        quantity_in_stock: quantity_in_stock,
                        supplier_id: supplier_id
                    }),
                    success: function(response) {
                        alert('Product added successfully');
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Error: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>

</x-app-layout>
