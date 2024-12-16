<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

import Panasonic_Lumix_GH5 from "/public/img/Panasonic_Lumix_GH5.png";

defineProps({
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

// Get page props safely
const { props } = usePage();

// Safely access the user and role_id, handling undefined `auth`
const auth = props.auth || {};
const role_id = auth.user?.role_id;

// Define role-based redirection

const roleBasedRedirect = computed(() => {
    if (!role_id) {
        console.error("Role ID is undefined. Redirecting to fallback route.");
        return route("home");
    }

    switch (role_id) {
        case 2:
            return route("payments.index"); // Admin route
        case 3:
            return route("UserDashboard"); // User dashboard
        default:
            return route("home"); // Fallback route
    }
});

function handleImageError() {
    const screenshotContainer = document.getElementById("screenshot-container");
    const docsCard = document.getElementById("docs-card");
    const docsCardContent = document.getElementById("docs-card-content");
    const background = document.getElementById("background");

    screenshotContainer?.classList.add("!hidden");
    docsCard?.classList.add("!row-span-1");
    docsCardContent?.classList.add("!flex-row");
    background?.classList.add("!hidden");
}
</script>

<template>
    <div class="relative min-h-screen flex flex-col text-white overflow-hidden">
        <div class="relative z-10 flex flex-col min-h-screen">
            <!-- Navbar -->
            <header
                class="bg-gray bg-opacity-50 backdrop-filter backdrop-blur-lg fixed w-full z-10 shadow-lg"
            >
                <div
                    class="container mx-auto flex justify-between items-center py-4 px-4"
                >
                    <Link
                        :href="roleBasedRedirect"
                        class="text-2xl font-bold tracking-tighter group"
                    >
                        <span
                            class="inline-block text-transparent bg-clip-text bg-gradient-to-r from-purple-300 to-blue-500 group-hover:from-blue-500 group-hover:to-purple-400 transition-all duration-300 transform hover:scale-105 hover:shadow-lg"
                        >
                            ZoomPro
                        </span>
                    </Link>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link
                            :href="roleBasedRedirect"
                            v-if="$page.props.auth?.user"
                            class="rounded-md px-3 py-2 text-white hover:text-gray-300 transition"
                        >
                            Home
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('shop_guest')"
                                class="relative overflow-hidden group px-4 py-2 rounded-full transition-all duration-300"
                            >
                                <span
                                    class="relative z-10 transition-colors duration-300 group-hover:text-gray-900"
                                    >Shop</span
                                >
                                <span
                                    class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-500 to-green-600 opacity-0 group-hover:opacity-100 transform scale-x-0 group-hover:scale-x-100 transition-all duration-300 origin-left rounded-full"
                                ></span>
                            </Link>
                            <Link
                                :href="route('login')"
                                class="relative overflow-hidden group px-4 py-2 rounded-full transition-all duration-300"
                            >
                                <span
                                    class="relative z-10 transition-colors duration-300 group-hover:text-gray-900"
                                    >Log in</span
                                >
                                <span
                                    class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-500 to-green-600 opacity-0 group-hover:opacity-100 transform scale-x-0 group-hover:scale-x-100 transition-all duration-300 origin-left rounded-full"
                                ></span>
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="relative overflow-hidden group px-4 py-2 rounded-full transition-all duration-300"
                            >
                                <span
                                    class="relative z-10 transition-colors duration-300 group-hover:text-gray-900"
                                    >Register</span
                                >
                                <span
                                    class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-500 to-green-600 opacity-0 group-hover:opacity-100 transform scale-x-0 group-hover:scale-x-100 transition-all duration-300 origin-left rounded-full"
                                ></span>
                            </Link>
                        </template>
                    </nav>
                </div>
            </header>

            <!-- Hero Section -->
            <section
                class="hero flex-grow bg-gradient-to-r from-gray-950 via-slate-900 to-gray-950 flex items-center"
            >
                <div
                    class="container mx-auto flex flex-col md:flex-row items-center px-4"
                >
                    <!-- Left Content -->
                    <div class="md:w-1/2 text-center md:text-left space-y-6">
                        <h2
                            class="text-4xl md:text-5xl font-bold leading-tight"
                        >
                            Zoom Pro
                            <span
                                class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500"
                            >
                                Top-tier cameras
                            </span>
                        </h2>
                        <p
                            class="text-lg text-gray-300 max-w-md mx-auto md:mx-0"
                        >
                            Find top-quality cameras for every occasion,
                            available at affordable rental prices.
                        </p>
                        <Link
                            v-if="$page.props.auth?.user"
                            :href="route('home')"
                            class="inline-block bg-gradient-to-r from-blue-500 to-green-700 text-white font-semibold px-6 py-3 rounded-full transition-all duration-300 transform hover:scale-105 hover:shadow-lg"
                        >
                            Start Renting
                        </Link>
                        <template v-else>
                            <Link
                                :href="route('shop_guest')"
                                class="inline-block bg-gradient-to-r from-blue-500 to-green-700 text-white font-semibold px-6 py-3 rounded-full transition-all duration-300 transform hover:scale-105 hover:shadow-lg"
                            >
                                Start Renting
                            </Link>
                        </template>
                    </div>

                    <!-- Right Image -->
                    <div class="md:w-1/2 relative">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-blue-500 to-green-600 rounded-full filter blur-[100px] opacity-30 animate-pulse"
                        ></div>

                        <img
                            src="/img/canonr6.png"
                            alt="canonr6"
                            class="w-full max-w-md mx-auto relative z-10 animate-camera"
                            @error="handleImageError"
                        />
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            camera: [{ img: Panasonic_Lumix_GH5 }],
        };
    },
};
</script>

<style scoped>
.hero {
    position: relative;
    overflow: hidden;
    min-height: calc(100vh - 64px); /* Adjust based on your header height */
    padding-top: 64px; /* Add padding to account for fixed header */
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
}

@media (max-width: 640px) {
    .hero {
        padding-top: 80px;
    } /* Increase padding for smaller screens */
}
</style>
