<template>
    <div class="bg-white dark:bg-gray-400 rounded p-4 flex flex-col justify-between shadow">
        <!--     <statistics-card-pie /> -->

        <p class="capitalize text-gray-500 dark:text-gray-200">{{title}}</p>
        <div
            class=" flex text-pink-600 dark:text-gray-100 text-center"
        >
            <p class="font-semibold ml-auto text-3xl capitalize">
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
