<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <div class="min-h-screen bg-gray-900 flex items-center justify-center">

<!-- Left Image (Camera) -->
<div class="md:w-1/2 relative order-last md:order-first">
              <div class="absolute inset-0 bg-gradient-to-r from-green-500 to-purple-600 rounded-full filter blur-[100px] opacity-30 animate-pulse"></div>
              <img
                src="/img/canonr6.png"
                alt="Nikon_zcam"
                class="w-full max-w-md mx-auto relative z-10 animate-float"
              />
            </div>


        <div class="bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-sm">
            <Head title="Register" />
            <h1 class="text-2xl font-bold text-purple-500 text-center mb-4">
                <h1
                    class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600"
                >
                    ZoomPro
                </h1>
                Sign Up
            </h1>
            <form @submit.prevent="submit">
                <div class="mb-3">
                    <InputLabel
                        class="block text-gray-300 text-sm font-bold mb-1"
                        for="name"
                        value="Name"
                    />

                    <TextInput
                        class="w-full px-2 py-2 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                        id="name"
                        type="text"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mb-3">
                    <InputLabel
                        class="block text-gray-300 text-sm font-bold mb-1"
                        for="email"
                        value="Email"
                    />

                    <TextInput
                        id="email"
                        type="email"
                        class="w-full px-2 py-2 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                        v-model="form.email"
                        required
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-4">
                    <InputLabel
                        class="block text-gray-300 text-sm font-bold mb-1"
                        for="password"
                        value="Password"
                    />

                    <TextInput
                        id="password"
                        type="password"
                        class="w-full px-2 py-2 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                        v-model="form.password"
                        required
                        autocomplete="new-password"
                    />

                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-4">
                    <InputLabel
                        class="block text-gray-300 text-sm font-bold mb-1"
                        for="password_confirmation"
                        value="Confirm Password"
                    />

                    <TextInput
                        id="password_confirmation"
                        type="password"
                        class="w-full px-2 py-2 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="new-password"
                    />

                    <InputError
                        class="mt-2"
                        :message="form.errors.password_confirmation"
                    />
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
                <!-- <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <input
                            v-model="termsAccepted"
                            type="checkbox"
                            id="terms"
                            class="mr-2 h-4 w-4 text-purple-600 border-gray-300 rounded"
                            required
                        />
                        <label for="terms" class="text-sm text-gray-300">
                            I accept the
                            <a href="#" class="text-purple-500 hover:underline"
                                >Terms and Conditions</a
                            >
                        </label>
                    </div>
                </div> -->
                <div class="mt-4 flex items-center justify-end">
                    <Link
                        :href="route('login')"
                        class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                        Already registered?
                    </Link>

                    <PrimaryButton
                        class="ms-4"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Register
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>
/* Add custom styles for animation */
.animate-float {
  animation: float 2s ease-in-out infinite;
}

@keyframes float {
  0% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-15px);
  }
  100% {
    transform: translateY(0);
  }
}

.animate-slide-in {
  animation: slideIn 1s ease-out forwards;
}

@keyframes slideIn {
  from {
    transform: translateX(100%);
  }
  to {
    transform: translateX(0);
  }
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
0%, 100% {
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

