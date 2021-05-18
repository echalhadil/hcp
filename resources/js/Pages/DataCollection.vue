<template>
    <left-layout>
        <div class="p-5 md:p-12 w-full">
            <div
                class="grid md:grid-cols-4 md:grid-rows-2 grid-rows-1 grid-cols-1 my-auto gap-4"
            >
                <situation-resident class="md:col-span-2 md:row-span-2" />
                <sexe />
                <pays-nationalite />
                <etat-matrimonial />
                <etablisement />
            </div>

            <div
                class="grid md:grid-cols-3 md:grid-rows-2 grid-cols-1 my-auto gap-4 mt-4"
            >
                <assurance-medical class="md:row-span-2" />
                <etat-fonctionnel class="md:row-span-2" />
                <personne-moin-plus class="md:row-span-2" />
            </div>
            <data-list />
        </div>
    </left-layout>
</template>

<script>
import LeftLayout           from "@/Layouts/LeftLayout";
import DataList             from "@/Pages/Data/DataList";
import SituationResident    from "@/Pages/Data/SituationResident";
import Sexe                 from "@/Pages/Data/Sexe";
import PaysNationalite      from "@/Pages/Data/PaysNationalite";
import EtatMatrimonial      from "@/Pages/Data/EtatMatrimonial";
import Etablisement         from "@/Pages/Data/Etablisement";
import EtatFonctionnel      from "@/Pages/Data/EtatFonctionnel";
import AssuranceMedical     from "@/Pages/Data/AssuranceMedical";
import PersonneMoinPlus     from "@/Pages/Data/PersonneMoinPlus";

export default {
    components: {
        LeftLayout,
        DataList,
        SituationResident,
        Sexe,
        PaysNationalite,
        EtatMatrimonial,
        Etablisement,
        EtatFonctionnel,
        AssuranceMedical,
        PersonneMoinPlus,
    },
};
</script>
