<template>
    <div
        class="min-h-screen bg-gradient-to-r from-teal-950 via-teal-900 to-teal-950 text-white"
    >
        <!-- Header with Navbar -->
         
        <header
            class="bg-black bg-opacity-50 backdrop-filter backdrop-blur-lg fixed w-full z-10"
        >
            <div class="container mx-auto px-4 py-3">
                <div
                    class="container mx-auto flex justify-between items-center"
                >
                    <Link
                        :href="route('home')"
                        class="text-2xl font-bold tracking-tighter group"
                    >
                        <span
                            class="inline-block text-transparent bg-clip-text bg-gradient-to-r from-purple-300 to-blue-500 group-hover:from-blue-500 group-hover:to-purple-400 transition-all duration-300 transform hover:scale-105 hover:shadow-lg"
                        >
                            ZoomPro
                        </span>
                    </Link>

                    <!-- Desktop Navigation -->
                    <nav class="hidden md:flex space-x-6 items-center">
                        <Link
                            :href="route('home')"
                            class="relative overflow-hidden group px-4 py-2 rounded-full transition-all duration-300"
                            :class="{
                                'bg-gradient-to-r from-blue-500 to-green-600 opacity-100 scale-x-100 text-gray-900':
                                    route().current('home'),
                            }"
                        >
                            <span
                                class="relative z-10 transition-colors duration-300"
                                :class="{
                                    'text-gray-900': route().current('home'),
                                }"
                            >
                                Home
                            </span>
                            <span
                                class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-500 to-green-600 opacity-0 group-hover:opacity-100 transform scale-x-0 group-hover:scale-x-100 transition-all duration-300 rounded-full"
                                :class="{
                                    'opacity-100 scale-x-100':
                                        route().current('home'),
                                }"
                            ></span>
                        </Link>
                        <Link
                            :href="route('shop')"
                            class="relative overflow-hidden group px-4 py-2 rounded-full transition-all duration-300"
                            :class="{
                                'bg-gradient-to-r from-blue-500 to-green-600 opacity-100 scale-x-100 text-gray-900':
                                    route().current('shop'),
                            }"
                        >
                            <span
                                class="relative z-10 transition-colors duration-300"
                                :class="{
                                    'text-gray-900': route().current('shop'),
                                }"
                            >
                                Shop
                            </span>
                            <span
                                class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-500 to-green-600 opacity-0 group-hover:opacity-100 transform scale-x-0 group-hover:scale-x-100 transition-all duration-300 rounded-full"
                                :class="{
                                    'opacity-100 scale-x-100':
                                        route().current('shop'),
                                }"
                            ></span>
                        </Link>
                        <Link
                            :href="route('myaccount')"
                            class="relative overflow-hidden group px-4 py-2 rounded-full transition-all duration-300"
                            :class="{
                                'bg-gradient-to-r from-blue-500 to-green-600 opacity-100 scale-x-100 text-gray-900':
                                    route().current('myaccount'),
                            }"
                        >
                            <span
                                class="relative z-10 transition-colors duration-300"
                                :class="{
                                    'text-gray-900':
                                        route().current('myaccount'),
                                }"
                            >
                                Account
                            </span>
                            <span
                                class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-500 to-green-600 opacity-0 group-hover:opacity-100 transform scale-x-0 group-hover:scale-x-100 transition-all duration-300 rounded-full"
                                :class="{
                                    'opacity-100 scale-x-100':
                                        route().current('myaccount'),
                                }"
                            ></span>
                        </Link>
                        <Link
                            :href="route('support')"
                            class="relative overflow-hidden group px-4 py-2 rounded-full transition-all duration-300"
                            :class="{
                                'bg-gradient-to-r from-blue-500 to-green-600 opacity-100 scale-x-100 text-gray-900':
                                    route().current('support'),
                            }"
                        >
                            <span
                                class="relative z-10 transition-colors duration-300"
                                :class="{
                                    'text-gray-900': route().current('support'),
                                }"
                            >
                                Support
                            </span>
                            <span
                                class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-500 to-green-600 opacity-0 group-hover:opacity-100 transform scale-x-0 group-hover:scale-x-100 transition-all duration-300 rounded-full"
                                :class="{
                                    'opacity-100 scale-x-100':
                                        route().current('support'),
                                }"
                            ></span>
                        </Link>

                        <!-- Settings Dropdown -->
                        <div class="relative">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <button
                                        class="inline-flex items-center text-white bg-transparent border border-transparent px-3 py-2 text-sm font-medium hover:text-blue-400 focus:outline-none"
                                    >
                                        {{ $page.props.auth.user.name }}
                                        <svg
                                            class="ml-2 h-4 w-4"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20"
                                            fill="currentColor"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </button>
                                </template>

                                <template #content>
                                    <DropdownLink :href="route('profile.edit')">
                                        Profile
                                    </DropdownLink>
                                    <DropdownLink
                                        :href="route('logout')"
                                        method="post"
                                        as="button"
                                    >
                                        Log Out
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
                    </nav>

                    <!-- Mobile Menu Button -->
                    <button
                        @click="
                            showingNavigationDropdown =
                                !showingNavigationDropdown
                        "
                        class="md:hidden text-white focus:outline-none"
                    >
                        <svg
                            :class="
                                !showingNavigationDropdown ? 'block' : 'hidden'
                            "
                            class="h-6 w-6"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"
                            />
                        </svg>
                        <svg
                            :class="
                                showingNavigationDropdown ? 'block' : 'hidden'
                            "
                            class="h-6 w-6"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>

                <!-- Mobile Navigation -->
                <div
                    :class="showingNavigationDropdown ? 'block' : 'hidden'"
                    class="md:hidden mt-4 bg-gray-800 rounded-lg shadow-md"
                >
                    <nav class="space-y-4 p-4">
                        <Link
                            :href="route('home')"
                            class="block text-white hover:text-blue-400"
                            >Home</Link
                        >
                        <Link
                            :href="route('shop')"
                            class="block text-white hover:text-blue-400"
                            >Shop</Link
                        >
                        <Link
                            :href="route('myaccount')"
                            class="block text-white hover:text-blue-400"
                            >Account</Link
                        >
                        <Link
                            :href="route('support')"
                            class="block text-white hover:text-blue-400"
                            >Support</Link
                        >

                        <!-- Responsive Settings Dropdown -->
                        <div class="border-t border-gray-700 mt-4 pt-4">
                            <div class="text-white">
                                <p>{{ $page.props.auth.user.name }}</p>
                                <p class="text-sm text-gray-400">
                                    {{ $page.props.auth.user.email }}
                                </p>
                            </div>
                            <Link
                                :href="route('profile.edit')"
                                class="block mt-2 text-white hover:text-blue-400"
                            >
                                Profile
                            </Link>
                            <Link
                                :href="route('logout')"
                                method="post"
                                as="button"
                                class="block mt-2 text-white hover:text-blue-400"
                            >
                                Log Out
                            </Link>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- Hero Section -->
        <section
            class="relative h-screen flex items-center justify-center overflow-hidden"
        >
            <!-- Video Background -->
            <div class="absolute inset-0 z-0">
                <video
                    autoplay
                    loop
                    playsinline
                    class="w-full h-full object-cover"
                >
                    <source
                        v-for="video in videoSources"
                        :key="video.id"
                        :src="video.src"
                        :type="video.type"
                    />
                    Your browser does not support the video tag.
                </video>
                <div class="absolute inset-0 bg-black opacity-60"></div>
            </div>

            <!-- Content on top of the video -->
            <div class="relative z-10 text-center">
                <h2 class="text-5xl md:text-7xl font-extrabold mb-4">
                    Capture Your Vision
                </h2>
                <p class="text-xl md:text-2xl mb-8">
                    Professional cameras at your fingertips
                </p>
                <button
                    href="#camera"
                    v-smooth-scroll
                    class="bg-green-700 hover:bg-green-950 text-white font-bold py-3 px-8 rounded-full transition duration-300 transform hover:scale-105"
                >
                    Explore Cameras
                </button>
            </div>
        </section>
        <!-- Main content -->
        <main class="container mx-auto px-4 py-16">
            <!-- Featured Camera Section -->
            <section class="mb-16">
                <h2 class="text-3xl font-bold mb-8 text-center">
                    Featured: EOS R6 Mark II
                </h2>
                <div class="bg-teal-800 rounded-lg overflow-hidden shadow-2xl">
                    <div class="md:flex">
                        <div class="md:w-1/2">
                            <video
                                ref="videoPlayer"
                                class="w-full h-full object-cover"
                                @click="togglePlay"
                                autoplay
                                muted
                                playsinline
                            >
                                <source :src="videoSource" type="video/mp4" />
                            </video>
                        </div>
                        <div class="md:w-1/2 p-8">
                            <h3 class="text-2xl font-bold mb-4">
                                EOS R6 Mark II
                            </h3>
                            <p class="mb-6">
                                Experience unparalleled videography and
                                photography with the EOS R6 Mark II. Capable of
                                recording up to 6K 60p 10-bit RAW movies, this
                                camera is a game-changer for professionals and
                                enthusiasts alike.
                            </p>
                            <div class="flex items-center justify-between mb-6">
                                <span class="text-3xl font-bold text-green-500"
                                    >$200/day</span
                                >
                                <a
                                    href="#camera"
                                    v-smooth-scroll
                                    class="bg-gradient-to-r from-blue-500 to-green-700 text-white font-bold py-2 px-6 rounded-full transition duration-300 transform hover:scale-105 hover:shadow-lg"
                                >
                                    Rent Now
                                </a>
                            </div>
                            <div
                                class="flex items-center justify-center space-x-4"
                            >
                                <button
                                    @click="togglePlay"
                                    class="text-white hover:text-blue-400 transition duration-300"
                                >
                                    <svg
                                        v-if="!isPlaying"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-8 w-8"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"
                                        />
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />
                                    </svg>
                                    <svg
                                        v-else
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-8 w-8"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"
                                        />
                                    </svg>
                                </button>
                                <button
                                    @click="toggleMute"
                                    class="text-white hover:text-blue-400 transition duration-300"
                                >
                                    <svg
                                        v-if="!isMuted"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-8 w-8"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"
                                        />
                                    </svg>
                                    <svg
                                        v-else
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-8 w-8"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"
                                        />
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"
                                        />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Camera Listing Section -->
            <div id="camera">
                <!-- Our Camera Collection Section -->
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8"
                >
                    <div
                        v-for="camera in cameras.data"
                        :key="camera.camera_id"
                        class="bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300"
                    >
                        <img
                            v-if="camera.camera_image"
                            :src="`/storage/app/public/upload/${camera.camera_image}`"
                            :alt="camera.camera_name"
                            class="w-full h-64 object-cover"
                        />
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2 text-white">
                                {{ camera.camera_name }}
                            </h3>
                            <p class="text-gray-400 mb-4">
                                {{ camera.camera_category }}
                            </p>
                            <span class="text-2xl font-bold text-green-400"
                                >${{ camera.camera_price }}</span
                            >
                        </div>
                    </div>
                </div>

                <!-- Pagination Controls -->
                <div class="mt-8 flex justify-center space-x-2">
                    <!-- Previous Button -->
                    <button
                        @click="goToPage(cameras.prev_page_url)"
                        :disabled="!cameras.prev_page_url"
                        class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-600 disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        Previous
                    </button>

                    <!-- Page Numbers -->
                    <button
                        v-for="page in totalPages"
                        :key="page"
                        @click="goToPage(getPageUrl(page))"
                        :class="[
                            'px-4 py-2 rounded',
                            page === cameras.current_page
                                ? 'bg-green-500 text-white'
                                : 'bg-gray-700 text-white hover:bg-gray-600',
                        ]"
                    >
                        {{ page }}
                    </button>

                    <!-- Next Button -->
                    <button
                        @click="goToPage(cameras.next_page_url)"
                        :disabled="!cameras.next_page_url"
                        class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-600 disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        Next
                    </button>
                </div>
            </div>
            <!-- Testimonial Section -->
            <section class="mb-16">
                <h2 class="text-3xl font-bold mb-8 text-center">
                    What Our Customers Say
                </h2>
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"
                >
                    <div
                        v-for="testimonial in testimonials"
                        :key="testimonial.id"
                        class="bg-gray-950 rounded-lg p-6 shadow-lg"
                    >
                        <div class="flex items-center mb-4">
                            <img
                                :src="testimonial.avatar"
                                :alt="testimonial.name"
                                class="w-12 h-12 rounded-full mr-4"
                            />
                            <div>
                                <h4 class="font-semibold">
                                    {{ testimonial.name }}
                                </h4>
                                <p class="text-gray-400 text-sm">
                                    {{ testimonial.profession }}
                                </p>
                            </div>
                        </div>
                        <p class="text-gray-300">{{ testimonial.comment }}</p>
                    </div>
                </div>
            </section>
        </main>
        <!-- FOOTER -->
        <footer class="bg-gray-950 py-11">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">ZoomPro</h3>
                        <p class="text-gray-400">
                            Empowering creators with top-notch camera gear.
                        </p>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                        <ul class="space-y-2">
                            <li>
                                <Link
                                    :href="
                                        route('aboutus', {
                                            scrollTo: 'about-us',
                                        })
                                    "
                                    class="text-gray-400 hover:text-white transition duration-300"
                                >
                                    About Us
                                </Link>
                            </li>
                            <li>
                                <Link
                                    :href="
                                        route('aboutus', { scrollTo: 'faq' })
                                    "
                                    class="text-gray-400 hover:text-white transition duration-300"
                                >
                                    FAQ
                                </Link>
                            </li>
                            <li>
                                <Link
                                    :href="
                                        route('aboutus', { scrollTo: 'terms' })
                                    "
                                    class="text-gray-400 hover:text-white transition duration-300"
                                >
                                    Terms Of Service
                                </Link>
                            </li>
                            <li>
                                <Link
                                    :href="
                                        route('aboutus', {
                                            scrollTo: 'privacy',
                                        })
                                    "
                                    class="text-gray-400 hover:text-white transition duration-300"
                                >
                                    Privacy Policy
                                </Link>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">
                            Connect With Us
                        </h4>
                        <div class="flex space-x-4">
                            <a
                                href="https://www.facebook.com/andreeeofficial"
                                class="text-gray-400 hover:text-white transition duration-300"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="https://www.instagram.com/andreeeofficial/"
                                class="text-gray-400 hover:text-white transition duration-300"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0  14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"
                                    />
                                </svg>
                            </a>
                            <a
                                href="https://www.instagram.com/andreeeofficial/"
                                class="text-gray-400 hover:text-white transition duration-300"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"
                                    />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div
                    class="mt-8 pt-8 border-t border-gray-800 text-center text-gray-400"
                >
                    <p>
                        &copy; {{ new Date().getFullYear() }} ZoomPro. All
                        rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </div>
