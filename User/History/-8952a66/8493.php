<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

    <!-- Page header -->
    <div class="mb-8">
        <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Create User</h1>
    </div>

    <div>
        <!-- Components -->
        <div class="space-y-8 mt-8">
            <div class="grid gap-5 md:grid-cols-2">

                <!-- Name -->
                <div>
                    <div>
                        <label class="block text-sm font-medium mb-1" for="name">Name <span class="text-red-500">*</span></label>
                        <input id="name" wire:model="name" class="form-input w-full" type="text" required />
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <div>
                        <label class="block text-sm font-medium mb-1" for="email">Email <span class="text-red-500">*</span></label>
                        <input id="email" wire:model="email" class="form-input w-full" type="email" required />
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <div>
                        <label class="block text-sm font-medium mb-1" for="password">Password <span class="text-red-500">*</span></label>
                        <input id="password" wire:model="password" class="form-input w-full" type="password" required />
                    </div>
                </div>

                <!-- Role -->
                <div>
                    <label class="block text-sm font-medium mb-1" for="role">Role</label>
                    <select id="role" wire:model="role" class="form-select w-full">
                        <option value="Admin">Admin</option>
                        <option value="Inventory Manager">Inventory Manager</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="m-1.5">
                    <button type="button" wire:click="submit" class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">Submit</button>
                </div>

            </div>
        </div>
    </div>
</div>
