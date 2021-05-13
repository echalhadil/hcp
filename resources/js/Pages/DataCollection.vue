<template>
    <left-layout>
        <div class=" p-5 md:p-12 w-full">
            <div class="grid md:grid-cols-4 grid-cols-1 my-auto gap-4">
                <situation-resident />

                <sexe />

                <pays-nationalite />
                <etat-matrimonial />

            </div>

            <div class="grid md:grid-cols-3 grid-cols-1 my-auto gap-4 mt-12">
                

                <assurance-medical />
                
                <etablisement />

                <etat-fonctionnel />

            </div>

            <div class="grid md:grid-cols-3 grid-cols-1 my-auto gap-4 mt-12">
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
import PaysNationalite from "@/Pages/Data/PaysNationalite";
import EtatMatrimonial from "@/Pages/Data/EtatMatrimonial";
import Etablisement from "@/Pages/Data/Etablisement";
import EtatFonctionnel from "@/Pages/Data/EtatFonctionnel";
import AssuranceMedical from "@/Pages/Data/AssuranceMedical";


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
        PaysNationalite,
        EtatMatrimonial,
        Etablisement,
        EtatFonctionnel,
        AssuranceMedical
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
