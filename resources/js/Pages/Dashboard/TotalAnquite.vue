<template>
    <div class="bg-white dark:bg-gray-400 rounded shadow p-4">
        <div class="flex capitalize text-sm text-gray-600 dark:text-gray-200">
            <p class="my-auto"> {{title}}</p>
        </div>

        <div class="p-5 text-center">
            <p
                class="font-semibold text-4xl capitalize text-pink-600 dark:text-gray-100"
            >
                {{ total }}
            </p>
        </div>

        <div
            v-if="today > 0"
            class="flex justify-center text-xs font-semibold text-green-600 dark:text-gray-200 text-center"
        >
            <i
                class="far my-auto fa-arrow-up mr-2 animate-bounce"
                aria-hidden="true"
            ></i>
            <p class="my-auto capitalize">
                <span class="animate-ping">+</span>
                {{ today }} aujourd’hui
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props: ["today", "total","title"],
};
</script>
