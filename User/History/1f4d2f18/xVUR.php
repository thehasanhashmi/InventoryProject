<div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-gray-800 shadow-sm rounded-xl">
    <div class="px-5 pt-5">
        <header class="flex justify-between items-start mb-2">
            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Products</h2>
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
            <div class="text-3xl font-bold text-gray-800 dark:text-gray-100 mr-2">${{ number_format($dataFeed->sumDataSet(1, 1), 0) }}</div>
            <div class="text-sm font-medium text-green-700 px-1.5 bg-green-500/20 rounded-full">+49%</div>
        </div>
    </div>
    <!-- Chart built with Chart.js 3 -->
    <!-- Check out src/js/components/dashboard-card-01.js for config -->
    <div class="grow max-sm:max-h-[128px] xl:max-h-[128px]">
        <!-- Change the height attribute to adjust the chart height -->
        <canvas id="dashboard-card-01" width="389" height="128"></canvas>
    </div>
</div>