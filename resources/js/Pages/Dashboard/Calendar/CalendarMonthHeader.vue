<template>
    <div
        class="bg-gradient-to-r from-pink-100 to-pink-300 text-pink-600 items-center justify-between rounded p-4 flex"
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
    // "january",
    // "february",
    // "march",
    // "april",
    // "may",
    // "june",
    // "july",
    // "august",
    // "september",
    // "october",
    // "november",
    // "december",

    "janvier",
    "février",
    "mars",
    "avril",
    "mai",
    "juin",
    "juillet",
    "août",
    "septembre",
    "octobre",
    "novembre",
    "décembre",
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
