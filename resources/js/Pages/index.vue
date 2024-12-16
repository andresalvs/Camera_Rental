<template>
    <div
        class="min-h-screen bg-gradient-to-r from-gray-900 via-teal-950 to-gray-900 text-white"
    >
        <header class="bg-gray-800 shadow-md">
            <div class="container mx-auto px-4 py-3">
                <div class="flex justify-between items-center">
                    <Link
                        :href="route('home')"
                        class="text-2xl font-bold tracking-tighter group"
                    >
                        <span
                            class="inline-block text-transparent bg-clip-text bg-gradient-to-r from-purple-300 to-blue-500 group-hover:from-blue-500 group-hover:to-purple-400 transition-all duration-300 transform hover:scale-105"
                        >
                            ZoomPro
                        </span>
                    </Link>

                    <div class="flex items-center">
                        <Dropdown align="right" width="48">
                            <template #trigger>
                                <button
                                    class="inline-flex items-center text-white hover:text-blue-400 transition-colors duration-200 focus:outline-none"
                                >
                                    {{ $page.props.auth.user.name }}
                                    <ChevronDownIcon class="ml-2 h-4 w-4" />
                                </button>
                            </template>

                            <template #content>
                                <DropdownLink :href="route('profile.edit')"
                                    >Profile</DropdownLink
                                >
                                <DropdownLink
                                    :href="route('logout')"
                                    method="post"
                                    as="button"
                                    >Log Out</DropdownLink
                                >
                            </template>
                        </Dropdown>

                        <button
                            @click="
                                showingNavigationDropdown =
                                    !showingNavigationDropdown
                            "
                            class="ml-4 md:hidden text-white focus:outline-none"
                        >
                            <MenuIcon
                                v-if="!showingNavigationDropdown"
                                class="h-6 w-6"
                            />
                            <XIcon v-else class="h-6 w-6" />
                        </button>
                    </div>
                </div>

                <div
                    v-show="showingNavigationDropdown"
                    class="md:hidden mt-4 bg-gray-700 rounded-lg shadow-md"
                >
                    <nav class="space-y-2 p-4">
                        <div class="text-white">
                            <p class="font-semibold">
                                {{ $page.props.auth.user.name }}
                            </p>
                            <p class="text-sm text-gray-400">
                                {{ $page.props.auth.user.email }}
                            </p>
                        </div>
                        <Link
                            :href="route('profile.edit')"
                            class="block text-white hover:text-blue-400 transition-colors duration-200"
                        >
                            Profile
                        </Link>
                        <Link
                            :href="route('logout')"
                            method="post"
                            as="button"
                            class="block w-full text-left text-white hover:text-blue-400 transition-colors duration-200"
                        >
                            Log Out
                        </Link>
                    </nav>
                </div>
            </div>
        </header>

        <main class="container mx-auto mt-16 px-4">
            <h1 class="text-3xl font-bold mb-6">Payments</h1>

            <h2 class="text-2xl font-bold mb-4">All Payments</h2>
            <div
                v-if="payments.length"
                class="bg-gray-800 rounded-lg shadow-lg overflow-hidden"
            >
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-700">
                            <tr>
                                <th
                                    v-for="header in paymentHeaders"
                                    :key="header"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider"
                                >
                                    {{ header }}
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-800 divide-y divide-gray-700">
                            <tr
                                v-for="payment in payments"
                                :key="payment.id"
                                class="hover:bg-gray-700 transition-colors duration-200"
                            >
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    {{ payment.user.name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    {{ payment.camera_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    ${{ payment.camera_price }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    {{ payment.days_rent }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    ${{ payment.total_price }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span
                                        :class="getStatusClass(payment.status)"
                                    >
                                        {{ payment.status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <div
                                        v-if="payment.status === 'pending'"
                                        class="space-x-2"
                                    >
                                        <button
                                            @click="
                                                updateStatus(
                                                    payment.id,
                                                    'accept'
                                                )
                                            "
                                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded transition-colors duration-200"
                                        >
                                            Accept
                                        </button>
                                        <button
                                            @click="
                                                updateStatus(
                                                    payment.id,
                                                    'reject'
                                                )
                                            "
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition-colors duration-200"
                                        >
                                            Reject
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <p v-else class="text-center text-gray-400 mt-4">
                No payments found.
            </p>
        </main>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
import { ChevronDownIcon, MenuIcon, XIcon } from "lucide-vue-next";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    pendingRentals: {
        type: Array,
        required: true,
    },
    payments: {
        type: Array,
        required: true,
    },
});

const showingNavigationDropdown = ref(false);

const pendingRentalHeaders = [
    "User ID",
    "User Name",
    "Camera Name",
    "Total Price",
];
const paymentHeaders = [
    "User",
    "Camera Name",
    "Price",
    "Days",
    "Total Price",
    "Status",
    "Actions",
];

const getStatusClass = (status) => {
    const baseClasses =
        "px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full";
    switch (status) {
        case "pending":
            return `${baseClasses} bg-yellow-500 text-white`;
        case "accept":
            return `${baseClasses} bg-green-500 text-white`;
        case "reject":
            return `${baseClasses} bg-red-500 text-white`;
        default:
            return `${baseClasses} bg-gray-500 text-white`;
    }
};

const updateStatus = (id, status) => {
    if (confirm(`Are you sure you want to change the status to "${status}"?`)) {
        Inertia.patch(
            `/payments/${id}/status`,
            { status },
            {
                preserveState: true,
                preserveScroll: true,
                onSuccess: () => {
                    // Update the status in the payments array
                    const payment = props.payments.find(
                        (payment) => payment.id === id
                    );
                    if (payment) {
                        payment.status = status;
                    }
                },
            }
        );
    }
};
</script>
