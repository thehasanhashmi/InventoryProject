<x-empty-layout>
    <!-- Page wrapper -->
    <div class="flex h-[100dvh] overflow-hidden">

        <!-- Content area -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">

            <!-- Site header -->
            <header class="bg-white dark:bg-gray-900">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16 lg:border-b border-gray-200 dark:border-gray-700/60">

                        <!-- Logo -->
                        <a class="block" href="{{ route('dashboard') }}">
                            <svg class="fill-violet-500" xmlns="http://www.w3.org/2000/svg" width="32" height="32">
                                <path d="M31.956 14.8C31.372 6.92 25.08.628 17.2.044V5.76a9.04 9.04 0 0 0 9.04 9.04h5.716ZM14.8 26.24v5.716C6.92 31.372.63 25.08.044 17.2H5.76a9.04 9.04 0 0 1 9.04 9.04Zm11.44-9.04h5.716c-.584 7.88-6.876 14.172-14.756 14.756V26.24a9.04 9.04 0 0 1 9.04-9.04ZM.044 14.8C.63 6.92 6.92.628 14.8.044V5.76a9.04 9.04 0 0 1-9.04 9.04H.044Z" />
                            </svg> 
                        </a>

                        <a class="block rounded-fullbg-gray-400/20 text-gray-500 dark:text-gray-400 hover:text-gray-600 dark:hover:text-gray-300" href="{{ route('cart') }}">
                            <span class="sr-only">Back</span>
                            <svg width="32" height="32" viewBox="0 0 32 32">
                                <path class="fill-current" d="M15.95 14.536l4.242-4.243a1 1 0 111.415 1.414l-4.243 4.243 4.243 4.242a1 1 0 11-1.415 1.415l-4.242-4.243-4.243 4.243a1 1 0 01-1.414-1.415l4.243-4.242-4.243-4.243a1 1 0 011.414-1.414l4.243 4.243z" />
                            </svg>
                        </a>

                    </div>
                </div>
            </header>

            
            <main>

                <div class="relative pt-8">
                    <div class="absolute inset-0 bg-gray-800 overflow-hidden" aria-hidden="true">
                        <img class="object-cover h-full w-full filter blur opacity-10" src="{{ asset('images/pay-bg.jpg') }}" width="460" height="180" alt="Pay background" />
                    </div>
                    <div class="relative px-4 sm:px-6 lg:px-8 max-w-lg mx-auto">
                        <img class="rounded-t-xl shadow-lg" src="{{ asset('images/pay-bg.jpg') }}" width="460" height="180" alt="Pay background" />
                    </div>
                </div>

                <div class="relative px-4 sm:px-6 lg:px-8 pb-8 max-w-lg mx-auto" x-data="{ card: true }">
                    <div class="bg-white dark:bg-gray-800 px-8 pb-6 rounded-b-xl shadow-sm">

                        <!-- Card header -->
                        <div class="text-center mb-6">
                            <div class="mb-2">
                                <img class="-mt-8 inline-flex rounded-full" src="{{ asset('images/user-64-13.jpg') }}" width="64" height="64" alt="User" />
                            </div>
                            <h1 class="text-xl leading-snug text-gray-800 dark:text-gray-100 font-semibold mb-2">Front-End Learning</h1>
                            <div class="text-sm">
                                Learn how to create real web apps using HTML & CSS. Code templates included.
                            </div>
                        </div>

                        <!-- Toggle -->
                        <div class="flex justify-center mb-6">
                            <div class="relative flex w-full p-1 bg-gray-100 dark:bg-gray-700/30 rounded">
                                <span class="absolute inset-0 m-1 pointer-events-none" aria-hidden="true">
                                    <span class="absolute inset-0 w-1/2 bg-white dark:bg-gray-100 rounded-lg border border-gray-200 shadow-sm transition" :class="card ? 'translate-x-0' : 'translate-x-full'"></span>
                                </span>
                                <button class="relative flex-1 text-sm font-medium text-gray-600 p-1 transition" :class="card ? 'dark:text-gray-800' : 'dark:text-gray-500'" @click.prevent="card = true">Pay With Card</button>
                                <button class="relative flex-1 text-sm font-medium text-gray-600 p-1 transition" :class="!card ? 'dark:text-gray-800' : 'dark:text-gray-500'" @click.prevent="card = false">Pay With PayPal</button>
                            </div>
                        </div>

                        <!-- Card form -->
                        <div x-show="card">
                            <div class="space-y-4">
                                <!-- Card Number -->
                                <div>
                                    <label class="block text-sm font-medium mb-1" for="card-nr">Card Number <span class="text-red-500">*</span></label>
                                    <input id="card-nr" class="form-input w-full" type="text" placeholder="1234 1234 1234 1234" />
                                </div>
                                <!-- Expiry and CVC -->
                                <div class="flex space-x-4">
                                    <div class="flex-1">
                                        <label class="block text-sm font-medium mb-1" for="card-expiry">Expiry Date <span class="text-red-500">*</span></label>
                                        <input id="card-expiry" class="form-input w-full" type="text" placeholder="MM/YY" />
                                    </div>
                                    <div class="flex-1">
                                        <label class="block text-sm font-medium mb-1" for="card-cvc">CVC <span class="text-red-500">*</span></label>
                                        <input id="card-cvc" class="form-input w-full" type="text" placeholder="CVC" />
                                    </div>
                                </div>
                                <!-- Name on Card -->
                                <div>
                                    <label class="block text-sm font-medium mb-1" for="card-name">Name on Card <span class="text-red-500">*</span></label>
                                    <input id="card-name" class="form-input w-full" type="text" placeholder="John Doe" />
                                </div>
                                <!-- Email -->
                                <div>
                                    <label class="block text-sm font-medium mb-1" for="card-email">Email <span class="text-red-500">*</span></label>
                                    <input id="card-email" class="form-input w-full" type="email" placeholder="john@company.com" />
                                </div>
                            </div>
                            <!-- Form footer -->
                            <div class="mt-6">
                                <div class="mb-4">
                                    <button class="btn w-full bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">Pay $253.00</button>
                                </div>
                                <div class="text-xs text-gray-500 italic text-center">You'll be charged $253, including $48 for VAT in Italy</div>
                            </div>
                        </div>

                        <!-- PayPal form -->
                        <div x-show="!card" x-cloak>
                            <div>
                                <div class="mb-4">
                                    <button class="btn w-full bg-gray-900 text-gray-100 hover:bg-gray-800 dark:bg-gray-100 dark:text-gray-800 dark:hover:bg-white">Pay with PayPal - $253.00</button>
                                </div>
                                <div class="text-xs text-gray-500 italic text-center">You'll be charged $253, including $48 for VAT in Italy</div>
                            </div>
                        </div>

                    </div>
                </div>
            </main>

        </div>

    </div>
</x-empty-layout>