</template>
<script setup>
import { computed } from "vue";
import { defineProps } from "vue";
import { usePage, router } from "@inertiajs/vue3";

import { ref } from "vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import { Link } from "@inertiajs/vue3";

const showingNavigationDropdown = ref(false);

// Props for cameras
const { cameras } = usePage().props;

// Compute total pages for pagination
const totalPages = computed(() => cameras.last_page);

// Navigate to a specific page
const goToPage = (url) => {
    if (url) {
        router.visit(url, { preserveState: true, preserveScroll: true });
    }
};

// Generate the page URL for pagination
const getPageUrl = (page) => {
    return `${cameras.path}?page=${page}`;
};
</script>
<script>
import andre from "/public/img/andre.jpg";
import dave from "/public/img/dave.jpg";
import jeff from "/public/img/jeff.jpg";

import HeroBackground from "/public/hero-background.mp4";

export default {
    data() {
        return {
            videoSource: HeroBackground,
            isPlaying: true,
            isMuted: true,

            videoSources: [
                {
                    id: 1,
                    src: HeroBackground,
                    type: "video/mp4",
                },
            ],

            currentSlide: 0,
            mobileMenuOpen: false,

            searchTerm: "",
            isPlaying: false,
            isMuted: true,
            testimonials: [
                {
                    id: 1,
                    name: "Andre Salvador",
                    profession: "Professional Photographer",
                    avatar: andre,
                    comment:
                        "ZoomPro has been a game-changer for my photography business. The quality of their cameras is unmatched!",
                },
                {
                    id: 2,
                    name: "Dave Salte",
                    profession: "Indie Filmmaker",
                    avatar: dave,
                    comment:
                        "As an indie filmmaker, having access to high-end equipment is crucial. ZoomPro delivers every time.",
                },
                {
                    id: 3,
                    name: "Jeffrey Romerosa",
                    profession: "Travel Vlogger",
                    avatar: jeff,
                    comment:
                        "I've been using ZoomPro for all my travels. Their service is top-notch, and the gear is always in perfect condition.",
                },
            ],
        };
    },

    methods: {
        handleRentClick() {
            this.rentCamera({
                id: "r6-mark-ii",
                name: "EOS R6 Mark II",
            });
            this.$router.push("/shop"); // Navigate to the Shop.vue page
        },
        rentCamera(camera) {
            // Handle the camera renting logic here
            console.log("Renting camera:", camera);
        },

        toggleMobileMenu() {
            this.mobileMenuOpen = !this.mobileMenuOpen;
        },
        rentCamera(camera) {
            console.log(`Renting ${camera.name}`);
            // Implement rental logic here
        },
        togglePlay() {
            const video = this.$refs.videoPlayer;
            if (video.paused) {
                video.play();
                this.isPlaying = true;
            } else {
                video.pause();
                this.isPlaying = false;
            }
        },
        toggleMute() {
            const video = this.$refs.videoPlayer;
            video.muted = !video.muted;
            this.isMuted = video.muted;
        },
    },
};
</script>

