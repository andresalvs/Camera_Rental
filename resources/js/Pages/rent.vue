<template>
  <div class="min-h-screen bg-gradient-to-br from-gray-900 to-gray-800 text-white">
    <!-- Header with Navbar -->
    <header class="bg-black bg-opacity-50 backdrop-filter backdrop-blur-lg fixed w-full z-10">
      <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
          <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600">
            ZoomPro
          </h1>
          <nav class="hidden md:flex space-x-6">
            <router-link
              v-for="link in ['Home', 'Shop', 'Support', 'Account', 'LogOut']"
              :key="link"
              :to="link === 'LogOut' ? '/' : `/${link.toLowerCase().replace(' ', '-')}`"
              class="text-sm uppercase tracking-wider hover:text-purple-400 transition duration-300"
              :class="{
                'text-yellow-400': $route.path === `/${link.toLowerCase().replace(' ', '-')}`,
              }"
            >
              {{ link }}
            </router-link>
          </nav>
          <button @click="toggleMobileMenu" class="md:hidden text-white focus:outline-none">
            <svg v-if="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
      <!-- Mobile menu -->
      <div v-show="mobileMenuOpen" class="md:hidden">
        <router-link
          v-for="link in ['Home', 'Shop', 'Support', 'Account', 'LogOut']"
          :key="link"
          :to="link === 'LogOut' ? '/' : `/${link.toLowerCase().replace(' ', '-')}`"
          class="block px-4 py-2 text-sm text-center hover:bg-gray-700 transition duration-300"
          :class="{
            'text-yellow-400': $route.path === `/${link.toLowerCase().replace(' ', '-')}`,
          }"
        >
          {{ link }}
        </router-link>
      </div>
    </header>

    <!-- Main Content -->
    <div class="pt-24 container max-w-4xl mx-auto px-4">

      <div class="mt-6">
      <h1 class="bg-black text-white font-bold py-4 px-4 rounded-lg text-3xl font-bold  text-center">Rent Camera</h1>
      </div>

      <div v-if="camera" class="flex flex-col md:flex-row bg-gray-800 rounded-lg shadow-lg p-6 gap-6 justify-center items-center">
        <!-- Left Section: Camera Image -->
        <div class="flex-shrink-0 md:w-1/2 lg:w-2/5 flex justify-center mb-4 md:mb-0">
          <img :src="camera.image" :alt="camera.name" class="w-full h-auto object-cover rounded-lg shadow-md max-w-xs" />
        </div>

        <!-- Right Section: Rental Details -->
        <div class="flex-grow md:w-1/2 lg:w-3/5 text-center ">
          <h2 class="text-3xl font-semibold mb-4">{{ camera.name }}</h2>
          <p class="text-lg text-gray-400 mb-4">{{ camera.category }}</p>
          <p class="text-2xl font-bold text-purple-400 mb-6">${{ camera.price }}/day</p>

          <!-- Rental Form -->
          <div class="mb-6">
            <label for="start-date" class="block text-lg mb-2">Start Rental Date:</label>
            <input id="start-date" type="date" v-model="startDate" class="w-full md:w-2/3 p-3 rounded bg-gray-700 text-white" />
          </div>

          <div class="mb-6">
            <label for="end-date" class="block text-lg mb-2">End Rental Date:</label>
            <input id="end-date" type="date" v-model="endDate" class="w-full md:w-2/3 p-3 rounded bg-gray-700 text-white" />
          </div>

          <!-- Total Cost Calculation -->
          <p v-if="totalDays > 0" class="text-xl font-bold text-purple-400 mb-4">
            Total: ${{ totalCost }} ({{ totalDays }} day(s))
          </p>

          <!-- Payment Method -->
          <div class="mb-6">
            <label for="payment-method" class="block text-lg mb-2">Choose Payment Method:</label>
            <select id="payment-method" class="w-full md:w-2/3 p-3 rounded bg-gray-700 text-white">
              <option>Credit Card</option>
              <option>PayPal</option>
              <option>Bank Transfer</option>
            </select>
          </div>

          <!-- Place Order Button -->
          <button class="bg-orange-400 hover:bg-orange-600 text-white font-bold py-3 px-8 rounded-full mt-4" @click="openConfirmationModal" :disabled="!startDate || !endDate || totalDays <= 0">
            Place Order
          </button>


           <!-- Go Back to Shop Button -->
 <div class="mt-6">
        <router-link to="/shop" class="bg-purple-600 hover:bg-purple-900 text-white font-bold py-2 px-6 rounded-lg">
          Go Back to Shop
        </router-link>
      </div>

        </div>
      </div>

      <!-- No camera selected -->
      <div v-else>
        <p class="text-center text-lg">No camera selected.</p>
      </div>

      <!-- Confirmation Modal -->
      <div v-if="showConfirmation" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center">
        <div class="bg-gray-800 p-6 rounded-lg text-center max-w-md">
          <h2 class="text-2xl font-bold mb-4 text-white">Please confirm the details</h2>
          <p class="text-lg text-gray-300">Camera: {{ camera.name }}</p>
          <p class="text-lg text-gray-300">Rental Period: {{ startDate }} to {{ endDate }}</p>
          <p class="text-xl font-bold text-purple-400 mb-6">Total: ${{ totalCost }} ({{ totalDays }} day(s))</p>
          <router-link
  to="/successrent"
  class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-8 rounded-full"
