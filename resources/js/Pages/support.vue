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
                        :href="route('landingPage')"
                        class="text-2xl font-bold tracking-tighter group"
                    >
                        <span
                            class="inline-block text-transparent bg-clip-text bg-gradient-to-r from-teal-300 to-blue-500 group-hover:from-blue-500 group-hover:to-purple-400 transition-all duration-300 transform hover:scale-105 hover:shadow-lg"
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
                                        class="inline-flex items-center text-white bg-transparent border border-transparent px-3 py-2 text-sm font-medium hover:text-purple-400 focus:outline-none"
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
                            v-if="
                                $page.props.auth?.user?.email ===
                                'salte@salte.com'
                            "
                            :href="route('CameraDashboard')"
                            class="text-white hover:text-purple-400"
                        >
                            Dashboard
                        </Link>
                        <Link
                            :href="route('home')"
                            class="block text-white hover:text-purple-400"
                            >Home</Link
                        >
                        <Link
                            :href="route('shop')"
                            class="block text-white hover:text-purple-400"
                            >Shop</Link
                        >
                        <Link
                            :href="route('myaccount')"
                            class="block text-white hover:text-purple-400"
                            >Account</Link
                        >
                        <Link
                            :href="route('support')"
                            class="block text-white hover:text-purple-400"
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
                                class="block mt-2 text-white hover:text-purple-400"
                            >
                                Profile
                            </Link>
                            <Link
                                :href="route('logout')"
                                method="post"
                                as="button"
                                class="block mt-2 text-white hover:text-purple-400"
                            >
                                Log Out
                            </Link>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- Main content -->
        <main class="container mx-auto px-4 pt-24 pb-12">
            <h2 class="text-4xl font-bold mb-8 text-center">Support</h2>

            <!-- How to Rent Section -->
            <section class="mb-12 bg-gray-950 rounded-lg p-6 shadow-lg">
                <h3 class="text-2xl font-semibold mb-4 text-green-400">
                    How to Rent
                </h3>
                <ol class="list-decimal list-inside space-y-2 text-gray-300">
                    <li>
                        Browse our collection of cameras and equipment on the
                        <Link
                            :href="route('shop')"
                            class="text-blue-400 hover:underline"
                            >Shop</Link
                        >
                        page.
                    </li>
                    <li>
                        Select the item you'd like to rent, and click "Rent
                        Now".
                    </li>
                    <li>
                        Once you're ready, proceed to checkout and log in to
                        your account.
                    </li>
                    <li>
                        Choose your Start Rental and End Rental period, and
                        complete the payment process.
                    </li>
                    <li>
                        You'll receive an email confirmation with pick-up
                        instructions or delivery options.
                    </li>
                </ol>
            </section>

            <!-- Book an Equipment Test Section -->
            <section class="mb-12 bg-gray-950 rounded-lg p-6 shadow-lg">
                <h3 class="text-2xl font-semibold mb-4 text-green-400">
                    Book an Equipment Test
                </h3>
                <p class="text-gray-300 mb-4">
                    If you'd like to test the equipment before renting, you can
                    book an in-store test. Please note that tests are subject to
                    availability.
                </p>
            </section>

            <!-- Terms and Conditions Section -->
            <section class="mb-12 bg-gray-950 rounded-lg p-6 shadow-lg">
                <h3 class="text-2xl font-semibold mb-4 text-green-400">
                    Terms and Conditions
                </h3>
                <ul class="list-disc list-inside space-y-2 text-gray-300">
                    <li>
                        Rentals are subject to availability and must be
                        confirmed through a completed booking.
                    </li>
                    <li>
                        Rental periods are charged on a daily basis. Late
                        returns will incur additional fees.
                    </li>
                    <li>
                        Damage to equipment during the rental period is the
                        responsibility of the renter.
                    </li>
                    <li>
                        Cancellation of rentals must be made at least 24 hours
                        in advance to avoid a cancellation fee.
                    </li>
                </ul>
                <Link
                    :href="route('aboutus')"
                    class="text-blue-400 hover:underline mt-4 inline-block"
                >
                    View Full Terms and Conditions
                </Link>
            </section>

            <!-- Privacy Policy Section -->
            <section class="mb-12 bg-gray-950 rounded-lg p-6 shadow-lg">
                <h3 class="text-2xl font-semibold mb-4 text-green-400">
                    Privacy Policy
                </h3>
                <p class="text-gray-300">
                    We value your privacy. All personal information collected
                    during the rental process will be handled in accordance with
                    our privacy policy.
                </p>
                <Link
                    :href="route('aboutus')"
                    class="text-blue-400 hover:underline mt-4 inline-block"
                >
                    View Privacy Policy
                </Link>
            </section>

            <!-- Contact Us Section -->
            <section class="bg-gray-950 rounded-lg p-6 shadow-lg">
                <h3 class="text-2xl font-semibold mb-4 text-green-400">
                    Contact Us
                </h3>
                <form @submit.prevent="submitContactForm" class="space-y-4">
                    <div>
                        <label
                            for="name"
                            class="block text-lg font-medium text-gray-300"
                            >Name</label
                        >
                        <input
                            v-model="form.name"
                            type="text"
                            id="name"
                            class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm p-2 text-white"
                            required
                        />
                        <span
                            v-if="form.errors.name"
                            class="text-red-500 text-sm"
                            >{{ form.errors.name }}</span
                        >
                    </div>

                    <div>
                        <label
                            for="email"
                            class="block text-lg font-medium text-gray-300"
                            >Email</label
                        >
                        <input
                            v-model="form.email"
                            type="email"
                            id="email"
                            class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm p-2 text-white"
                            required
                        />
                        <span
                            v-if="form.errors.email"
                            class="text-red-500 text-sm"
                            >{{ form.errors.email }}</span
                        >
                    </div>

                    <div>
                        <label
                            for="message"
                            class="block text-lg font-medium text-gray-300"
                            >Message</label
                        >
                        <textarea
                            v-model="form.message"
                            id="message"
                            rows="4"
                            class="mt-1 block w-full bg-gray-700 border border-gray-600 rounded-md shadow-sm p-2 text-white"
                            required
                        ></textarea>
                        <span
                            v-if="form.errors.message"
                            class="text-red-500 text-sm"
                            >{{ form.errors.message }}</span
                        >
                    </div>

                    <button
                        type="submit"
                        class="bg-green-600 text-white py-3 px-6 rounded-lg hover:bg-purple-700 transition duration-300"
                        :disabled="form.processing"
                    >
                        Send Message
                    </button>
                </form>
            </section>
        </main>

        <footer class="bg-gray-950 py-4">
            <div class="container mx-auto px-4 text-center text-gray-400">
                <p>
                    &copy; {{ new Date().getFullYear() }} ZoomPro. All rights
                    reserved.
                </p>
            </div>
        </footer>
    </div>
</template>

<script setup>
import { ref } from "vue";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/vue3";

import { useForm } from "@inertiajs/vue3";

const showingNavigationDropdown = ref(false);

const form = useForm({
    name: "",
    email: "",
    message: "",
});

const submitContactForm = () => {
    form.post(route("support.send-email"), {
        onSuccess: () => {
            alert("Your message has been sent successfully!");
            form.reset();
        },
        onError: (errors) => {
            console.error(errors);
            alert("Failed to send your message. Please try again.");
        },
    });
};
</script>
