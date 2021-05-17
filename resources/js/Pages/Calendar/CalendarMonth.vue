<template>
    <div class="w-full p-5 pb-3">
        <div class="grid grid-cols-7 w-full gap-1">
            <CalendarWeekHeader
                v-for="(day, index) in daysInWeek"
                :key="index"
                :day="day"
            />
        </div>
        <div class="grid grid-cols-7 gap-1">
            <CalendarWeek
                v-for="(week, index) in datesPerWeek"
                :key="index"
                :week="week"
                :is-today="isToday"
                :is-selected="isSelected"
                @selectDate="selectDate"
            />
        </div>
    </div>
</template>

<script>
import CalendarWeekHeader from "./CalendarWeekHeader";
import CalendarWeek from "./CalendarWeek";

export default {
    components: {
        CalendarWeekHeader,
        CalendarWeek,
    },
    props: {
        datesPerWeek: {
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
        weekStartDay: {
            type: Number,
            default: 0,
        },
    },
    data() {
        return {
            // daysInWeek: ["S", "M", "T", "W", "T", "F", "S"],
            daysInWeek: ["D", "L", "M", "M", "J", "V", "S"],
        };
    },
    created() {
        this.rotateDaysInWeek(this.daysInWeek, this.weekStartDay);
    },
    methods: {
        selectDate(date) {
            this.$emit("selectDate", date);
        },
        rotateDaysInWeek(daysInWeek, shifts) {
            while (shifts--) {
                var temp = daysInWeek.shift();
                daysInWeek.push(temp);
            }
        },
    },
};
</script>
