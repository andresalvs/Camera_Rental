<template>
    <div class="min-h-screen bg-gray-900 flex items-center justify-center">
        <!-- Camera Image -->
        <div class="md:w-1/2 relative order-2 md:order-1">
            <div
                class="absolute inset-0 bg-gradient-to-r from-green-500 to-purple-600 rounded-full filter blur-[100px] opacity-30 animate-pulse"
            ></div>
            <img
                src="/img/nikon-z-cam.png"
                alt="Nikon_zcam"
                class="w-full max-w-md mx-auto relative z-10 camera-slide"
                ref="cameraImage"
            />
        </div>

        <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-md">
            <Head title="Create Employee" />

            <div class="text-3xl font-bold text-center mb-6">
                <h1 class="text-purple-500">Create Employee</h1>
                <h2
                    class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600"
                >
                    ZoomPro
                </h2>
            </div>

            <form @submit.prevent="submit">
                <!-- Name Field -->
                <div class="mb-4">
                    <InputLabel
                        class="block text-gray-300 text-sm font-bold mb-2"
                        for="name"
                        value="Name"
                    />
                    <TextInput
                        class="w-full px-3 py-2 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                        id="name"
                        type="text"
                        v-model="form.name"
                        @input="validateName"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="Enter employee name"
                    />
                    <InputError class="mt-2" :message="errors.name" />
                </div>

                <!-- Email Field -->
                <div class="mb-4">
                    <InputLabel
                        class="block text-gray-300 text-sm font-bold mb-2"
                        for="email"
                        value="Email"
                    />
                    <TextInput
                        class="w-full px-3 py-2 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                        id="email"
                        type="email"
                        v-model="form.email"
                        @input="sanitizeEmail"
                        required
                        autocomplete="username"
                        placeholder="Enter employee email"
                    />
                    <InputError class="mt-2" :message="errors.email" />
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <InputLabel
                        class="block text-gray-300 text-sm font-bold mb-2"
                        for="password"
                        value="Password"
                    />
                    <TextInput
                        class="w-full px-3 py-2 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                        id="password"
                        type="password"
                        v-model="form.password"
                        @input="validatePassword"
                        required
                        autocomplete="new-password"
                        placeholder="Enter password"
                    />
                    <InputError class="mt-2" :message="errors.password" />
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-4">
                    <InputLabel
                        class="block text-gray-300 text-sm font-bold mb-2"
                        for="password_confirmation"
                        value="Confirm Password"
                    />
                    <TextInput
                        class="w-full px-3 py-2 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                        id="password_confirmation"
                        type="password"
                        v-model="form.password_confirmation"
                        @blur="validatePasswordConfirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Confirm password"
                    />
                    <InputError
                        class="mt-2"
                        :message="errors.password_confirmation"
                    />
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <PrimaryButton
                        class="w-full justify-center py-2 px-4 border border-transparent rounded-md text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-purple-600 hover:from-purple-600 hover:to-blue-700"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Create Employee
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import { useForm } from "@inertiajs/vue3";
import { Head } from "@inertiajs/vue3";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

export default {
    components: {
        Head,
        InputLabel,
        TextInput,
        InputError,
        PrimaryButton,
    },
    setup() {
        const form = useForm({
            name: "",
            email: "",
            password: "",
            password_confirmation: "",
            role_id: 2, // Fixed role_id for employees
        });

        const errors = {
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
        };

        // Real-time validation for name input
        const validateName = () => {
            const regex = /^[a-zA-Z\s]+$/;
            if (!regex.test(form.name)) {
                errors.name = "Name can only contain letters and spaces.";
            } else if (form.name.length < 3 || form.name.length > 50) {
                errors.name = "Name must be between 3 and 50 characters.";
            } else {
                errors.name = null;
            }
        };

        // Sanitize email input
        const sanitizeEmail = () => {
            form.email = form.email.replace(/</g, "&lt;").replace(/>/g, "&gt;");
        };

        // Password length validation
        const validatePassword = () => {
            if (form.password.length < 8 || form.password.length > 50) {
                errors.password =
                    "Password must be between 8 and 50 characters.";
            } else {
                errors.password = null;
            }
        };

        // Confirm Password Validation (on blur)
        const validatePasswordConfirmation = () => {
            if (form.password_confirmation !== form.password) {
                errors.password_confirmation = "Passwords do not match.";
                alert("Passwords do not match."); // Alert only after the user finishes typing
            } else {
                errors.password_confirmation = null;
            }
        };

        const submit = () => {
            // Run validation
            validateName();
            validatePassword();
            validatePasswordConfirmation();

            // Prevent submission if there are errors
            if (
                !errors.name &&
                !errors.email &&
                !errors.password &&
                !errors.password_confirmation
            ) {
                form.post("/admin/employees");
            }
        };

        return {
            form,
            errors,
            validateName,
            sanitizeEmail,
            validatePassword,
            validatePasswordConfirmation,
            submit,
        };
    },
};
</script>

<style scoped>
.camera-slide {
    animation: slide-in 1s ease-out;
}

@keyframes slide-in {
    0% {
        transform: translateX(-100%);
        opacity: 0;
    }
    100% {
        transform: translateX(0);
        opacity: 1;
    }
}
</style>
