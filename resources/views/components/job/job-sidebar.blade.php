<div class="space-y-8">
    <!-- Alert -->
    <div class="relative bg-[linear-gradient(135deg,var(--tw-gradient-stops))] from-violet-500/[0.12] dark:from-violet-500/[0.24] to-violet-500/[0.04] rounded-lg p-5">
        <div class="absolute bottom-0 -mb-3">
            <svg width="44" height="42" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="ill-b">
                        <stop stop-color="#B7ACFF" offset="0%" />
                        <stop stop-color="#9C8CFF" offset="100%" />
                    </linearGradient>
                    <linearGradient x1="50%" y1="24.537%" x2="50%" y2="100%" id="ill-c">
                        <stop stop-color="#4634B1" offset="0%" />
                        <stop stop-color="#4634B1" stop-opacity="0" offset="100%" />
                    </linearGradient>
                    <path id="ill-a" d="m20 0 20 40-20-6.25L0 40z" />
                </defs>
                <g transform="scale(-1 1) rotate(-51 -11.267 67.017)" fill="none" fill-rule="evenodd">
                    <mask id="ill-d" fill="#fff">
                        <use xlink:href="#ill-a" />
                    </mask>
                    <use fill="url(#ill-b)" xlink:href="#ill-a" />
                    <path fill="url(#ill-c)" mask="url(#ill-d)" d="M20.586-7.913h25v47.5h-25z" />
                </g>
            </svg>
        </div>
        <div class="relative">
            <div class="text-sm font-medium text-gray-800 dark:text-violet-200 mb-2">Remember to keep track of your job research.</div>
            <div class="text-right">
                <a class="text-sm font-medium text-violet-500 hover:text-violet-600" href="#0">Create Alert -&gt;</a>
            </div>
        </div>
    </div>
    <!-- White box -->
    <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-5 min-w-60">
        <div class="grid md:grid-cols-2 xl:grid-cols-1 gap-6">
            <!-- Group 1 -->
            <div>
                <div class="text-sm text-gray-800 dark:text-gray-100 font-semibold mb-3">Job Types</div>
                <ul class="space-y-2">
                    <li>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" checked />
                            <span class="text-sm text-gray-600 dark:text-gray-300 font-medium ml-2">Programming</span>
                        </label>
                    </li>
                    <li>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" />
                            <span class="text-sm text-gray-600 dark:text-gray-300 font-medium ml-2">Design</span>
                        </label>
                    </li>
                    <li>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" />
                            <span class="text-sm text-gray-600 dark:text-gray-300 font-medium ml-2">Management / Finance</span>
                        </label>
                    </li>
                    <li>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" />
                            <span class="text-sm text-gray-600 dark:text-gray-300 font-medium ml-2">Customer Support</span>
                        </label>
                    </li>
                    <li>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" />
                            <span class="text-sm text-gray-600 dark:text-gray-300 font-medium ml-2">Sales / Marketing</span>
                        </label>
                    </li>
                </ul>
            </div>
            <!-- Group 2 -->
            <div>
                <div class="text-sm text-gray-800 dark:text-gray-100 font-semibold mb-3">Company Culture</div>
                <div class="flex items-center" x-data="{ checked: true }">
                    <div class="form-switch">
                        <input type="checkbox" id="company-toggle" class="sr-only" x-model="checked" />
                        <label class="bg-gray-400 dark:bg-gray-700" for="company-toggle">
                            <span class="bg-white shadow-sm" aria-hidden="true"></span>
                            <span class="sr-only">Company Culture</span>
                        </label>
                    </div>
                    <div class="text-sm text-gray-400 dark:text-gray-500 italic ml-2" x-text="checked ? 'On' : 'Off'"></div>
                </div>
                <div class="text-sm dark:text-gray-500 italic mt-3">Only show companies that are creating a positive culture</div>
            </div>
            <!-- Group 3 -->
            <div>
                <div class="text-sm text-gray-800 dark:text-gray-100 font-semibold mb-3">Salary Range</div>
                <ul class="space-y-2">
                    <li>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" checked />
                            <span class="text-sm text-gray-600 dark:text-gray-300 font-medium ml-2">$20K - $50K</span>
                        </label>
                    </li>
                    <li>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" />
                            <span class="text-sm text-gray-600 dark:text-gray-300 font-medium ml-2">$50K - $100K</span>
                        </label>
                    </li>
                    <li>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" />
                            <span class="text-sm text-gray-600 dark:text-gray-300 font-medium ml-2">> $100K</span>
                        </label>
                    </li>
                    <li>
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox" />
                            <span class="text-sm text-gray-600 dark:text-gray-300 font-medium ml-2">Drawing / Painting</span>
                        </label>
                    </li>
                </ul>
            </div>
            <!-- Group 4 -->
            <div>
                <div class="text-sm text-gray-800 dark:text-gray-100 font-semibold mb-3">Immigration</div>
                <div class="flex items-center" x-data="{ checked: false }">
                    <div class="form-switch">
                        <input type="checkbox" id="immigration-toggle" class="sr-only" x-model="checked" />
                        <label class="bg-gray-400 dark:bg-gray-700" for="immigration-toggle">
                            <span class="bg-white shadow-sm" aria-hidden="true"></span>
                            <span class="sr-only">Immigration</span>
                        </label>
                    </div>
                    <div class="text-sm text-gray-400 dark:text-gray-500 italic ml-2" x-text="checked ? 'On' : 'Off'"></div>
                </div>
                <div class="text-sm dark:text-gray-500 italic mt-3">Only show companies that can sponsor a visa</div>
            </div>
        </div>
    </div>
</div>