<style scoped>
@import "tailwindcss/base";
@import "tailwindcss/components";
@import "tailwindcss/utilities";

/* pagination styles */
.pagination button {
    transition: background-color 0.3s ease;
}
.pagination button:hover:not(:disabled) {
    background-color: #1cd600; /* Tailwind orange-500 */
    color: white;
}

.camera-carousel-container {
    position: relative;
    width: 100%;
    overflow: hidden;
}

.camera-carousel {
    display: flex;
    transition: transform 0.5s ease-in-out;
}

.camera-item {
    flex: 0 0 33.333%;
    padding: 0 10px;
    text-align: center;
}

.camera-image {
    width: 100%;
    height: auto;
    max-width: 300px;
    margin: 0 auto;
}

.carousel-controls {
    position: absolute;
    top: 50%;
    width: 100%;
    display: flex;
    justify-content: space-between;
    transform: translateY(-50%);
}

.carousel-btn {
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    font-size: 18px;
    transition: background-color 0.3s;
}

.carousel-btn:hover {
    background-color: rgba(0, 0, 0, 0.7);
}

.carousel-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

@media (max-width: 768px) {
    .camera-item {
        flex: 0 0 50%;
    }
}

@media (max-width: 480px) {
    .camera-item {
        flex: 0 0 100%;
    }
}

html {
    scroll-behavior: smooth;
}
</style>
