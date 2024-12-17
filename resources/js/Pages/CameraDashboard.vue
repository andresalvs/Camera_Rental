<template>
    <div
        class="min-h-screen bg-gradient-to-br from-gray-900 via-teal-950 to-gray-900 text-white"
    >
          <!-- Navigation -->
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

<!--End of Navigation -->

        <!-- Sub Navigation -->

        <!-- Content -->
        <main class="container mx-auto py-8 px-4">
            
            <div class="mb-8 bg-gray-800 rounded-lg shadow-lg p-6">
                <h2 class="text-3xl font-bold mb-8 text-center text-white ">Payments</h2>
                <div class="grid grid-cols-3 gap-4 text-center ">
                    <div class="bg-red-900 rounded-lg p-4 transition-all duration-300 transform hover:scale-105 hover:shadow-lg ">
                        <p class="text-2xl font-bold">{{ rejected }}</p>
                        <p class="text-sm text-gray-300">Rejected</p>
                    </div>
                    <div class="bg-sky-900 rounded-lg p-4 transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                        <p class="text-2xl font-bold">{{ pending }}</p>
                        <p class="text-sm text-gray-300">Pending</p>
                    </div>
                    <div class="bg-green-900 rounded-lg p-4 transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                        <p class="text-2xl font-bold">{{ accepted }}</p>
                        <p class="text-sm text-gray-300">Accepted</p>
                    </div>
                </div>
            </div>
           
      
            <h2 class="text-3xl font-bold mb-8 text-center text-white ">Manage Cameras</h2>

            <!-- Add Camera Form -->
            <div class="mb-12 bg-gray-800 rounded-lg shadow-lg p-6 transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
               
                    <h3 class="text-xl font-semibold mb-4">Add New Camera</h3>
                
                
                <form
                    @submit.prevent="submitCamera"
                    class="grid gap-4 md:grid-cols-2 lg:grid-cols-4"
                >
                    <div>
                        <label
                            for="camera_name"
                            class="block mb-1 text-sm font-medium"
                            >Name</label
                        >
                        <input
                            v-model="form.camera_name"
                            type="text"
                            id="camera_name"
                            class="w-full rounded-lg bg-gray-700 text-white px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                        />
                    </div>
                    <div>
                        <label
                            for="camera_price"
                            class="block mb-1 text-sm font-medium"
                            >Price ($)</label
                        >
                        <input
                            v-model="form.camera_price"
                            type="number"
                            id="camera_price"
                            class="w-full rounded-lg bg-gray-700 text-white px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                        />
                    </div>
                    <div>
                        <label
                            for="camera_category"
                            class="block mb-1 text-sm font-medium"
                            >Category</label
                        >
                        <input
                            v-model="form.camera_category"
                            type="text"
                            id="camera_category"
                            class="w-full rounded-lg bg-gray-700 text-white px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                        />
                    </div>
                    <div>
                        <label
                            for="camera_image"
                            class="block mb-1 text-sm font-medium"
                            >Image</label
                        >
                        <input
                            @change="handleFileUpload"
                            type="file"
                            id="camera_image"
                            class="w-full rounded-lg bg-gray-700 text-white px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                        />
                    </div>
                    <div class="flex items-end">
                        <button
                            type="submit"
                            class="w-full bg-teal-600 hover:bg-teal-900 text-white px-6 py-2 rounded-lg transition-colors duration-200"
                        >
                            Add Camera
                        </button>
                    </div>
                </form>
            </div>

            <!-- Camera Table -->
            <div class="overflow-x-auto bg-gray-800 rounded-lg shadow-lg">
                <table class="w-full">
                    <thead>
                        <tr class="bg-teal-800 text-left">
                            <th class="px-6 py-3 text-sm font-semibold">
                                Image
                            </th>
                            <th class="px-6 py-3 text-sm font-semibold">
                                Camera Name
                            </th>
                            <th class="px-6 py-3 text-sm font-semibold">
                                Category
                            </th>
                            <th class="px-6 py-3 text-sm font-semibold">
                                Price ($)
                            </th>
                            <th class="px-6 py-3 text-sm font-semibold">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="camera in cameras"
                            :key="camera.camera_id"
                            class="border-b border-gray-700 hover:bg-gray-700 transition-colors duration-200"
                        >
                            <td class="px-6 py-4">
                                <img
                                    v-if="camera.camera_image"
                                    :src="`/storage/${camera.camera_image}`"
                                    alt="Camera Image"
                                    class="w-16 h-16 object-cover rounded-lg"
                                />
                            </td>
                            <td class="px-6 py-4">{{ camera.camera_name }}</td>
                            <td class="px-6 py-4">
                                {{ camera.camera_category }}
                            </td>
                            <td class="px-6 py-4">
                                <input
                                    type="number"
                                    v-model="camera.camera_price"
                                    class="w-24 rounded-lg bg-gray-600 text-white text-center px-2 py-1 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                                />
                            </td>
                            <td class="px-6 py-4">
                                <button
                                    @click="openModal(camera)"
                                    class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded-lg mr-2 transition-colors duration-200"
                                >
                                    Update
                                </button>
                                <button
                                    @click="deleteCamera(camera.camera_id)"
                                    class="bg-red-600 hover:bg-red-500 text-white px-4 py-2 rounded-lg transition-colors duration-200"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- Update Modal -->

                <!-- Update Modal -->
                <div
                    v-if="isModalOpen"
                    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
                >
                    <div
                        class="bg-gray-800 rounded-lg shadow-lg p-6 w-full max-w-lg"
                    >
                        <h2 class="text-lg font-semibold text-white mb-4">
                            Update Camera
                        </h2>

                        <!-- Form -->
                        <div class="space-y-4">
                            <div>
                                <label
                                    for="modal_camera_name"
                                    class="block text-sm text-gray-400"
                                    >Camera Name</label
                                >
                                <input
                                    type="text"
                                    id="modal_camera_name"
                                    v-model="currentCamera.camera_name"
                                    class="w-full rounded-lg bg-gray-700 text-white px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                                />
                            </div>
                            <div>
                                <label
                                    for="modal_camera_price"
                                    class="block text-sm text-gray-400"
                                    >Price</label
                                >
                                <input
                                    type="number"
                                    id="modal_camera_price"
                                    v-model="currentCamera.camera_price"
                                    class="w-full rounded-lg bg-gray-700 text-white px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                                />
                            </div>
                            <div>
                                <label
                                    for="modal_camera_category"
                                    class="block text-sm text-gray-400"
                                    >Category</label
                                >
                                <input
                                    type="text"
                                    id="modal_camera_category"
                                    v-model="currentCamera.camera_category"
                                    class="w-full rounded-lg bg-gray-700 text-white px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                                />
                            </div>
                            <div>
                                <label
                                    for="modal_camera_image"
                                    class="block text-sm text-gray-400"
                                    >Image</label
                                >
                                <input
                                    type="file"
                                    id="modal_camera_image"
                                    @change="handleModalFileUpload"
                                    class="w-full rounded-lg bg-gray-700 text-white px-4 py-2 focus:ring-2 focus:ring-teal-500 focus:outline-none"
                                />
                                <!-- Show Current Image -->
                                <div class="mt-2">
                                    <img
                                        v-if="currentCamera.camera_image"
                                        :src="`/storage/${currentCamera.camera_image}`"
                                        alt="Camera Image"
                                        class="w-16 h-16 object-cover rounded-lg"
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-end mt-6 space-x-4">
                            <button
                                @click="closeModal"
                                class="bg-gray-600 hover:bg-gray-500 text-white px-4 py-2 rounded-lg transition-colors duration-200"
                            >
                                Cancel
                            </button>
                            <button
                                @click="saveCamera"
                                class="bg-teal-600 hover:bg-teal-500 text-white px-4 py-2 rounded-lg transition-colors duration-200"
                            >
                                Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import { ref, reactive } from "vue";
