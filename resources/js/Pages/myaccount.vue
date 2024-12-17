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
                            >
                            </span>
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
                                        class="inline-flex items-center text-white bg-transparent border border-transparent px-3 py-2 text-sm font-medium hover:text-green-400 focus:outline-none"
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

        <!-- Account Page Content -->
        <main class="container mx-auto px-4 pt-24 pb-12">
            <h2 class="text-4xl font-bold mb-8 text-center">My Account</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Account Details Section -->
                <div class="bg-gray-950 rounded-lg shadow-lg p-6">
                    <h3 class="text-2xl font-semibold mb-4 text-teal-400">
                        Account Details
                    </h3>
                    <div class="space-y-2">
                        <p class="text-gray-300">
                            <span class="font-semibold">Name:</span>
                            {{ $page.props.auth.user.name }}
                        </p>
                        <p class="text-gray-300">
                            <span class="font-semibold">Email:</span>
                            {{ $page.props.auth.user.email }}
                        </p>
                        <p class="text-gray-300">
                            <span class="font-semibold"
                                >Membership Status:</span
                            >
                            <span class="text-green-400 font-semibold"
                                > Active</span
                            >
                        </p>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4 mt-8 text-teal-400">
                        Settings
                    </h3>
                    <Link
                        :href="route('profile.edit')"
                        class="inline-flex items-center px-4 py-2 bg-teal-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-500 active:bg-teal-700 focus:outline-none focus:border-teal-700 focus:ring focus:ring-teal-300 disabled:opacity-25 transition ease-in-out duration-150"
                    >
                        <UserIcon class="w-4 h-4 mr-2" />
                        Profile Settings
                    </Link>
                </div>

                <!-- Cameras Rented Section -->
                <div class="bg-gray-950 rounded-lg shadow-lg p-6">
                    <h3 class="text-2xl font-semibold mb-4 text-center text-teal-400">
                        Cameras Rented
                    </h3>
                    <div
                        class="overflow-x-auto max-h-96 scrollbar-thin scrollbar-thumb-teal-600 scrollbar-track-teal-800"
                    >
                        <table class="min-w-full divide-y divide-teal-700">
                            <thead class="bg-teal-700">
                                <tr>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider"
                                    >
                                        Camera Name
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider"
                                    >
                                        Category
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider"
                                    >
                                        Price
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider"
                                    >
                                        Total Price
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider"
                                    >
                                        Status
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider"
                                    >
                                        Rent Date
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider"
                                    >
                                        Return Date
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-teal-900 divide-y divide-gray-700">
                                <tr
                                    v-for="item in rentedItems"
                                    :key="item.id"
                                    class="hover:bg-gray-700 transition-colors duration-200"
                                >
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-300"
                                    >
                                        {{ item.camera_name }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-300"
                                    >
                                        {{ item.camera_category }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-300"
                                    >
                                        ${{ item.camera_price }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-300"
                                    >
                                        ${{ item.total_price }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm"
                                    >
                                        <span
                                            :class="{
                                                'px-2 inline-flex text-xs leading-5 font-semibold rounded-full': true,
                                                'bg-green-100 text-green-800':
                                                    item.status === 'Active',
                                                'bg-red-100 text-red-800':
                                                    item.status === 'Overdue',
                                                'bg-yellow-100 text-yellow-800':
                                                    item.status === 'Pending',
                                            }"
                                        >
                                            {{ item.status }}
                                        </span>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-300"
                                    >
                                        {{ item.rent_date }}
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-300"
                                    >
                                        {{ item.return_date }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

        <!-- Modals -->
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
import { UserIcon } from "lucide-vue-next";

const showingNavigationDropdown = ref(false);
</script>

<script>
import { ref, reactive, onMounted } from "vue";

export default {
    props: {
        rentedItems: Array, // Passed from the backend
    },
    setup() {
        const mobileMenuOpen = ref(false);
        const currentModal = ref(null);
        const cancelIndex = ref(null);

        const userAccount = reactive({
            name: "",
            email: "",
            membershipStatus: "Active",
        });

        const editedAccount = reactive({
            name: "",
            email: "",
        });

        const rentedCameras = ref([]);

        const selectedPaymentMethod = ref("paypal");
        const paypalEmail = ref("");
        const bankAccountNumber = ref("");
        const routingNumber = ref("");
        const creditCardNumber = ref("");
        const expirationDate = ref("");
        const cvv = ref("");

        const notificationPreferences = reactive({
            returnReminder: true,
            paymentDue: true,
            paymentConfirmation: true,
        });

        const loadFromStorage = () => {
            const storedAccount = JSON.parse(
                localStorage.getItem("userAccount")
            );
            if (storedAccount) {
                Object.assign(userAccount, storedAccount);
                Object.assign(editedAccount, storedAccount);
            }

            const storedCameras = JSON.parse(
                localStorage.getItem("rentedCameras")
            );
            if (storedCameras) {
                rentedCameras.value = storedCameras;
            }

            const storedPreferences = JSON.parse(
                localStorage.getItem("notificationPreferences")
            );
            if (storedPreferences) {
                Object.assign(notificationPreferences, storedPreferences);
            }
        };

        const saveToStorage = () => {
            localStorage.setItem("userAccount", JSON.stringify(userAccount));
            localStorage.setItem(
                "rentedCameras",
                JSON.stringify(rentedCameras.value)
            );
            localStorage.setItem(
                "notificationPreferences",
                JSON.stringify(notificationPreferences)
            );
        };

        const toggleMobileMenu = () => {
            mobileMenuOpen.value = !mobileMenuOpen.value;
        };

        const openModal = (modalType) => {
            currentModal.value = modalType;
        };

        const closeModal = () => {
            currentModal.value = null;
            cancelIndex.value = null;
        };

        const saveAccountDetails = () => {
            Object.assign(userAccount, editedAccount);
            saveToStorage();
            closeModal();
        };

        const savePaymentSettings = () => {
            console.log("Saving payment settings:", {
                method: selectedPaymentMethod.value,
                paypalEmail: paypalEmail.value,
                bankAccountNumber: bankAccountNumber.value,
                routingNumber: routingNumber.value,
                creditCardNumber: creditCardNumber.value,
                expirationDate: expirationDate.value,
                cvv: cvv.value,
            });
            closeModal();
        };

        const saveNotificationPreferences = () => {
            saveToStorage();
            closeModal();
        };

        const openCancelModal = (index) => {
            cancelIndex.value = index;
            currentModal.value = "cancelRental";
        };

        const confirmCancelRental = () => {
            if (cancelIndex.value !== null) {
                rentedCameras.value.splice(cancelIndex.value, 1);
                saveToStorage();
                closeModal();
            }
        };

        onMounted(() => {
            loadFromStorage();
        });

        return {
            mobileMenuOpen,
            currentModal,
            userAccount,
            editedAccount,
            rentedCameras,
            selectedPaymentMethod,
            paypalEmail,
            bankAccountNumber,
            routingNumber,
            creditCardNumber,
            expirationDate,
            cvv,
            notificationPreferences,
            toggleMobileMenu,
            openModal,
            closeModal,
            saveAccountDetails,
            savePaymentSettings,
            saveNotificationPreferences,
            openCancelModal,
            confirmCancelRental,
        };
    },
};
</script>

<style scoped>
.scrollbar-thin::-webkit-scrollbar {
    width: 6px;
    height: 6px;
}
.scrollbar-thin::-webkit-scrollbar-track {
    border-radius: 100vh;
    background: #1f2937;
}
.scrollbar-thin::-webkit-scrollbar-thumb {
    background: #4b5563;
    border-radius: 100vh;
}
.scrollbar-thin::-webkit-scrollbar-thumb:hover {
    background: #374151;
}
</style>
