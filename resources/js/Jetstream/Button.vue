<template>
    <button :type="type" class="inline-flex text-center items-center px-4 py-2 bg-pink-800 dark:bg-gray-600 border border-transparent rounded font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-700 active:bg-pink-900 focus:outline-none focus:border-pink-900 focus:shadow-outline-gray disabled:opacity-25 transition">
        <slot></slot>
    </button>
</template>

<script>
    export default {
        props: {
            type: {
                type: String,
                default: 'submit',
            },
        }
    }
</script>
