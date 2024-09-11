<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Dashboard</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

               

                
            </div>

        </div>
        
        <!-- Cards -->
        <div class="grid grid-cols-12 gap-6">

            <!-- Line chart (Acme Plus) -->
            <x-dashboard.dashboard-card-01 :dataFeed="$dataFeed" :products="$products" />

            <!-- Line chart (Acme Advanced) -->
            <x-dashboard.dashboard-card-02 :dataFeed="$dataFeed"     :suppliers="$suppliers" />

            <!-- Line chart (Acme Professional) -->
            <x-dashboard.dashboard-card-03 :dataFeed="$dataFeed" :warehouses="$warehouses"/>

          

        </div>

    </div>
</x-app-layout>
