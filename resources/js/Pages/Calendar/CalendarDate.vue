<template>
    <td>
        <div
            v-show="date"
            class="table-cell border-box h-7 w-7 align-middle cursor-default cell"
            :class="{
                'bg-pink-800 rounded-full text-gray-100': isToday,
                'border border-pink-800 rounded-full ': isSelected,
            }"
        >
            {{ date }}
        </div>
    </td>
</template>

<script>
export default {
    props: {
        date: {
            type: Number,
            default: () => 1,
        },
        isToday: {
            type: Boolean,
            default: false,
        },
        isSelected: {
            type: Boolean,
            default: false,
        },
    },
};
</script>