>
  Confirm and Checkout
</router-link>

          <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-full mt-4" @click="closeConfirmationModal">
            Cancel
          </button>

           <!-- Go Back to Shop Button -->
 <div class="mt-6">
        <router-link to="/shop" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-lg">
          Go Back to Shop
        </router-link>
      </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, computed } from "vue";
import { useRoute } from "vue-router";
import Canon_EOS_R5 from "@/img/Canon_EOS_R5.png";
import Sony_A7_III from "@/img/Sony-A7-III-.png";
import Nikon_Z6 from "@/img/Nikon_Z6.png";
import Fujifilm_X_T4 from "@/img/Fujifilm_X-T4.png";
import Panasonic_Lumix_GH5 from "@/img/Panasonic_Lumix_GH5.png";
import Blackmagic_Pocket_6K from "@/img/Blackmagic_Pocket_6K.png";


export default {
  setup() {
    const route = useRoute();
    const cameras = ref([
      {
        id: 1,
        name: "Canon EOS R5",
        price: 150,
        image: Canon_EOS_R5,
        category: "DSLR",
      },
      {
        id: 2,
        name: "Sony A7 III",
        price: 120,
        image: Sony_A7_III,
        category: "Mirrorless",
      },
      {
        id: 3,
        name: "Nikon Z6",
        price: 130,
        image: Nikon_Z6,
        category: "Mirrorless",
      },
      {
        id: 4,
        name: "Fujifilm X-T4",
        price: 100,
        image: Fujifilm_X_T4,
        category: "Mirrorless",
      },
      {
        id: 5,
        name: "Panasonic Lumix GH5",
        price: 110,
        image: Panasonic_Lumix_GH5,
        category: "DSLR",
      },
      {
        id: 6,
        name: "Blackmagic Pocket 6K",
        price: 200,
        image: Blackmagic_Pocket_6K,
        category: "Others",
      },
    ]);

    const camera = computed(() =>
      cameras.value.find((cam) => cam.id === parseInt(route.params.id))
    );

    // State for rental dates and total calculation
    const startDate = ref(null);
    const endDate = ref(null);
    const showConfirmation = ref(false);

    // Calculate total days and total cost
    const totalDays = computed(() => {
      if (startDate.value && endDate.value) {
        const start = new Date(startDate.value);
        const end = new Date(endDate.value);
        const diffTime = end - start;
        return diffTime > 0 ? Math.ceil(diffTime / (1000 * 3600 * 24)) : 0;
      }
      return 0;
    });

    const totalCost = computed(() => {
      return totalDays.value * (camera.value?.price || 0);
    });

    // Handle confirmation modal
    const openConfirmationModal = () => {
      if (totalDays.value > 0) {
        showConfirmation.value = true;
      }
    };

    const closeConfirmationModal = () => {
      showConfirmation.value = false;
    };

    const placeOrder = () => {
      alert(`Order confirmed for ${camera.value.name}!\nTotal: $${totalCost.value}`);
      closeConfirmationModal();
    };

    return {
      camera,
      startDate,
      endDate,
      totalDays,
      totalCost,
      showConfirmation,
      openConfirmationModal,
      closeConfirmationModal,
      placeOrder,
    };
  },
};
</script>

<style scoped>
/* Add any custom styling here */
</style>
