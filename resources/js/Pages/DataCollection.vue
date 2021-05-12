<template>
    <left-layout>
        <div class="p-12 w-full">
            <div class="grid md:grid-cols-3 grid-cols-1 my-auto gap-4">
                <situation-resident />

                <div class="p-3 bg-white rounded shadow">
                    <chart
                        id="nationalite"
                        type="pie"
                        title="pays de nationalite"
                    />
                </div>

                <sexe />
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

            <data-list />
        </div>
    </left-layout>
</template>

<script>
import LeftLayout from "@/Layouts/LeftLayout";
import Welcome from "@/Jetstream/Welcome";
import JetDropdownLink from "@/Jetstream/DropdownLink";
import JetDropdown from "@/Jetstream/Dropdown";

// import TeamSettings from "@/Pages/Teams/Settings";
// import DownloadTeamList from "@/Pages/Teams/DownloadTeamList";
import RightSlide from "@/Pages/Teams/RightSlide";

// import StatisticsCardPie from "@/StatisticsCards/StatisticsCardPie";
// import GenrePie from "@/StatisticsCards/GenrePie";
// import ChomageCard from "@/StatisticsCards/ChomageCard";
import Chart from "@/StatisticsCards/Chart";
import DataList from "@/Pages/Data/DataList";
import SituationResident from "@/Pages/Data/SituationResident";
import Sexe from "@/Pages/Data/Sexe";

export default {
    components: {
        LeftLayout,
        Welcome,
        JetDropdown,
        JetDropdownLink,
        // TeamSettings,

        // DownloadTeamList,
        RightSlide,
        // StatisticsCardPie,
        // GenrePie,
        // ChomageCard,
        Chart,
        DataList,
        SituationResident,
        Sexe,
    },
    data() {
        return {
            leftside: false,
            selectedmember: {},
            sorting: "asc",
        };
    },
    methods: {},
    mounted() {},
};
</script>
