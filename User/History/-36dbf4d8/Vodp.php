<x-app-layout background="bg-white dark:bg-gray-900" headerVariant="v3" sidebarVariant="v2">
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Add Warehouse</h1>
        </div>

        <div>

            <!-- Components -->
            <div class="space-y-8 mt-8">

                <!-- Input Types -->
                <div>

                    <form action="" method="POST" id="addWarehouseForm">
                        <div class="grid gap-5 md:grid-cols-2">

                            @csrf
                            <div>
                                <!-- Start -->
                                <div>
                                    <label class="block text-sm font-medium mb-1" for="name">Warehouse Name <span class="text-red-500">*</span></label>
                                    <input id="name" class="form-input w-full" type="text" required />
                                </div>
                                <!-- End -->
                            </div>
                            <div>
                                <!-- Start -->
                                <div>
                                    <label class="block text-sm font-medium mb-1" for="location">Location <span class="text-red-500">*</span></label>
                                    <input id="location" class="form-input w-full" type="text" required />
                                </div>
                                <!-- End -->
                            </div>

                            <div>
                                <div class="m-1.5">
                                    <!-- Start -->
                                    <button class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white" type="submit">Submit</button>
                                    <!-- End -->
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

            $('#addWarehouseForm').submit(function(event) {
                event.preventDefault(); // Prevent default form submission

                // Collect form data
                const name = $('#name').val();
                const location = $('#location').val();

                // Send AJAX request
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/warehouses',
                    method: 'POST',
                    contentType: 'application/json',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken, // Pass the CSRF token in the headers
                        'Authorization': 'Bearer 8|9HeRRJs9IU4E45h8afT5kFyM9YWBjTd4VV1mJI7A423d5ffe' // Pass the Bearer token
                    },
                    data: JSON.stringify({
                        name: name,
                        location: location
                    }),
                    success: function(response) {
                        alert('Warehouse added successfully');
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
