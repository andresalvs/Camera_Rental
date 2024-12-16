<template>


    
    <div class="container mx-auto py-12">
        <h1 class="text-4xl font-bold text-center mb-8">Admin Dashboard</h1>

        <table class="w-full border-collapse border border-gray-800">
            <thead>
                <tr class="bg-gray-700 text-white">
                    <th class="border border-gray-800 px-4 py-2">
                        Camera Name
                    </th>
                    <th class="border border-gray-800 px-4 py-2">Category</th>
                    <th class="border border-gray-800 px-4 py-2">Price</th>
                    <th class="border border-gray-800 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="camera in cameras"
                    :key="camera.camera_id"
                    class="text-center bg-gray-800 text-white"
                >
                    <td class="border border-gray-800 px-4 py-2">
                        {{ camera.camera_name }}
                    </td>
                    <td class="border border-gray-800 px-4 py-2">
                        {{ camera.camera_category }}
                    </td>
                    <td class="border border-gray-800 px-4 py-2">
                        <input
                            type="number"
                            v-model="camera.camera_price"
                            class="text-black w-20 px-2"
                        />
                    </td>
                    <td class="border border-gray-800 px-4 py-2">
                        <button
                            @click="updateCameraPrice(camera)"
                            class="bg-purple-600 hover:bg-orange-500 text-white font-bold py-2 px-4 rounded"
                        >
                            Update
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";

// Fetch props passed from backend
const { cameras } = usePage().props.value;

// Function to update camera price
const updateCameraPrice = (camera) => {
    Inertia.post("/dashboard/cameras/update", {
        camera_id: camera.camera_id,
        camera_price: camera.camera_price,
    });
};
</script>

<style>
@import "tailwindcss/base";
@import "tailwindcss/components";
@import "tailwindcss/utilities";
</style>
