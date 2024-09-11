<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full">

        <!-- Page content -->
        <div class="max-w-5xl mx-auto flex flex-col lg:flex-row lg:space-x-8 xl:space-x-16">

            <!-- Cart items -->
            <div class="mb-6 lg:mb-0">
                <div class="mb-3">
                    <div class="flex text-sm font-medium text-gray-400 dark:text-gray-500 space-x-2">
                        <span class="text-violet-500">Review</span>
                        <span>-&gt;</span>
                        <span class="text-gray-500 dark:text-gray-400">Payment</span>
                        <span>-&gt;</span>
                        <span class="text-gray-500 dark:text-gray-400">Confirm</span>
                    </div>
                </div>
                <header class="mb-2">
                    <!-- Title -->
                    <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Shopping Cart (3)</h1>
                </header>
                <x-ecommerce.cart-items />
            </div>

            <!-- Sidebar -->
            <div class="max-w-sm mx-auto lg:max-w-none">
                <div class="bg-white dark:bg-gray-800 p-5 shadow-sm rounded-xl lg:w-72 xl:w-80">
                    <div class="text-gray-800 dark:text-gray-100 font-semibold mb-2">Order Summary</div>
                    <!-- Order details -->
                    <ul class="mb-4">
                        <li class="text-sm w-full flex justify-between py-3 border-b border-gray-200 dark:border-gray-700/60">
                            <div>Products & Subscriptions</div>
                            <div class="font-medium text-gray-800 dark:text-gray-100">$205</div>
                        </li>
                        <li class="text-sm w-full flex justify-between py-3 border-b border-gray-200 dark:border-gray-700/60">
                            <div>Shipping</div>
                            <div class="font-medium text-gray-800 dark:text-gray-100">-</div>
                        </li>
                        <li class="text-sm w-full flex justify-between py-3 border-b border-gray-200 dark:border-gray-700/60">
                            <div>Taxes</div>
                            <div class="font-medium text-gray-800 dark:text-gray-100">$48</div>
                        </li>
                        <li class="text-sm w-full flex justify-between py-3 border-b border-gray-200 dark:border-gray-700/60">
                            <div>Total due (including taxes)</div>
                            <div class="font-medium text-green-600">$253</div>
                        </li>
                    </ul>
                    <!-- Promo box -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between">
                            <label class="block text-sm font-medium mb-1" for="promo">Promo Code</label>
                            <div class="text-sm text-gray-400 dark:text-gray-500 italic">optional</div>
                        </div>
                        <input id="promo" class="form-input w-full mb-2" type="text" />
                        <button class="btn w-full bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white disabled:border-gray-200 dark:disabled:border-gray-700 disabled:bg-white dark:disabled:bg-gray-800 disabled:text-gray-300 dark:disabled:text-gray-600 disabled:cursor-not-allowed" disabled>Apply Code</button>
                    </div>
                    <div class="mb-4">
                        <button class="btn w-full bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">Buy Now - $253.00</button>
                    </div>
                    <div class="text-xs text-gray-500 italic text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do <a class="underline hover:no-underline" href="#0">Terms</a>.</div>
                </div>
            </div>

        </div>

    </div>
</x-app-layout>
