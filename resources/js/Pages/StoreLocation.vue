<template>
    <div>
        <h1 class="text-lg font-bold mb-4">Find Our Store</h1>
        <StoreMap
            :latitude="storeLocation.latitude"
            :longitude="storeLocation.longitude"
        />
    </div>
</template>

<script>
import StoreMap from "@/Components/StoreMap.vue";

export default {
    props: {
        storeLocation: {
            type: Object,
            required: true,
        },
    },
    components: {
        StoreMap,
    },
};
</script>
