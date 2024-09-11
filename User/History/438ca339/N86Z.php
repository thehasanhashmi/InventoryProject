<x-app-layout background="bg-white dark:bg-gray-900" headerVariant="v3" sidebarVariant="v2">
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Transfer Product Between Warehouses</h1>
        </div>

        <div>

            <!-- Components -->
            <div class="space-y-8 mt-8">

                <!-- Input Types -->
                <div>

                    <form action="" method="POST" id="transferProductForm">
                        <div class="grid gap-5 md:grid-cols-2">

                            @csrf
                            <div>
                                <!-- Product Dropdown -->
                                <div>
                                    <label class="block text-sm font-medium mb-1" for="product_id">Product <span class="text-red-500">*</span></label>
                                    <select id="product_id" class="form-select w-full" name="product_id" required>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div>
                                <!-- From Warehouse Dropdown -->
                                <div>
                                    <label class="block text-sm font-medium mb-1" for="from_warehouse_id">From Warehouse <span class="text-red-500">*</span></label>
                                    <select id="from_warehouse_id" class="form-select w-full" name="from_warehouse_id" required>
                                        @foreach($warehouses as $warehouse)
                                            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div>
                                <!-- To Warehouse Dropdown -->
                                <div>
                                    <label class="block text-sm font-medium mb-1" for="to_warehouse_id">To Warehouse <span class="text-red-500">*</span></label>
                                    <select id="to_warehouse_id" class="form-select w-full" name="to_warehouse_id" required>
                                        @foreach($warehouses as $warehouse)
                                            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div>
                                <!-- Quantity -->
                                <div>
                                    <label class="block text-sm font-medium mb-1" for="quantity">Quantity <span class="text-red-500">*</span></label>
                                    <input id="quantity" class="form-input w-full" type="number" name="quantity" required />
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

            $('#transferProductForm').submit(function(event) {
                event.preventDefault(); // Prevent default form submission

                // Collect form data
                const product_id = $('#product_id').val();
                const from_warehouse_id = $('#from_warehouse_id').val();
                const to_warehouse_id = $('#to_warehouse_id').val();
                const quantity = $('#quantity').val();

                // Send AJAX request
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/warehouses/transfer',
                    method: 'POST',
                    contentType: 'application/json',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken, // Pass the CSRF token in the headers
                        'Authorization': 'Bearer 8|9HeRRJs9IU4E45h8afT5kFyM9YWBjTd4VV1mJI7A423d5ffe' // Pass the Bearer token
                    },
                    data: JSON.stringify({
                        product_id: product_id,
                        from_warehouse_id: from_warehouse_id,
                        to_warehouse_id: to_warehouse_id,
                        quantity: quantity
                    }),
                    success: function(response) {
                        alert('Product transferred successfully');
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
