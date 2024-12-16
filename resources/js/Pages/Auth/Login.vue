<script setup>
import Checkbox from "@/Components/Checkbox.vue";

import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

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
            <Head title="Log in" />

            <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
                {{ status }}
            </div>
            <div class="text-3xl font-bold text-center mb-6">
                <h1 class="text-purple-500">Login</h1>
                <h2
                    class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600"
                >
                    ZoomPro
                </h2>
            </div>
            <form @submit.prevent="submit">
                <div>
                    <InputLabel
                        class="block text-gray-300 text-sm font-bold mb-2"
                        for="email"
                        value="Email"
                    />

                    <TextInput
                        class="w-full px-3 py-2 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                        id="email"
                        placeholder="Enter your email"
                        type="email"
                        v-model="form.email"
                        required
                        autofocus
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel
                        class="block text-gray-300 text-sm font-bold mb-2"
                        for="password"
                        value="Password"
                    />

                    <TextInput
                        class="w-full px-3 py-2 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                        id="password"
                        placeholder="Enter your password"
                        type="password"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                    />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4 block">
                    <label class="flex items-center">
                        <Checkbox
                            name="remember"
                            v-model:checked="form.remember"
                        />
                        <span class="ms-2 text-sm text-gray-600"
                            >Remember me</span
                        >
                    </label>
                </div>

                <div class="mt-4 flex justify-center">
                    <a
                        :href="route('auth.google')"
                        class="flex items-center justify-center w-full py-2 px-4 border border-transparent rounded-md text-sm font-medium text-white bg-gradient-to-r from-blue-500 to-purple-600 hover:from-purple-600 hover:to-blue-700"
                    >
                        <svg
                            class="w-5 h-5 mr-2"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                        >
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.707 7.707a1 1 0 0 0-1.414-1.414L12 11.586 8.707 8.293a1 1 0 0 0-1.414 1.414L10.586 13H6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h4v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3h4a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1h-4.586l2.293-2.293z"
                            />
                        </svg>
                        Sign in with Google
                    </a>
                </div>

                <div class="mt-4 flex items-center justify-end">
                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                        Forgot your password?
                    </Link>

                    <PrimaryButton
                        class="ms-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Log in
                    </PrimaryButton>
                </div>
            </form>
            <p class="text-sm text-center text-gray-400 mt-6">
                Don't have an account?
                <Link
                    :href="route('register')"
                    class="text-purple-500 hover:underline"
                    >Sign Up</Link
                >
            </p>
        </div>
    </div>
</template>

<style scoped>
/* Keyframe animation for the floating effect */
@keyframes cameraFloat {
    0% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
    100% {
        transform: translateY(0);
    }
}

/* Apply the camera float animation */
.camera-slide {
    animation: cameraFloat 2s ease-in-out infinite;
}

/* Slide-in effect for the content */
@keyframes contentSlideIn {
    0% {
        opacity: 0;
        transform: translateY(30px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

.content-slide {
    animation: contentSlideIn 1s ease-out forwards;
}

.leading-lines {
    animation: move-lines 15s linear infinite;
}

@keyframes move-lines {
    0% {
        transform: translateY(0);
    }
    100% {
        transform: translateY(-100px);
    }
}

.animate-float {
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

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
