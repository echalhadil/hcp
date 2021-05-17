<template>
    <div
        class="bg-gradient-to-r from-red-200 to-red-400 text-pink-800 items-center justify-between rounded p-4 flex"
    >
        <div class="cursor-pointer" @click="toggleMonth(-1)">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
        </div>
        <div class="font-bold text-2xl capitalize">
            {{ fullMonth }} {{ year }}
        </div>
        <div class="cursor-pointer" @click="toggleMonth(1)">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
        </div>
    </div>
</template>

<script>
const MONTHS = [
    "january",
    "february",
    "march",
    "april",
    "may",
    "june",
    "july",
    "august",
    "september",
    "october",
    "november",
    "december",
];
export default {
    props: {
        year: {
            type: Number,
            default: () => 1970,
        },
        month: {
            type: Number,
            default: () => 0,
        },
    },
    computed: {
        fullMonth() {
            return MONTHS[this.month];
        },
    },
    methods: {
        toggleMonth(direction) {
            this.$emit("toggleMonth", direction);
        },
    },
};
</script>
