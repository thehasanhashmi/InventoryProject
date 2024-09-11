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
                                <label class="block text-sm font-medium mb-1" for="mandatory">Mandatory <span class="text-red-500">*</span></label>
                                <input id="mandatory" class="form-input w-full" type="text" required />
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
                
                    <label class="block text-sm font-medium mb-1" for="country">Country</label>
                    <select id="country" class="form-select">
                        <option>Italy</option>
                        <option>USA</option>
                        <option>United Kingdom</option>
                    </select>
                </div>

               

               
                    </div>
                </div>

            </div>

        </div>

    </div>
</x-app-layout>
