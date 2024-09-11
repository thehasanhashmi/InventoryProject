<div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
    <div class="px-5 pt-5">
        <header class="flex justify-between items-start mb-2">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Suppliers</h2>
            <!-- Menu button -->
            <div class="relative inline-flex" x-data="{ open: false }">
                <button
                    class="rounded-full"
                    :class="open ? 'bg-gray-100 dark:bg-gray-700/60 text-gray-500 dark:text-gray-400': 'text-gray-400 hover:text-gray-500 dark:text-gray-500 dark:hover:text-gray-400'"
                    aria-haspopup="true"
                    @click.prevent="open = !open"
                    :aria-expanded="open">

                </button>
                
            </div>
        </header>
        <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-1">Total</div>
        <div class="flex items-start">
            <div class="text-3xl font-bold text-gray-800 dark:text-gray-100 mr-2">{{ $suppliers }}</div>
            
        </div>
    </div>
   
</div>