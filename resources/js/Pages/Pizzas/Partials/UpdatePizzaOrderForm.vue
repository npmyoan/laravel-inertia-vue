<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import {  useForm } from "@inertiajs/vue3";

const props = defineProps({
    pizza: {
        type: Object,
        required: true,
    },
});

const statusOptions = ["Ordered", "Prepping", "Baking", "Checking", "Ready"];

const form = useForm({
    size: props.pizza.size ?? "",
    crust: props.pizza.crust ?? "",
    toppings: JSON.stringify(props.pizza.toppings),
    // toppings: props.pizza.toppings.join(","),
    status: props.pizza.status ?? "",
});

const onSubmit = () => {
    form.patch(route("pizzas.update", props.pizza.id, form), {
        onSuccess: () => form.reset("password"),
    });
};
</script>
<template>
    <section class="p-4">
        <header>
            <h2 className="text-lg font-medium text-gray-900">
                Order Information
            </h2>

            <p className="mt-1 text-sm text-gray-600">
                Update your account's profile information and email address.
            </p>
        </header>

        <form @submit.prevent="onSubmit" className="mt-6 space-y-6">
            <div>
                <InputLabel for="size" value="Size" />

                <TextInput
                    v-model.trim="form.size"
                    id="size"
                    className="mt-1 block w-full"
                    disabled
                />
            </div>

            <div>
                <InputLabel for="crust" value="Crust" />

                <TextInput
                    v-model.trim="form.crust"
                    id="crust"
                    className="mt-1 block w-full"
                    disabled
                />
            </div>

            <div>
                <InputLabel for="toppings" value="Toppings" />

                <TextInput
                    v-model="form.toppings"
                    id="name"
                    className="mt-1 block w-full"
                    disabled
                />
            </div>

            <div>
                <InputLabel for="status" value="Status" />

                <select
                    v-model="form.status"
                    id="status"
                    class="mt-1 block w-full"
                >
                    <option v-for="status in statusOptions" :key="status">
                        {{ status }}
                    </option>
                </select>

                <InputError className="mt-2" :message="form.errors.status" />
            </div>

            <div className="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing">
                    Save Changes
                </PrimaryButton>
            </div>
        </form>
    </section>
</template>
