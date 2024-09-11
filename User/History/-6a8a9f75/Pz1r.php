<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="sm:flex sm:justify-between sm:items-center mb-5">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Invoices</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                <!-- Search form -->
                <x-search-form placeholder="Search by User ID, Name, Email" />

                <!-- Create invoice button -->
                <a href="{{ route('addUser') }}" class="btn bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white inline-flex items-center">
                    <svg class="fill-current shrink-0 xs:hidden" width="16" height="16" viewBox="0 0 16 16">
                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    <span class="max-xs:sr-only">Create User</span>
                </a>


            </div>

        </div>

        <!-- More actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-5">

            <!-- Left side -->
            <div class="mb-4 sm:mb-0">
                <ul class="flex flex-wrap -m-1">
                    <li class="m-1">
                        <button wire:click.prevent="filterByRole('all')" class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-transparent shadow-sm {{ $filter == 'all' ? 'bg-gray-900 text-white' : 'bg-white text-gray-500 hover:border-gray-300 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-700/60' }} transition">
                            All <span class="ml-1 text-gray-400 dark:text-gray-500">{{ $allCount }}</span>
                        </button>
                    </li>
                    <li class="m-1">
                        <button wire:click="filterByRole('Admin')" class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-transparent shadow-sm {{ $filter == 'Admin' ? 'bg-gray-900 text-white' : 'bg-white text-gray-500 hover:border-gray-300 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-700/60' }} transition">
                            Admin <span class="ml-1 text-gray-400 dark:text-gray-500">{{ $adminCount }}</span>
                        </button>
                    </li>
                    <li class="m-1">
                        <button wire:click="filterByRole('Inventory Manager')" class="inline-flex items-center justify-center text-sm font-medium leading-5 rounded-full px-3 py-1 border border-transparent shadow-sm {{ $filter == 'Inventory Manager' ? 'bg-gray-900 text-white' : 'bg-white text-gray-500 hover:border-gray-300 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-700/60' }} transition">
                            Inventory Manager <span class="ml-1 text-gray-400 dark:text-gray-500">{{ $inventoryManagerCount }}</span>
                        </button>
                    </li>
                </ul>
            </div>

            <!-- Right side -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                <!-- Delete button -->
             
            </div>

        </div>

        <!-- Table -->
        <x-user.user-table :users="$users" :count="$users" />

        <!-- Pagination -->
        <div class="mt-8">
            {{$users->links()}}
        </div>

    </div>
</x-app-layout>