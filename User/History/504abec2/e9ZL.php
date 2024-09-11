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

    <div class="m-1.5">
        <!-- Start -->
        <div x-data="{ modalOpen: false }">
            <button
                class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white"
                @click.prevent="modalOpen = true"
                aria-controls="success-modal">Success Modal</button>
            <!-- Modal backdrop -->
            <div
                class="fixed inset-0 bg-gray-900 bg-opacity-30 z-50 transition-opacity"
                x-show="modalOpen"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-out duration-100"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                aria-hidden="true"
                x-cloak></div>
            <!-- Modal dialog -->
            <div
                id="success-modal"
                class="fixed inset-0 z-50 overflow-hidden flex items-center my-4 justify-center px-4 sm:px-6"
                role="dialog"
                aria-modal="true"
                x-show="modalOpen"
                x-transition:enter="transition ease-in-out duration-200"
                x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in-out duration-200"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-4"
                x-cloak>
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-auto max-w-lg w-full max-h-full" @click.outside="modalOpen = false" @keydown.escape.window="modalOpen = false">
                    <div class="p-5 flex space-x-4">
                        <!-- Icon -->
                        <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0 bg-gray-100 dark:bg-gray-700">
                            <svg class="shrink-0 fill-current text-green-500" width="16" height="16" viewBox="0 0 16 16">
                                <path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zM7 11.4L3.6 8 5 6.6l2 2 4-4L12.4 6 7 11.4z" />
                            </svg>
                        </div>
                        <!-- Content -->
                        <div>
                            <!-- Modal header -->
                            <div class="mb-2">
                                <div class="text-lg font-semibold text-gray-800 dark:text-gray-100">Upgrade your Subscription?</div>
                            </div>
                            <!-- Modal content -->
                            <div class="text-sm mb-10">
                                <div class="space-y-2">
                                    <p>Semper eget duis at tellus at urna condimentum mattis pellentesque lacus suspendisse faucibus interdum.</p>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="flex flex-wrap justify-end space-x-2">
                                <button class="btn-sm border-gray-200 dark:border-gray-700/60 hover:border-gray-300 dark:hover:border-gray-600 text-gray-800 dark:text-gray-300" @click="modalOpen = false">Cancel</button>
                                <button class="btn-sm bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">Yes, Upgrade it</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Get the CSRF token from the meta tag
            const csrfToken = $('meta[name="csrf-token"]').attr('content');

            $('#addUserForm').submit(function(event) {
                event.preventDefault(); // Prevent default form submission

                // Collect form data
                const name = $('#name').val();
                const email = $('#email').val();
                const password = $('#password').val();
                const role = $('#role').val();

                // Send AJAX request
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/register',
                    method: 'POST',
                    contentType: 'application/json',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken // Pass the CSRF token in the headers
                    },
                    data: JSON.stringify({
                        name: name,
                        email: email,
                        password: password,
                        role: role
                    }),
                    success: function(response) {
                        alert('User added successfully');
                        console.log(response);
                        document.querySelector("[x-data]").__x.$data.modalOpen = true;
                        document.querySelector('[x-data]').__x.$data.modalOpen = true;

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