<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";

import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

// Get page props safely
const { props } = usePage();

// Safely access the user and role_id, handling undefined `auth`
const auth = props.auth || {};
const role_id = auth.user?.role_id || null;

// Define role-based redirection
const roleBasedRedirect = computed(() => {
    switch (role_id) {
        case 2:
            return route("payments.index"); // Redirect to admin home
        case 3:
            return route("UserDashboard"); // Redirect to user dashboard
        default:
            return route("home"); // Fallback route
    }
});

const showingNavigationDropdown = ref(false);
</script>
<template>
    <div class="bg-black text-white">
        <!-- Header with Navbar -->
        <header
            class="bg-black bg-opacity-50 backdrop-filter backdrop-blur-lg fixed w-full z-10 text-white"
        >
            <div class="container mx-auto px-4 py-5">
                <div
                    class="container mx-auto flex justify-between items-center"
                >
                    <Link
                        :href="roleBasedRedirect"
                        class="text-2xl font-bold tracking-tighter group"
                    >
                        <span
                            class="inline-block text-transparent bg-clip-text bg-gradient-to-r from-purple-300 to-blue-500 group-hover:from-blue-500 group-hover:to-purple-400 transition-all duration-300 transform hover:scale-105 hover:shadow-lg justify-start"
                        >
                            ZoomPro
                        </span>
                    </Link>

                    <!-- Desktop Navigation -->
                    <nav class="hidden md:flex space-x-6 items-center">
                        <div v-if="$page.props.auth.user.role_id == 1">
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
                                        'text-gray-900':
                                            route().current('home'),
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
                                        'text-gray-900':
                                            route().current('shop'),
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
                                        'text-gray-900':
                                            route().current('support'),
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
                        </div>
                        <div v-if="$page.props.auth.user.role_id == 2">
                            <Link
                                :href="route('payments.index')"
                                class="relative overflow-hidden group px-4 py-2 rounded-full transition-all duration-300"
                                :class="{
                                    'bg-gradient-to-r from-blue-500 to-green-600 opacity-100 scale-x-100 text-gray-900':
                                        route().current('payments.index'),
                                }"
                            >
                                <span
                                    class="relative z-10 transition-colors duration-300"
                                    :class="{
                                        'text-gray-900':
                                            route().current('payments.index'),
                                    }"
                                >
                                    Home
                                </span>
                                <span
                                    class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-500 to-green-600 opacity-0 group-hover:opacity-100 transform scale-x-0 group-hover:scale-x-100 transition-all duration-300 rounded-full"
                                    :class="{
                                        'opacity-100 scale-x-100':
                                            route().current('payments.index'),
                                    }"
                                ></span>
                            </Link>
                        </div>
                        <div v-if="$page.props.auth.user.role_id == 3">
                            <Link
                                :href="route('UserDashboard')"
                                class="relative overflow-hidden group px-4 py-2 rounded-full transition-all duration-300"
                                :class="{
                                    'bg-gradient-to-r from-blue-500 to-green-600 opacity-100 scale-x-100 text-gray-900':
                                        route().current('UserDashboard'),
                                }"
                            >
                                <span
                                    class="relative z-10 transition-colors duration-300"
                                    :class="{
                                        'text-gray-900':
                                            route().current('UserDashboard'),
                                    }"
                                >
                                    Home
                                </span>
                                <span
                                    class="absolute inset-0 w-full h-full bg-gradient-to-r from-blue-500 to-green-600 opacity-0 group-hover:opacity-100 transform scale-x-0 group-hover:scale-x-100 transition-all duration-300 rounded-full"
                                    :class="{
                                        'opacity-100 scale-x-100':
                                            route().current('UserDashboard'),
                                    }"
                                ></span>
                            </Link>
                        </div>

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

        <!-- Page Heading -->
        <header class="bg-gray-800 shadow-lg" v-if="$slots.header">
            <div class="mx-auto max-w-7xl px-4 py-1 sm:px-6 lg:px-8">
                <slot name="header" />
            </div>
        </header>

        <!-- Page Content -->
        <main class="mt-16">
            <slot />
        </main>
    </div>
</template>
