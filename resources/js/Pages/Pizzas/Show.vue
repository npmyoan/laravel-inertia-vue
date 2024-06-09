<script setup>
import { Head, router } from "@inertiajs/vue3";
import { onUnmounted } from "vue";

import PizzaStatus from "@/Pages/Pizzas/Partials/PizzaStatus.vue";
defineProps({
    pizza: Object,
});

const interval = setInterval(() => {
    router.reload({ only: ["pizza"] });
}, 1000);
onUnmounted(() => {
    clearInterval(interval);
});
</script>

<template>
    <div class="max-w-3xl mx-auto py-12">
        <Head :title="`Order # ${pizza.id}`" />
        <div class="py-8">
            <img
                class="cover w-32 h-32 mx-auto"
                src="https://th.bing.com/th/id/R.3884e41d30422b594b4464f4416d6166?rik=tlsweE1bT4zgUw&pid=ImgRaw&r=0"
                alt="pizza"
            />
        </div>

        <PizzaStatus :current-status="pizza.status" />
        <div class="text-center mt-4">
            <p class="text-lg">
                {{ pizza.chef }} started {{ pizza.status.toLowerCase() }} your
                order
                <span class="underline font-semibold">
                    {{ pizza.last_updated }}</span
                >
            </p>
        </div>
    </div>
</template>
