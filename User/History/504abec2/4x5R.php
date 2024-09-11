<x-app-layout background="bg-white dark:bg-gray-900" headerVariant="v3" sidebarVariant="v2">
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        <div class="mb-8">
            <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Create User</h1>
        </div>

        <div>

            <!-- Components -->
            <div class="space-y-8 mt-8">

                <!-- Input Types -->
                <div>
                    
                    <div class="grid gap-5 md:grid-cols-2">
                        
                       
                        
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
                                <input id="email" class="form-input w-full" type="email" required />
                            </div>
                            <!-- End -->
                        </div>

                        <div>
                            <!-- Start -->
                            <div>
                                <label class="block text-sm font-medium mb-1" for="Password">Password <span class="text-red-500">*</span></label>
                                <input id="password" class="form-input w-full" type="text" required />
                            </div>
                            <!-- End -->
                        </div>


                        <div>
                            <!-- Start -->
                            <div>
                                <label class="block text-sm font-medium mb-1" for="mandatory">Mandatory <span class="text-red-500">*</span></label>
                                <input id="mandatory" class="form-input w-full" type="text" required />
                            </div>
                            <!-- End -->
                        </div>
                        
                       
                <!-- Select -->
                <div>
                    <h2 class="text-2xl text-gray-800 dark:text-gray-100 font-bold mb-6">Select</h2>
                    <label class="block text-sm font-medium mb-1" for="country">Country</label>
                    <select id="country" class="form-select">
                        <option>Italy</option>
                        <option>USA</option>
                        <option>United Kingdom</option>
                    </select>
                </div>

                <!-- Checkbox -->
                <div>
                    <h2 class="text-2xl text-gray-800 dark:text-gray-100 font-bold mb-6">Checkbox</h2>
                    <div class="flex flex-wrap items-center -m-3">
                
                        <div class="m-3">
                            <!-- Start -->
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox" />
                                <span class="text-sm ml-2">Active</span>
                            </label>
                            <!-- End -->
                        </div>

                        <div class="m-3">
                            <!-- Start -->
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox" checked />
                                <span class="text-sm ml-2">Selected</span>
                            </label>
                            <!-- End -->
                        </div>

                        <div class="m-3">
                            <!-- Start -->
                            <label class="flex items-center">
                                <input type="checkbox" class="form-checkbox disabled:border-gray-200 dark:disabled:border-gray-700 disabled:bg-gray-100 dark:disabled:bg-gray-800" disabled />
                                <span class="text-sm ml-2">Disabled</span>
                            </label>
                            <!-- End -->
                        </div>
                
                    </div>
                </div>

                <!-- Radio -->
                <div>
                    <h2 class="text-2xl text-gray-800 dark:text-gray-100 font-bold mb-6">Radio</h2>
                    <div class="flex flex-wrap items-center -m-3">
                
                        <div class="m-3">
                            <!-- Start -->
                            <label class="flex items-center">
                                <input type="radio" name="radio-buttons" class="form-radio" />
                                <span class="text-sm ml-2">Active</span>
                            </label>
                            <!-- End -->
                        </div>
                
                        <div class="m-3">
                            <!-- Start -->
                            <label class="flex items-center">
                                <input type="radio" name="radio-buttons" class="form-radio" checked />
                                <span class="text-sm ml-2">Selected</span>
                            </label>
                            <!-- End -->
                        </div>
                
                        <div class="m-3">
                            <!-- Start -->
                            <label class="flex items-center">
                                <input type="radio" name="radio-buttons" class="form-radio disabled:border-gray-200 dark:disabled:border-gray-700 disabled:bg-gray-100 dark:disabled:bg-gray-800" disabled />
                                <span class="text-sm ml-2">Disabled</span>
                            </label>
                            <!-- End -->
                        </div>
                
                    </div>
                </div>

                <!-- Toggle Switch -->
                <div>
                    <h2 class="text-2xl text-gray-800 dark:text-gray-100 font-bold mb-6">Toggle Switch</h2>
                    <div class="flex flex-wrap items-center -m-3">
                
                        <div class="m-3 w-24">
                            <!-- Start -->
                            <div class="flex items-center" x-data="{ checked: true }">
                                <div class="form-switch">
                                    <input type="checkbox" id="switch-1" class="sr-only" x-model="checked" />
                                    <label class="bg-gray-400 dark:bg-gray-700" for="switch-1">
                                        <span class="bg-white shadow-sm" aria-hidden="true"></span>
                                        <span class="sr-only">Switch label</span>
                                    </label>
                                </div>
                                <div class="text-sm text-gray-400 dark:text-gray-500 italic ml-2" x-text="checked ? 'On' : 'Off'"></div>
                            </div>
                            <!-- End -->
                        </div>

                        <div class="m-3 w-24">
                            <!-- Start -->
                            <div class="flex items-center" x-data="{ checked: false }">
                                <div class="form-switch">
                                    <input type="checkbox" id="switch-2" class="sr-only" x-model="checked" />
                                    <label class="bg-gray-400 dark:bg-gray-700" for="switch-2">
                                        <span class="bg-white shadow-sm" aria-hidden="true"></span>
                                        <span class="sr-only">Switch label</span>
                                    </label>
                                </div>
                                <div class="text-sm text-gray-400 dark:text-gray-500 italic ml-2" x-text="checked ? 'On' : 'Off'"></div>
                            </div>
                            <!-- End -->
                        </div>

                        <div class="m-3 w-32">
                            <!-- Start -->
                            <div class="flex items-center" x-data="{ checked: false }">
                                <div class="form-switch">
                                    <input type="checkbox" id="switch-3" class="sr-only" x-model="checked" disabled />
                                    <label class="bg-gray-400 dark:bg-gray-700" for="switch-3">
                                        <span class="bg-white shadow-sm" aria-hidden="true"></span>
                                        <span class="sr-only">Switch label</span>
                                    </label>
                                </div>
                                <div class="text-sm text-gray-400 dark:text-gray-500 italic ml-2">Disabled</div>
                            </div>
                            <!-- End -->
                        </div>
                
                    </div>
                </div>

            </div>

        </div>

    </div>
</x-app-layout>
