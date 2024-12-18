<template>
    <div>
        <!-- Map container -->
        <div
            id="map"
            style="height: 400px; width: 100%; margin-bottom: 1rem"
        ></div>

        <!-- Buttons for locating the customer and store -->
        <div style="text-align: center">
            <button
                @click="locateCustomer"
                style="
                    margin-right: 1rem;
                    padding: 8px 12px;
                    background-color: #4caf50;
                    color: white;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                "
            >
                Locate Me
            </button>
            <button
                @click="moveToStore"
                style="
                    padding: 8px 12px;
                    background-color: #2196f3;
                    color: white;
                    border: none;
                    border-radius: 4px;
                    cursor: pointer;
                "
            >
                Go to Store
            </button>
        </div>
    </div>
</template>

<script>
import L from "leaflet";

export default {
    props: {
        latitude: {
            type: Number,
            required: true, // Store latitude
        },
        longitude: {
            type: Number,
            required: true, // Store longitude
        },
    },
    data() {
        return {
            map: null, // Map instance
            customerMarker: null, // Marker for the customer's location
        };
    },
    mounted() {
        // Initialize the map
        this.map = L.map("map").setView([this.latitude, this.longitude], 13);

        // Add OpenStreetMap tiles
        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution:
                'Map data © <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(this.map);

        // Add a marker for the store location
        L.marker([this.latitude, this.longitude])
            .addTo(this.map)
            .bindPopup("Our Store Location")
            .openPopup();
    },
    methods: {
        // Move the map to the customer's current location
        locateCustomer() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const { latitude, longitude } = position.coords;

                        // Add or update the customer marker
                        if (this.customerMarker) {
                            this.map.removeLayer(this.customerMarker);
                        }

                        this.customerMarker = L.marker([latitude, longitude])
                            .addTo(this.map)
                            .bindPopup("You are here")
                            .openPopup();

                        // Center the map on the customer's location
                        this.map.setView([latitude, longitude], 15);
                    },
                    () => {
                        alert("Unable to retrieve your location.");
                    }
                );
            } else {
                alert("Geolocation is not supported by your browser.");
            }
        },

        // Move the map to the store's location
        moveToStore() {
            this.map.setView([this.latitude, this.longitude], 13);
        },
    },
};
</script>

<style>
/* Optional styling for the map and buttons */
#map {
    border: 1px solid #ccc;
    border-radius: 8px;
}
button:hover {
    opacity: 0.8;
}
</style>
