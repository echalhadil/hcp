<template>
    <left-layout>
        <div
            class="w-full px-5 md:px-12 pt-12 grid md:grid-cols-4 grid-cols-1 my-auto gap-4"
        >
            <my-team-location
                :commune="$page.props.location.id"
                :province="$page.props.location.province.id"
                :region="$page.props.location.province.region.id"
            />

            <total-anquite
                :today="todaytotal"
                :total="total"
                title="Total De Questionnaires"
            />

            <total-anquite
                :today="todayteam"
                :total="totalteam"
                title="Questionnaires de votre equipe"
            />
        </div>

        <div
            class="w-full px-5 md:px-12 pt-4 grid md:grid-cols-6 md:grid-rows-3 grid-cols-1 my-auto gap-4"
        >
            <div
                class="bg-white dark:bg-gray-400 md:col-span-4 md:row-span-3 rounded shadow"
            >
                <statistics-card-line />
            </div>

            <!--total anquite-->

            <total-member
                :number="numberofmembers.myteam"
                title=" Votre équipe"
            />
            <total-member :number="numberofmembers.total" title="Total" />
            <calendar-view class="md:col-span-2 md:row-span-2" />
        </div>

        <div
            class="w-full px-5 md:px-12 pt-4 mb-12 grid md:grid-cols-3 grid-cols-1 my-auto gap-4"
        >
            <!--total anquite-->

            <div
                class="bg-white md:col-span-1 overflow-y-auto p-4 rounded shadow"
            ></div>

            <div
                class="bg-white md:col-span-2 overflow-y-auto p-4 rounded shadow"
            ></div>
        </div>
    </left-layout>
</template>

<script>
import LeftLayout from "@/Layouts/LeftLayout";
import StatisticsCardLine from "@/StatisticsCards/StatisticsCardLine";
import StatisticsCardPie from "@/StatisticsCards/StatisticsCardPie";
import CalendarView from "@/Pages/Dashboard/Calendar/CalendarView";
import TotalAnquite from "@/Pages/Dashboard/TotalAnquite";
import TotalMember from "@/Pages/Dashboard/TotalMember";
import MyTeamLocation from "./Dashboard/TeamLocation";

export default {
    components: {
        LeftLayout,
        StatisticsCardLine,
        StatisticsCardPie,
        MyTeamLocation,
        CalendarView,
        TotalAnquite,
        TotalMember,
    },
    data() {
        return {
            totalteam: 0,
            todayteam: 0,
            total: 0,
            todaytotal: 0,

            numberofmembers: [],
        };
    },
    methods: {
        getAnquites() {
            axios
                .get("/totalAnquite")
                .then((response) => {
                    this.totalteam = response.data.totalteam;
                    this.todayteam = response.data.todayteam;
                    this.total = response.data.total;
                    this.todaytotal = response.data.todaytotal;
                })
                .catch();
        },
        getcountMembers() {
            axios
                .get("/countmembers")
                .then((response) => {
                    this.numberofmembers = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
    mounted() {
        this.getAnquites();
        this.getcountMembers();
    },
};
</script>
