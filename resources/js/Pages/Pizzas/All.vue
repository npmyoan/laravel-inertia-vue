<script setup>
import { Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import BaseTable from "@/Components/BaseTable.vue";

const props = defineProps({
    pizzas: {
        type: Array,
        required: true,
    },
    auth: {
        type: Object,
    },
});

const columns = ["size", "chef", "status"];
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                All Pizzas
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <BaseTable
                        :items="pizzas"
                        :columns="columns"
                        primary="Order number"
                        action="pizzas.edit"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
