<template>
    <div
        class="min-h-screen bg-gradient-to-br from-gray-900 via-teal-950 to-gray-900 text-white"
    >
        <!-- Header Section -->
        <header class="bg-gray-900 shadow-lg">
            <div class="container mx-auto px-4 py-4">
                <div class="flex justify-between items-center">
                    <div
                        class="text-2xl font-bold tracking-tighter"
                    >
                        <span
                        class="inline-block text-transparent bg-clip-text bg-gradient-to-r from-teal-300 to-blue-500 group-hover:from-blue-500 group-hover:to-purple-400 transition-all duration-300 transform hover:scale-105 hover:shadow-lg"
                        >
                            ZoomPro
                        </span>
                    </div>

                    <!-- Desktop -->

                    <div class="flex items-center space-x-4">
                <nav class="hidden md:block">
                    <Link
                        :href="route('UserDashboard')"
                        :class="[
                            'text-white transition-colors duration-200 mr-4 px-3 py-2 rounded-full',
                            $page.component === 'UserDashboard'
                                ? 'bg-gradient-to-r from-green-400 to-blue-500'
                                : 'hover:bg-gradient-to-r hover:from-green-400 hover:to-blue-500'
                        ]"
                    >
                        User Management
                    </Link>
                    <Link
                        :href="route('CameraDashboard')"
                        :class="[
                            'text-white transition-colors duration-200 mr-4 px-3 py-2 rounded-full',
                            $page.component === 'CameraDashboard'
                                ? 'bg-gradient-to-r from-green-400 to-blue-500'
                                : 'hover:bg-gradient-to-r hover:from-green-400 hover:to-blue-500'
                        ]"
                    >
                        Camera Management
                    </Link>
                    <Link
                        :href="route('rentals-summary.index')"
                        :class="[
                            'text-white transition-colors duration-200 mr-4 px-3 py-2 rounded-full',
                            $page.component === 'RentalsSummary'
                                ? 'bg-gradient-to-r from-green-400 to-blue-500'
                                : 'hover:bg-gradient-to-r hover:from-green-400 hover:to-blue-500'
                        ]"
                    >
                        Summary
                    </Link>
                    <Link
                        :href="route('activity-logs.index')"
                        :class="[
                            'text-white transition-colors duration-200 mr-4 px-3 py-2 rounded-full',
                            $page.component === 'ActivityLogs'
                                ? 'bg-gradient-to-r from-green-400 to-blue-500'
                                : 'hover:bg-gradient-to-r hover:from-green-400 hover:to-blue-500'
                        ]"
                    >
                        Activity Logs
                    </Link>
                </nav>
                <!-- Settings Dropdown -->
                <Dropdown align="right" width="48">
                    <template #trigger>
                        <button class="flex items-center text-white hover:text-teal-400 transition-colors duration-200">
                            <span>{{ $page.props.auth.user.name }}</span>
                            <ChevronDownIcon class="ml-2 h-4 w-4" />
                        </button>
                    </template>

                    <template #content>
                        <DropdownLink :href="route('profile.edit')">Profile</DropdownLink>
                        <DropdownLink :href="route('logout')" method="post" as="button">Log Out</DropdownLink>
                    </template>
                </Dropdown>

                <!-- Mobile Menu Button -->
                <button
                    @click="showingNavigationDropdown = !showingNavigationDropdown"
                    class="md:hidden text-white focus:outline-none"
                >
                    <MenuIcon v-if="!showingNavigationDropdown" class="h-6 w-6" />
                    <XIcon v-else class="h-6 w-6" />
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div v-show="showingNavigationDropdown" class="md:hidden mt-4">
            <nav class="space-y-2">
                <Link
                    :href="route('UserDashboard')"
                    :class="[
                        'block py-2 px-3 rounded-full text-white transition-colors duration-200',
                        $page.component === 'UserDashboard'
                            ? 'bg-gradient-to-r from-green-400 to-blue-500'
                            : 'hover:bg-gradient-to-r hover:from-green-400 hover:to-blue-500'
                    ]"
                >
                    User Management
                </Link>
                <Link
                    :href="route('CameraDashboard')"
                    :class="[
                        'block py-2 px-3 rounded-full text-white transition-colors duration-200',
                        $page.component === 'CameraDashboard'
                            ? 'bg-gradient-to-r from-green-400 to-blue-500'
                            : 'hover:bg-gradient-to-r hover:from-green-400 hover:to-blue-500'
                    ]"
                >
                    Camera Management
                </Link>
                <Link
                    :href="route('rentals-summary.index')"
                    :class="[
                        'block py-2 px-3 rounded-full text-white transition-colors duration-200',
                        $page.component === 'RentalsSummary'
                            ? 'bg-gradient-to-r from-green-400 to-blue-500'
                            : 'hover:bg-gradient-to-r hover:from-green-400 hover:to-blue-500'
                    ]"
                >
                    Summary
                </Link>
                <Link
                    :href="route('activity-logs.index')"
                    :class="[
                        'block py-2 px-3 rounded-full text-white transition-colors duration-200',
                        $page.component === 'ActivityLogs'
                            ? 'bg-gradient-to-r from-green-400 to-blue-500'
                            : 'hover:bg-gradient-to-r hover:from-green-400 hover:to-blue-500'
                    ]"
                >
                    Activity Logs
                </Link>
            </nav>
        </div>
    </div>
