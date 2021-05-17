<template>
    <CalendarDate
        v-for="(date, index) in week"
        :key="index"
        :date="date"
        :is-today="isToday === date"
        :is-selected="isSelected === date"
    />
</template>

<script>
import CalendarDate from "./CalendarDate";
export default {
    components: {
        CalendarDate,
    },
    props: {
        week: {
            type: Array,
            default: () => [],
        },
        isToday: {
            type: Number,
            default: 0,
        },
        isSelected: {
            type: Number,
            default: 0,
        },
    },
};
</script>
