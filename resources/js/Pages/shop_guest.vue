<script setup>
import { ref, computed } from "vue";
import { Head, Link } from "@inertiajs/vue3"; // Correct imports
import { router } from "@inertiajs/vue3";

// Imported camera images
import Canon_EOS_R5 from "/public/img/Canon_EOS_R5.png";
import Sony_A7_III from "/public/img/Sony-A7-III-.png";
import Nikon_Z6 from "/public/img/Nikon_Z6.png";
import Fujifilm_X_T4 from "/public/img/Fujifilm_X-T4.png";
import Panasonic_Lumix_GH5 from "/public/img/Panasonic_Lumix_GH5.png";
import Blackmagic_Pocket_6K from "/public/img/Blackmagic_Pocket_6K.png";

// Props passed to the component
const props = defineProps({
    cameras: Array, // Array of camera objects

    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

// Method to redirect to login page if guest clicks "Rent Now"
const redirectToLogin = () => {
    router.visit(route("login"));
};

// State for selected category and search query
const selectedCategory = ref("");
const searchQuery = ref("");

// Categories computed based on cameras
const categories = computed(() => {
    const uniqueCategories = new Set(
        props.cameras.map((camera) => camera.camera_category)
    );
    return Array.from(uniqueCategories);
});

// Filtered cameras based on selected category and search query
const filteredCameras = computed(() => {
    return props.cameras.filter((camera) => {
        const matchesCategory = selectedCategory.value
            ? camera.camera_category === selectedCategory.value
            : true; // Show all if no category is selected
        const matchesSearch = camera.camera_name
            .toLowerCase()
            .includes(searchQuery.value.toLowerCase());
        return matchesCategory && matchesSearch;
    });
});
</script>

<template>
    <div
        class="min-h-screen flex flex-col bg-gradient-to-r from-teal-950 via-teal-900 to-teal-950 text-white"
    >
        <!-- Navbar -->
        <header
            class="bg-black bg-opacity-50 backdrop-filter backdrop-blur-lg fixed w-full z-10"
        >
            <div
                class="container mx-auto flex justify-between items-center py-3 px-4"
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
                <!-- Navbar links based on authentication state -->
                <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                    <!-- Display "Home" if the user is logged in -->
                    <template v-if="$page.props.auth?.user">
                        <Link
                            :href="route('home')"
                            class="rounded-md px-3 py-2 text-white hover:text-gray-300 transition"
                        >
                            Home
                        </Link>
                    </template>

                    <!-- Display "Shop", "Login", and "Register" if the user is a guest -->
                    <template v-else>
                        <Link
                            :href="route('shop_guest')"
                            class="rounded-md px-3 py-2 text-white hover:text-gray-300 transition"
                        >
                            Shop
                        </Link>
                        <Link
                            :href="route('login')"
                            class="rounded-md px-3 py-2 text-white hover:text-gray-300 transition"
                        >
                            Log in
                        </Link>

                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="rounded-md px-3 py-2 text-white hover:text-gray-300 transition"
                        >
                            Register
                        </Link>
                    </template>
                </nav>
            </div>
        </header>
        <main class="flex-grow container mx-auto px-4 pt-24 pb-12">
            <Link :href="route('landingPage')" class="flex items-center">
                <!-- Back Arrow Icon -->
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    class="mr-2 text-white"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19 12H5"
                    ></path>
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 19l-7-7 7-7"
                    ></path>
                </svg>
                Back
            </Link>
            <!-- Camera Categories -->
            <div class="container mx-auto py-12">
                <h1 class="text-4xl font-bold text-center mb-8">Camera Shop</h1>

                <!-- Category Filter -->
                <section class="mb-16">
                    <div class="flex flex-wrap justify-between gap-4">
                        <!-- "All Cameras" Option -->
                        <div
                            @click="selectedCategory = ''"
                            class="flex-1 min-w-[120px] text-center p-6 transition-all duration-300 hover:shadow-2xl hover:scale-105 cursor-pointer rounded-lg shadow-lg"
                            :class="{
                                'bg-gray-900 text-white':
                                    selectedCategory !== '',
                                'bg-gray-850 text-white':
                                    selectedCategory === '',
                                'ring-2 ring-green-500':
                                    selectedCategory === '',
                            }"
                        >
                            <h3 class="text-xl font-semibold">All Cameras</h3>
                        </div>

                        <!-- Other Categories -->
                        <div
                            v-for="category in categories"
                            :key="category"
                            @click="selectedCategory = category"
                            class="flex-1 min-w-[120px] text-center p-6 transition-all duration-300 hover:shadow-2xl hover:scale-105 cursor-pointer rounded-lg shadow-lg"
                            :class="{
                                'bg-gray-900 text-white':
                                    selectedCategory !== category,
                                'bg-gray-850 text-white':
                                    selectedCategory === category,
                                'ring-2 ring-green-500':
                                    selectedCategory === category,
                            }"
                        >
                            <h3 class="text-xl font-semibold">
                                {{ category }}
                            </h3>
                        </div>
                    </div>
                </section>

                <!-- Search Bar -->
                <div class="mb-12">
                    <div class="max-w-xl mx-auto relative">
                        <input
                            v-model="searchQuery"
                            type="text"
                            placeholder="Search cameras..."
                            class="w-full pl-12 pr-4 py-3 rounded-full bg-white-700 text-black placeholder-black-400 focus:outline-none focus:ring-2 focus:ring-gray-950 text-gray"
                        />
                        <svg
                            class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"
                            width="20"
                            height="20"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                            ></path>
                        </svg>
                    </div>
                </div>

                <!-- Camera Products Grid -->
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8"
                >
                    <div
                        v-for="camera in filteredCameras"
                        :key="camera.camera_id"
                        class="bg-gray-950 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300"
                    >
                        <img
                            v-if="camera.camera_image"
                            :src="`/storage/${camera.camera_image}`"
                            alt="Camera image"
                            class="camera-image mx-auto mb-4 w-full h-64 object-cover rounded-t-lg transform transition-all hover:scale-110"
                        />
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2 text-white">
                                {{ camera.camera_name }}
                            </h3>
                            <p class="text-gray-400 mb-4">
                                {{ camera.camera_category }}
                            </p>
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-bold text-green-400">
                                    ${{ camera.camera_price }}
                                </span>
                                <Link
                                    :href="route('login')"
                                    class="bg-blue-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded-full transition duration-300"
                                >
                                    Rent Now </Link
                                >y
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer
        <footer class="py-6 bg-gradient-to-br from-gray-900 to-gray-900">
            <div class="container mx-auto text-center text-gray-400">
                <p>
                    &copy; {{ new Date().getFullYear() }} ZoomPro. All rights
                    reserved.
                </p>
            </div>
        </footer> -->
    </div>
</template>

<script>
// Proper Vue 3 component definition
export default {
    data() {
        return {
            camera: [{ img: Panasonic_Lumix_GH5 }],
        };
    },
};
</script>

<style scoped>
/* Hero animation */
.hero {
    position: relative;
    overflow: hidden;
}

.animate-camera {
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0%,
    100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-15px);
    }
}

/* Responsive styles */
@media (max-width: 768px) {
    header {
        padding: 1rem 0;
    }

    .hero h1 {
        font-size: 2rem;
    }

    .hero p {
        font-size: 1rem;
    }

    footer p {
        font-size: 0.75rem;
    }
}

@media (max-width: 640px) {
    footer p {
        font-size: 0.75rem;
    }
}
</style>