</header>


        <!-- Main Content -->
        <main class="container mx-auto py-8 px-4">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">
                    Activity Logs
                </h1>
                <p class="text-gray-400">
                    Track all system activities and changes
                </p>
            </div>

            <!-- Filter Dropdown -->
            <div class="mb-4">
                <label for="actionFilter" class="text-gray-300 mr-2"
                    >Filter by Action:</label
                >
                <select
                    id="actionFilter"
                    v-model="selectedAction"
                    @change="applyFilter"
                    class="p-2 bg-gray-800 text-white rounded-md"
                >
                    <option value="">All</option>
                    <option value="INSERT">INSERT</option>
                    <option value="UPDATE">UPDATE</option>
                    <option value="DELETE">DELETE</option>
                </select>
            </div>

            <!-- Table -->
            <div
                class="bg-white/10 backdrop-blur-lg rounded-lg shadow-xl overflow-hidden"
            >
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left bg-white/5">
                                <th
                                    v-for="header in tableHeaders"
                                    :key="header"
                                    class="p-4 font-semibold text-gray-300"
                                >
                                    {{ header }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="log in filteredLogs"
                                :key="log.log_id"
                                class="border-t border-white/10 hover:bg-white/5 transition-colors duration-200"
                            >
                                <td class="p-4">{{ log.log_id }}</td>
                                <td class="p-4">
                                    <span
                                        :class="getActionClass(log.action)"
                                        class="px-2 py-1 rounded-full text-xs font-medium"
                                    >
                                        {{ log.action }}
                                    </span>
                                </td>
                                <td class="p-4">{{ log.table_name }}</td>
                                <td class="p-4">
                                    {{ formatDate(log.changed_at) }}
                                </td>
                                <td class="p-4">
                                    <span
                                        :class="getUserTypeClass(log.user_type)"
                                        class="px-2 py-1 rounded-full text-xs font-medium"
                                    >
                                        {{ log.user_type }}
                                    </span>
                                </td>
                            </tr>
                            <tr v-if="filteredLogs.length === 0">
                                <td
                                    colspan="5"
                                    class="p-4 text-center text-gray-400"
                                >
                                    No logs found
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</template>
<script setup>
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";

import { ref, h, defineComponent } from "vue";
import { Link } from "@inertiajs/vue3";
import axios from "axios";

// Props from the server
const props = defineProps({
    activityLogs: Array,
});

// Reactive Data
const tableHeaders = [
    "Log ID",
    "Action",
    "Table Name",
    "Changed At",
    "User Type",
];
const selectedAction = ref("");
const filteredLogs = ref(props.activityLogs);

// Fetch filtered logs using Axios
const applyFilter = async () => {
    try {
        const response = await axios.get(route("activity-logs.index"), {
            params: { action: selectedAction.value },
        });
        filteredLogs.value = response.data.activityLogs;
    } catch (error) {
        console.error("Error fetching logs:", error);
    }
};

// Format the date
const formatDate = (date) => new Date(date).toLocaleString();

// Dynamic styles
const getActionClass = (action) => {
    const classes = {
        INSERT: "bg-green-500/20 text-green-300",
        UPDATE: "bg-blue-500/20 text-blue-300",
        DELETE: "bg-red-500/20 text-red-300",
    };
    return classes[action] || "bg-gray-500/20 text-gray-300";
};

const getUserTypeClass = (userType) => {
    const classes = {
        ADMIN: "bg-purple-500/20 text-purple-300",
        USER: "bg-yellow-500/20 text-yellow-300",
    };
    return classes[userType] || "bg-gray-500/20 text-gray-300";
};
</script>
