<script setup>
const props = defineProps({
    currentStatus: String,
});
const statuses = ["Ordered", "Prepping", "Baking", "Checking", "Ready"];

const getClass = (status, index) => {
    let baseClasses =
        "w-1/5 bg-gradient-to-b flex items-center justify-center h-20 border-r-2 transition-all";

    if (index === 0) {
        baseClasses += " rounded-l-full";
    }

    if (index === statuses.length - 1) {
        baseClasses = baseClasses.replace("border-r-2", "rounded-r-full");
    }

    if (status === props.currentStatus) {
        baseClasses += baseClasses.replace("border-r-2", "");
        return `${baseClasses} from-red-500 to-red-600 scale-110 rounded shadow-lg`;
    }

    if (statuses.indexOf(props.currentStatus) > index) {
        return `${baseClasses} from-blue-500 to-blue-500 border-blue-700`;
    }

    return `${baseClasses} from-blue-300 to-blue-400 border-blue-500`;
};
</script>

<template>
    <div class="flex border-4 border-blue-200 rounded-full">
        <div
            v-for="(status, index) in statuses"
            :key="index"
            :class="getClass(status, index)"
        >
            <div
                class="uppercase font-medium italic text-white drop-shadow text-center"
            >
                <span
                    class="block text-3xl font-bold not-italic leading-none"
                    >{{ index + 1 }}</span
                >
                {{ status }}
            </div>
        </div>
    </div>
</template>
