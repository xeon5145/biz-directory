<!-- Header -->
<nav class="top-3 left-3 right-3 sticky flex flex-row justify-between gap-4 ml-5 mr-5">
    <div class="w-1/3 flex justify-start">
        <p class="text-3xl self-center" title="Biz Dir">BD</p>
    </div>

    <div class="w-1/3 flex justify-center backdrop-blur-xs grayscale bg-slate-400/20 rounded-lg px-4 py-4">
        <p>Navigations</p>
    </div>

    <div class="w-1/3 flex justify-end">
        <a href="/login" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            Login
        </a>
    </div>
</nav>
<!-- Header -->

<!-- Main Page -->
<div class="min-h-screen bg-gradient-to-b from-blue-50 to-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Hero Section -->
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight">
                Discover Local Businesses <span class="text-blue-600">Near You</span>
            </h1>
            <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-600">
                Connect with the best local services, restaurants, shops, and professionals in your area.
                Supporting local businesses has never been easier.
            </p>
            
            <!-- Search Bar -->
            <div class="mt-10 max-w-2xl mx-auto">
                <div class="flex rounded-lg shadow-sm">
                    <div class="relative flex-grow focus-within:z-10
                        ">
                        <input type="text" name="search" id="search" class="focus:ring-blue-500 focus:border-blue-500 block w-full rounded-l-lg pl-4 pr-12 py-4 text-base border-gray-300" placeholder="Search for businesses, services, or categories">
                    </div>
                    <button type="button" class="-ml-px relative inline-flex items-center px-6 py-4 border border-transparent text-sm font-medium rounded-r-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                        <span class="ml-2">Search</span>
                    </button>
                </div>
                <p class="mt-3 text-sm text-gray-500">
                    Popular searches: <a href="#" class="font-medium text-blue-600 hover:text-blue-500">Restaurants</a>, 
                    <a href="#" class="font-medium text-blue-600 hover:text-blue-500">Hair Salons</a>, 
                    <a href="#" class="font-medium text-blue-600 hover:text-blue-500">Plumbers</a>
                </p>
            </div>
        </div>

        <!-- Categories -->
        <div class="mt-20">
            <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Browse by Category</h2>
            <div class="grid grid-cols-2 gap-6 md:grid-cols-4 lg:grid-cols-6">
                <!-- Category Item -->
                <a href="#" class="group bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-200 text-center">
                    <div class="mx-auto h-12 w-12 text-blue-600 group-hover:text-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-sm font-medium text-gray-900 group-hover:text-blue-600">Finance</h3>
                </a>
                <!-- More category items... -->
                <a href="#" class="group bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-200 text-center">
                    <div class="mx-auto h-12 w-12 text-green-600 group-hover:text-green-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-sm font-medium text-gray-900 group-hover:text-green-600">Technology</h3>
                </a>
                <a href="#" class="group bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-200 text-center">
                    <div class="mx-auto h-12 w-12 text-yellow-600 group-hover:text-yellow-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-sm font-medium text-gray-900 group-hover:text-yellow-600">Travel</h3>
                </a>
                <a href="#" class="group bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-200 text-center">
                    <div class="mx-auto h-12 w-12 text-purple-600 group-hover:text-purple-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-sm font-medium text-gray-900 group-hover:text-purple-600">Shopping</h3>
                </a>
                <a href="#" class="group bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-200 text-center">
                    <div class="mx-auto h-12 w-12 text-red-600 group-hover:text-red-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-sm font-medium text-gray-900 group-hover:text-red-600">Education</h3>
                </a>
                <a href="#" class="group bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-all duration-200 text-center">
                    <div class="mx-auto h-12 w-12 text-pink-600 group-hover:text-pink-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="mt-4 text-sm font-medium text-gray-900 group-hover:text-pink-600">Real Estate</h3>
                </a>
            </div>
        </div>

        <!-- Featured Businesses -->
        <div class="mt-20">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold text-gray-900">Featured Businesses</h2>
                <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-500">View all <span aria-hidden="true">→</span></a>
            </div>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Business Card 1 -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12 rounded-full" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Business logo">
                            </div>
                            <div class="ml-5">
                                <h3 class="text-lg font-medium text-gray-900">Gourmet Delights</h3>
                                <div class="flex items-center mt-1">
                                    <div class="flex items-center">
                                        <svg class="text-yellow-400 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <span class="text-gray-600 ml-1">4.8</span>
                                        <span class="mx-1 text-gray-300">•</span>
                                        <span class="text-gray-600">Restaurant</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 text-gray-600">Upscale dining experience with locally-sourced ingredients and an extensive wine selection.</p>
                        <div class="mt-4 flex items-center text-sm text-gray-500">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            123 Main St, City
                        </div>
                    </div>
                    <div class="bg-gray-50 px-5 py-3">
                        <div class="flex justify-between">
                            <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-500">View details</a>
                            <button type="button" class="text-gray-400 hover:text-gray-500">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- More business cards... -->
            </div>
        </div>

        <!-- CTA Section -->
        <div class="mt-20 bg-blue-700 rounded-2xl overflow-hidden shadow-xl">
            <div class="px-6 py-12 sm:p-16 lg:flex lg:items-center lg:justify-between">
                <div class="lg:w-0 lg:flex-1">
                    <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                        Ready to grow your business?
                    </h2>
                    <p class="mt-4 max-w-3xl text-lg leading-6 text-blue-100">
                        List your business in our directory and reach thousands of potential customers today.
                    </p>
                </div>
                <div class="mt-8 flex lg:mt-0 lg:ml-8">
                    <div class="inline-flex rounded-md shadow">
                        <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-white hover:bg-blue-50">
                            Get started
                        </a>
                    </div>
                    <div class="ml-3 inline-flex rounded-md shadow">
                        <a href="#" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 bg-opacity-60 hover:bg-opacity-70">
                            Learn more
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Page -->

<!-- Footer -->
<footer>
    <div class="h-64 bg-gray-200 flex flex-col justify-center items-center">
        <p class="text-3xl">Footer</p>
        <p class="mt-2">© 2025 Biz Directory. All rights reserved.</p>
        <p class="mt-2">
            <a href="#" class="text-blue-500 hover:underline">Privacy Policy</a>
            <span class="mx-2">|</span>
            <a href="#" class="text-blue-500 hover:underline">Terms of Service</a>
        </p>
    </div>
</footer>
<!-- Footer -->