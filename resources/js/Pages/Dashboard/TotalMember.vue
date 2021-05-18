<template>
    <div class="bg-white dark:bg-gray-400 rounded p-4 md:row-span-1 shadow">
        <!--     <statistics-card-pie /> -->

        <p class="capitalize text-gray-500 dark:text-gray-200">{{title}}</p>
        <div
            class="p-5 flex transform top-1/2 relative -translate-y-1/2 text-pink-600 dark:text-gray-100 text-center"
        >
            <p class="font-semibold ml-auto text-4xl capitalize">
                {{number }}
            </p>
            <p class="mb-0 ml-1 m-auto text-xs">Membre</p>
        </div>
    </div>
</template>

<script>
export default {
    props: ["number", "title"],
};
</script>
