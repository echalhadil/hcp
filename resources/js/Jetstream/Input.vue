<template>
    <input class="border-pink-600 dark:border-gray-600 focus:border-pink-600 focus:ring focus:ring-pink-500 dark:focus:ring-gray-100 dark:bg-gray-400 focus:ring-opacity-50 rounded-md shadow-sm dark:text-gray-100" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input">
</template>

<script>
    export default {
        props: ['modelValue'],

        emits: ['update:modelValue'],

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    }
</script>

