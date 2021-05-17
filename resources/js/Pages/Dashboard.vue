<template>
    <left-layout>
        <div class="w-full px-5 md:px-12 pt-12 items-stretch align-middle">
            <div class="grid md:grid-cols-4 grid-cols-1 my-auto gap-4">
                <my-team-location
                    :commune="$page.props.location.id"
                    :province="$page.props.location.province.id"
                    :region="$page.props.location.province.region.id"
                />

                <!--total anquite-->

                <div class="bg-white dark:bg-gray-400 rounded shadow p-4">
                    <div
                        class="flex capitalize text-xs text-gray-600 dark:text-gray-200"
                    >
                        <p class="my-auto">Total D'enquêtes</p>
                    </div>

                    <div class="p-5 text-center">
                        <p
                            class="font-semibold text-4xl capitalize text-pink-600 dark:text-gray-100"
                        >
                            {{ total }}
                        </p>
                    </div>

                    <div
                        v-if="todaytotal > 0"
                        class="flex justify-center text-xs font-semibold text-green-600 dark:text-gray-200 text-center"
                    >
                        <i
                            class="far my-auto fa-arrow-up mr-2 animate-bounce"
                            aria-hidden="true"
                        ></i>
                        <p class="my-auto capitalize">
                            <span class="animate-ping">+</span>
                            {{ todaytotal }} aujourd’hui
                        </p>
                    </div>
                </div>

                <!--total anquite of your team-->

                <div class="bg-white dark:bg-gray-400 rounded shadow p-4">
                    <div
                        class="flex capitalize text-xs text-gray-600 dark:text-gray-200"
                    >
                        <p class="my-auto">Total D'enquêtes de votre equipe</p>
                    </div>

                    <div class="p-5 text-center">
                        <p
                            class="font-semibold text-4xl capitalize text-pink-600 dark:text-gray-100"
                        >
                            {{ totalteam }}
                        </p>
                    </div>

                    <div
                        v-if="totalteam > 0"
                        class="flex justify-center text-xs font-semibold text-green-600 dark:text-gray-200 text-center"
                    >
                        <i
                            class="far my-auto fa-arrow-up mr-2 animate-bounce"
                            aria-hidden="true"
                        ></i>
                        <p class="my-auto capitalize">
                            <span class="animate-ping">+</span>
                            {{ todayteam }} aujourd’hui
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full px-5 md:px-12 pt-4 items-stretch align-middle">
            <div
                class="grid md:grid-cols-3 md:grid-rows-2 grid-cols-1 my-auto gap-4"
            >
                <div
                    class="bg-white dark:bg-gray-400 md:col-span-2 md:row-span-2 rounded shadow"
                >
                    <statistics-card-line />
                </div>

                <!--total anquite-->

                <div class="bg-white dark:bg-gray-400 rounded p-4 shadow">
                    <!--     <statistics-card-pie /> -->

                    <p class="capitalize text-gray-500 dark:text-gray-200">
                        Votre équipe
                    </p>
                    <div
                        class="p-5 flex transform top-1/2 relative -translate-y-1/2 text-pink-600 dark:text-gray-100 text-center"
                    >
                        <p class="font-semibold ml-auto text-4xl capitalize">
                            {{ numberofmembers.myteam }}
                        </p>
                        <p class="mb-0 ml-1 m-auto">Membre</p>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-400 rounded p-4 shadow">
                    <!--     <statistics-card-pie /> -->

                    <p class="capitalize text-gray-500 dark:text-gray-200">
                        Total
                    </p>

                    <div
                        class="p-5 flex transform top-1/2 relative -translate-y-1/2 text-pink-600 dark:text-gray-100 text-center"
                    >
                        <p class="font-semibold ml-auto text-4xl capitalize">
                            {{ numberofmembers.total }}
                        </p>
                        <p class="mb-0 ml-1 m-auto">Membre</p>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="w-full px-5 md:px-12 pt-4 items-stretch align-middle mb-12"
        >
            <div class="grid md:grid-cols-3 grid-cols-1 my-auto gap-4">
                <!--total anquite-->

                <div
                    class="bg-white md:col-span-2 overflow-y-auto p-4 rounded shadow"
                >
                </div>

                
                <calendar-view />
                
            </div>
        </div>
    </left-layout>
</template>

<script>
import LeftLayout from "@/Layouts/LeftLayout";
import StatisticsCardLine from "@/StatisticsCards/StatisticsCardLine";
import StatisticsCardPie from "@/StatisticsCards/StatisticsCardPie";
import CalendarView from "@/Pages/Calendar/CalendarView";

import MyTeamLocation from "./Dashboard/TeamLocation";

export default {
    components: {
        LeftLayout,
        StatisticsCardLine,
        StatisticsCardPie,
        MyTeamLocation,
        CalendarView,
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