import { router, Link } from "@inertiajs/vue3";
import { ChevronDownIcon, MenuIcon, XIcon } from "lucide-vue-next";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";

const props = defineProps({
    cameras: Array,
    rejected: Number,
    pending: Number,
    accepted: Number,
});

const showingNavigationDropdown = ref(false);
const isModalOpen = ref(false);
const currentCamera = reactive({
    camera_id: null,
    camera_name: "",
    camera_price: "",
    camera_category: "",
    camera_image: null,
});

const form = reactive({
    camera_name: "",
    camera_price: "",
    camera_category: "",
    camera_image: null,
});

const selectedFile = ref(null);

const openModal = (camera) => {
    isModalOpen.value = true;
    Object.assign(currentCamera, camera);
};

const closeModal = () => {
    isModalOpen.value = false;
};

const handleFileUpload = (event) => {
    form.camera_image = event.target.files[0];
};

const handleModalFileUpload = (event) => {
    currentCamera.camera_image = event.target.files[0];
};

const saveCamera = () => {
    const formData = new FormData();
    formData.append("camera_name", currentCamera.camera_name);
    formData.append("camera_price", currentCamera.camera_price);
    formData.append("camera_category", currentCamera.camera_category);
    if (currentCamera.camera_image instanceof File) {
        formData.append("camera_image", currentCamera.camera_image);
    }

    router.post(route("cameras.update", currentCamera.camera_id), formData, {
        headers: { "Content-Type": "multipart/form-data" },
        preserveState: false,
        preserveScroll: true,
        onSuccess: () => {
            closeModal();
            alert("Camera updated successfully!");
        },
    });
};

const submitCamera = () => {
    const formData = new FormData();
    formData.append("camera_name", form.camera_name);
    formData.append("camera_price", form.camera_price);
    formData.append("camera_category", form.camera_category);
    if (form.camera_image) {
        formData.append("camera_image", form.camera_image);
    }

    router.post(route("cameras.store"), formData, {
        headers: { "Content-Type": "multipart/form-data" },
        preserveState: false,
        preserveScroll: true,
        onSuccess: () => {
            form.camera_name = "";
            form.camera_price = "";
            form.camera_category = "";
            form.camera_image = null;
        },
    });
};

const deleteCamera = (cameraId) => {
    if (confirm("Are you sure you want to delete this camera?")) {
        router.delete(route("cameras.destroy", cameraId));
    }
};
</script>
