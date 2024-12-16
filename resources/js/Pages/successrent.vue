<template>
    <div class="min-h-screen bg-gradient-to-br from-gray-900 to-gray-800 text-white">
      <!-- Header with Navbar -->
      <header class="bg-black bg-opacity-50 backdrop-filter backdrop-blur-lg fixed w-full z-10">
        <div class="container mx-auto px-4 py-4">
          <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-pink-600">
              ZoomPro
            </h1>
          </div>
        </div>
      </header>
  
      <!-- Main Content -->
      <div class="pt-24 container max-w-4xl mx-auto px-10">
        <!-- Rent Success Message -->
        <div class="flex flex-col items-center text-center bg-gray-800 rounded-lg shadow-lg p-6 gap-4">
          <h1 class="text-3xl font-bold text-green-400">Rent Successfully Placed!</h1>
          <img
            :src="camera.image"
            :alt="camera.name"
            class="w-32 h-auto object-cover rounded-lg shadow-md"
          />
          <div class="text-white">
            <h2 class="text-2xl font-semibold">{{ camera.name }}</h2>
            <p class="text-lg text-gray-400">{{ camera.category }}</p>
            <p class="text-xl font-bold text-purple-400">
              Total: ${{ totalCost }} for {{ totalDays }} day(s)
            </p>
          </div>
          <p class="text-gray-400 text-lg">Please check your email for more information.</p>
          <router-link
            to="/shop"
            class="bg-purple-600 hover:bg-purple-800 text-white font-bold py-2 px-6 rounded-lg mt-4"
          >
            Back to Shop
          </router-link>
        </div>
      </div>
    </div>
  </template>
  
  

  <script>
  import Canon_EOS_R5 from "@/img/Canon_EOS_R5.png";
  
  export default {
    setup() {
      // Example camera data
      const camera = {
        id: 1,
        name: "Canon EOS R5",
        price: 150,
        image: Canon_EOS_R5,
        category: "DSLR",
      };
  
      // Rental details
      const totalDays = 3; // Example: 3 days
      const totalCost = totalDays * camera.price;
  
      return {
        camera,
        totalDays,
        totalCost,
      };
    },
  };
  </script>
  

<style scoped>
body {
  margin: 0;
}

.bg-gradient-to-br {
  background: linear-gradient(to bottom right, #1f2937, #111827);
}

header {
  border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

button {
  transition: background-color 0.3s ease, transform 0.2s ease;
}

button:hover {
  transform: translateY(-2px);
}

img {
  box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
}
</style>
