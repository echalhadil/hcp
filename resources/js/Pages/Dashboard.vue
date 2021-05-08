<template>
    <left-layout>
        <div class="w-full px-12 pt-12 items-stretch align-middle">
            <div class="grid md:grid-cols-4 grid-cols-1 my-auto gap-4">
                <div
                    class="bg-white grid grid-cols-2 md:col-span-2 rounded shadow"
                >
                    <div class="px-3 py-2">
                        <p class="capitalize text-gray-500 pb-1">region</p>

                        <select
                            v-model="selectedregion"
                            class="w-full rounded text-sm appearance-none form-select"
                            name=""
                            id=""
                        >
                            <option
                                v-for="(region, index) in regions"
                                :key="index"
                                :value="region.id"
                            >
                                {{ region.libelle }}
                            </option>
                        </select>
                    </div>

                    <div class="px-3 py-2">
                        <p class="capitalize text-gray-500 pb-1">province</p>
                        <select
                            v-model="selectedprovince"
                            class="w-full rounded text-sm appearance-none form-select"
                            name=""
                            id=""
                        >
                            <option
                                class="h-28 rounded-md hover:bg-indigo-400"
                                v-for="(province, index) in provinces"
                                :key="index"
                                :value="province.id"
                            >
                                {{ province.libelle }}
                            </option>
                        </select>
                    </div>

                    <div class="px-3 pb-2">
                        <p class="capitalize text-gray-500 pb-1">commun</p>
                        <select
                            class="w-full"
                            name=""
                            id=""
                            v-model="selectedcommune"
                        >
                            <option
                                v-for="(commune, index) in communes"
                                :key="index"
                            >
                                {{ commune.libelle }}
                            </option>
                        </select>
                    </div>

                    <div class="px-3 pb-2 mt-auto">
                        <button
                            class="m-auto rounded bg-pink-700 text-white p-2"
                            name=""
                            id=""
                        >
                            Enregistrer
                        </button>
                    </div>
                </div>

                <!--total anquite-->

                <div class="bg-white rounded shadow p-4">
                    <div class="flex capitalize text-xs text-gray-600">
                        <p class="my-auto">total d'enquites</p>
                        <i
                            class="fa fa-anchor my-auto ml-auto"
                            aria-hidden="true"
                        ></i>
                    </div>

                    <div class="p-5 text-center">
                        <p
                            class="font-semibold text-4xl capitalize text-pink-600"
                        >
                            {{ total }}
                        </p>
                    </div>

                    <div
                        class="flex justify-center text-xs font-semibold text-green-600 text-center"
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

                <div class="bg-white rounded shadow p-4">
                    <div class="flex capitalize text-xs text-gray-600">
                        <p class="my-auto">total d'enquites de votre equipe</p>
                        <i
                            class="fa fa-anchor my-auto ml-auto"
                            aria-hidden="true"
                        ></i>
                    </div>

                    <div class="p-5 text-center">
                        <p
                            class="font-semibold text-4xl capitalize text-pink-600"
                        >
                            {{ totalteam }}
                        </p>
                    </div>

                    <div
                        class="flex justify-center text-xs font-semibold text-green-600 text-center"
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

        <div class="w-full px-12 pt-12 items-stretch align-middle">
            <div
                class="grid md:grid-cols-3 md:grid-rows-2 grid-cols-1 my-auto gap-4"
            >
                <div
                    class="bg-white md:col-span-2 md:row-span-2 rounded shadow"
                >
                    <statistics-card-line />
                </div>

                <!--total anquite-->

                <div class="bg-white rounded p-4 shadow">
                    <!--     <statistics-card-pie /> -->

                    <p class="capitalize text-gray-500">Votre Equipe</p>
                    <div
                        class="p-5 flex transform top-1/2 relative -translate-y-1/2 text-center"
                    >
                        <p
                            class="font-semibold ml-auto text-4xl capitalize text-pink-600"
                        >
                            {{ numberofmembers.myteam }}
                        </p>
                        <p class="mb-0 ml-1 m-auto text-pink-500">Membre</p>
                    </div>
                </div>
                <div class="bg-white rounded p-4 shadow">
                    <!--     <statistics-card-pie /> -->

                    <p class="capitalize text-gray-500">Total</p>

                    <div
                        class="p-5 flex transform top-1/2 relative -translate-y-1/2 text-center"
                    >
                        <p
                            class="font-semibold ml-auto text-4xl capitalize text-pink-600"
                        >
                            {{ numberofmembers.total }}
                        </p>
                        <p class="mb-0 ml-1 m-auto text-pink-500">Membre</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full px-12 pt-12 items-stretch align-middle mb-12">
            <div class="grid md:grid-cols-3 grid-cols-1 my-auto gap-4">
                <!--total anquite-->

                <div
                    class="bg-white md:col-span-2 overflow-y-auto h-72 md:row-span-2 p-4 rounded shadow"
                >
                    <div
                        v-for="(region, index) in regions"
                        :key="index"
                        class="grid grid-cols-9 gap-2 my-2"
                    >
                        <div class="col-span-8 border p-2">
                            {{ region.libelle }}
                        </div>
                        <div class="border text-center py-2">30</div>
                    </div>
                </div>

                <div class="bg-white rounded p-4 shadow">
                    <!--     <statistics-card-pie /> -->

                    <p class="capitalize text-gray-500">
                        nombre des membre d'equipe
                    </p>
                    <div class="p-5 text-center">
                        <p
                            class="font-semibold text-4xl capitalize text-pink-600"
                        >
                            20,340
                        </p>
                    </div>
                </div>
                <div class="bg-white rounded p-4 shadow">
                    <!--     <statistics-card-pie /> -->

                    <p class="capitalize text-gray-500">
                        nombre des membre d'equipe
                    </p>
                    <div class="p-5 text-center">
                        <p
                            class="font-semibold text-4xl capitalize text-pink-600"
                        >
                            20,340
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </left-layout>
</template>

<script>
import LeftLayout from "@/Layouts/LeftLayout";
import StatisticsCardLine from "@/StatisticsCards/StatisticsCardLine";
import StatisticsCardPie from "@/StatisticsCards/StatisticsCardPie";

export default {
    components: {
        LeftLayout,
        StatisticsCardLine,
        StatisticsCardPie,
    },
    data() {
        return {
            totalteam: 0,
            todayteam: 0,
            total: 0,
            todaytotal: 0,
            selectedregion: "",
            selectedprovince: "",
            selectedcommune: "",
            regions: [],
            provinces: [],
            communes: [],
            outputData: "",
            numberofmembers: [],
        };
    },
    methods: {
        getAnquites() {
            axios
                .get("/anquites")
                .then((response) => {
                    this.totalteam = response.data.totalteam;
                    this.todayteam = response.data.todayteam;
                    this.total = response.data.total;
                    this.todaytotal = response.data.todaytotal;
                })
                .catch();
        },

        getregions() {
            axios
                .get("/regions")
                .then((response) => {
                    this.regions = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
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
    watch: {
        selectedprovince() {
            axios
                .get(
                    "/regions/" +
                        this.selectedregion +
                        "/provinces/" +
                        this.selectedprovince +
                        "/communes"
                )
                .then((response) => {
                    this.communes = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        selectedregion() {
            this.communes = [];
            axios
                .get("/regions/" + this.selectedregion + "/provinces")
                .then((response) => {
                    this.provinces = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },

    mounted() {
        this.getAnquites();
        this.getregions();
        this.getcountMembers();
    },
};
</script>
