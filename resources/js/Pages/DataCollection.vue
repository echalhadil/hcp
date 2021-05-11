<template>
    <left-layout>
        <div class="p-12 w-full">
            <div class="grid md:grid-cols-3 grid-cols-1 my-auto gap-4">
                <div class="p-3 bg-white rounded shadow">
                    <chart
                        id="resident"
                        type="doughnut"
                        title="sitiation de resident"
                    />
                </div>
                <div class="p-3 bg-white rounded shadow">
                    <chart
                        id="nationalite"
                        type="pie"
                        title="pays de nationalite"
                    />
                </div>

                <div class="p-3 bg-white rounded shadow">
                    <chart id="sexe" type="line" title="sexe" />
                </div>
            </div>

            <div class="grid md:grid-cols-3 grid-cols-1 my-auto gap-4 mt-12">
                <div class="p-3 bg-white rounded shadow">
                    <chart
                        id="matrimonial"
                        type="doughnut"
                        title="Etat matrimonial"
                    />
                </div>
                <div class="p-3 bg-white rounded shadow">
                    <chart id="etablisement" type="pie" title="etablisement" />
                </div>

                <div class="p-3 bg-white rounded shadow">
                    <chart
                        id="fonctionnel"
                        type="line"
                        title="etat fonctionnel"
                    />
                </div>
            </div>

            <div class="grid md:grid-cols-3 grid-cols-1 my-auto gap-4 mt-12">
                <div class="p-3 bg-white rounded shadow">
                    <chart
                        id="assurance"
                        type="doughnut"
                        title="assurance medical"
                    />
                </div>
            </div>

            <div class="p-5 bg-white w-full mt-12 rounded shadow">
                <div class="flex mr-auto w-full">
                    <!--<p class="my-auto capitalize font-semibold text-gray-600 mr-3"> current Team </p>
                    -->

                    <div class="flex relative ml-9 my-auto">
                        <input
                            type="text"
                            class="focus:border-pink-500 focus:ring-0 pr-8 placeholder-gray-400 p-1 rounded"
                            placeholder="Search"
                        />
                        <i
                            class="fal fa-search text-pink-500 my-auto -ml-6"
                        ></i>
                    </div>

                    <div class="flex ml-auto my-auto">
                        <download-team-list />
                    </div>

                    <team-settings />
                </div>
            </div>

             <div class="mt-2 mb-6 bg-current rounded shadow overflow-x-auto w-full">
                <div
                    class="w-full flex items-center justify-center bg-gray-100 font-sans overflow-x-auto"
                    >
                    <div class="w-full">
                        <div class="bg-white shadow-md rounded">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr
                                        class="bg-gray-200 text-gray-600 uppercase text-sm py-6 leading-normal"
                                    >
                                        <th v-for="(question, index) in questions" :key="index" class="py-3 text-xs cursor-pointer select-none px-6 text-left">
                                            {{question.libelle}}
                                          
                                        </th>

                                     
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    <tr
                                        v-if="questionAndAnswer.length === 0"
                                        class="border-b text-lg border-gray-200"
                                    >
                                        <td
                                            class="py-3 px-6 text-center capitalize"
                                            colspan="4"
                                        >
                                            aucune membre
                                        </td>
                                    </tr>
                                    <tr
                                        v-if="questionAndAnswer.length > 0"
                                        v-for="(reponses, index) in questionAndAnswer" :key="index"
                                        class="border-b w-full bg-white text-xs hover:bg-gray-50 capitalize border-gray-200"
                                        :class="{' bg-gray-100 ':index%2 !=0}"

                                    >
                                        
                                        <td v-for="(reponse, index) in reponses" :key="index" class="py-3 px-6 text-center">
                                            <span class="font-medium"
                                            :class="{'text-gray-400':reponse.reponse == null}">
                                                {{ reponse.reponse || "NaN" }}
                                                </span
                                            >
                                        </td>
                                    </tr>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </left-layout>
</template>

<script>
import LeftLayout from "@/Layouts/LeftLayout";
import Welcome from "@/Jetstream/Welcome";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import JetDropdown from "@/Jetstream/Dropdown";

import TeamSettings from "@/Pages/Teams/Settings";
import DownloadTeamList from "@/Pages/Teams/DownloadTeamList";
import RightSlide from "@/Pages/Teams/RightSlide";

import StatisticsCardPie from "@/StatisticsCards/StatisticsCardPie";
import GenrePie from "@/StatisticsCards/GenrePie";
import ChomageCard from "@/StatisticsCards/ChomageCard";
import Chart from "@/StatisticsCards/Chart";

export default {
    components: {
        LeftLayout,
        Welcome,
        JetDropdown,
        JetDropdownLink,
        TeamSettings,

        DownloadTeamList,
        RightSlide,
        StatisticsCardPie,
        GenrePie,
        ChomageCard,
        Chart,
    },
    data() {
        return {
            leftside: false,
            selectedmember: {},
            sorting: "asc",
            questions:[],
            questionAndAnswer : []
        };
    },
    methods: {
        getAnquites() {
            axios
                .get(this.route("anquites.index"))
                .then((response) => {
                    this.questionAndAnswer = response.data.questionAndAnswer
                    this.questions = response.data.questions
                })
                .catch(err =>{
                    console.log(err)
                });
        },
    },
    mounted() {
        this.getAnquites();
    },
};
</script>
