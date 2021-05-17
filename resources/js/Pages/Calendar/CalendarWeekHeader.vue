<template>
    <th>
        <div class="mt-3 mb-2 text-center text-pink-700">
            {{ day }}
        </div>
    </th>
</template>

<script>
export default {
    props: {
        day: {
            type: String,
            default: () => "",
        },
    },
};
</script>
