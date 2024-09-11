<x-app-layout background="bg-white dark:bg-gray-900" headerVariant="v3" sidebarVariant="v2">
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Edit User</h1>
        </div>

        <div>
            <!-- Components -->
            <div class="space-y-8 mt-8">

                <!-- Input Types -->
                <div>
                    <!-- Form for editing the user -->
                    <form action="" method="POST" id="editUserForm">
                        <div class="grid gap-5 md:grid-cols-2">
                            @csrf
                            <div>
                                <!-- Name -->
                                <div>
                                    <label class="block text-sm font-medium mb-1" for="name">Name <span class="text-red-500">*</span></label>
                                    <input id="name" class="form-input w-full" type="text" value="{{ $user->name }}" required />
                                </div>
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block text-sm font-medium mb-1" for="email">Email <span class="text-red-500">*</span></label>
                                <input id="email" class="form-input w-full" type="email" value="{{ $user->email }}" required />
                            </div>

                            <!-- Password -->
                            <div>
                                <label class="block text-sm font-medium mb-1" for="password">Password <span class="text-red-500">*</span></label>
                                <input id="password" class="form-input w-full" type="password" placeholder="Enter new password or leave blank" />
                            </div>

                            <!-- Role -->
                            <div>
                                <label class="block text-sm font-medium mb-1" for="role">Role <span class="text-red-500">*</span></label>
                                <select id="role" class="form-select w-full" name="role" required>
                                    <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="Inventory Manager" {{ $user->role == 'Inventory Manager' ? 'selected' : '' }}>Inventory Manager</option>
                                </select>
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
            const bearerToken = 'Bearer {{ auth()->user()->api_token }}'; // Dynamically get the Bearer token, ensure this is correct for your auth setup

            $('#editUserForm').submit(function(event) {
                event.preventDefault(); // Prevent default form submission

                // Collect form data
                const name = $('#name').val();
                const email = $('#email').val();
                const password = $('#password').val();
                const role = $('#role').val();

                // Send AJAX request to update the user
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/updateUser/{{ $user->id }}', // API endpoint to update the user
                    method: 'POST',
                    contentType: 'application/json',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken, // Pass the CSRF token in the headers
                        'Authorization': bearerToken // Use the dynamic Bearer token
                    },
                    data: JSON.stringify({
                        name: name,
                        email: email,
                        password: password, // Optional: if left blank, backend should handle skipping the update
                        role: role
                    }),
                    success: function(response) {
                        alert('User updated successfully');
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
