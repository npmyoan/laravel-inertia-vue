<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import UpdatePizzaOrderForm from "./Partials/UpdatePizzaOrderForm.vue";
defineProps({
    auth: Object,
    pizza: Object,
});
</script>

<template>
    <AuthenticatedLayout>
        <Head :title="'Order# ' + pizza.id" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Order #{{ pizza?.id }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <UpdatePizzaOrderForm :pizza="pizza" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
