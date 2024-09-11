<x-app-layout background="bg-white dark:bg-gray-900" headerVariant="v3" sidebarVariant="v2">
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Add User</h1>
        </div>

        <div>

            <!-- Components -->
            <div class="space-y-8 mt-8">

                <!-- Input Types -->
                <div>

                    <form action="" method="POST" id="addUserForm">
                        <div class="grid gap-5 md:grid-cols-2">

                        @csrf
                            <div>
                                <!-- Start -->
                                <div>
                                    <label class="block text-sm font-medium mb-1" for="name">Name <span class="text-red-500">*</span></label>
                                    <input id="name" class="form-input w-full" type="text" required />
                                </div>
                                <!-- End -->
                            </div>
                            <div>
                                <!-- Start -->
                                <div>
                                    <label class="block text-sm font-medium mb-1" for="email">Email <span class="text-red-500">*</span></label>
                                    <input id="email" class="form-input w-full" type="text" required />
                                </div>
                                <!-- End -->
                            </div>
                            <div>
                                <!-- Start -->
                                <div>
                                    <label class="block text-sm font-medium mb-1" for="password">Password <span class="text-red-500">*</span></label>
                                    <input id="password" class="form-input w-full" type="password" required />
                                </div>
                                <!-- End -->
                            </div>

                            <!-- Select -->
                            <div>

                                <label class="block text-sm font-medium mb-1" for="role">Role <span class="text-red-500">*</span></label>
                                <select id="role" class="form-select w-full" name="role" required>
                                    <option value="Admin">Admin</option>
                                    <option value="Inventory Manager">Inventory Manager</option>
                                </select>
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

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#addUserForm').submit(function(event) {
                event.preventDefault(); // Prevent default form submission

                // Collect form data
                const name = $('#name').val();
                const email = $('#email').val();
                const password = $('#password').val();
                const role = $('#role').val();
                const csrfToken = $('meta[name="csrf-token"]').attr('content');

                

                // Send AJAX request
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/register',
                    method: 'POST',
                    contentType: 'application/json',
                    dataType: 'json',
                    data: JSON.stringify({
                        name: name,
                        email: email,
                        password: password,
                        role: role
                    }),
                    success: function(response) {
                        alert('User added successfully');
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