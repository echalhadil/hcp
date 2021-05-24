<template>
    <div class="p-5 bg-white w-full mt-4 rounded shadow">
        <div class="flex w-full" v-if="finish">
            <div class="my-auto ml-auto" v-if="questionAndAnswer.length > 0">
                <edit-anquite :selectedAnquite="selectedAnquite" />
            </div>

            <div
                class="my-auto ml-2"
                v-if="canDelete && questionAndAnswer.length > 0"
            >
                <button
                    class="text-red-600 px-2 py-1 border border-red-600 rounded disabled:opacity-50"
                    :disabled="!selectedAnquite"
                    @click="deleteAnquite"
                >
                    <i class="fal fa-trash" aria-hidden="true"></i>
                </button>
            </div>
            <div class="flex ml-2 my-auto" v-if="questionAndAnswer.length > 0">
                <download-data-list />
            </div>
        </div>
    </div>
    <div
        class="mt-2 mb-6 bg-current rounded shadow overflow-auto bg-white max-h-96 w-full"
    >
        <div
            class="w-full flex items-center justify-center bg-gray-100 font-sans"
        >
            <div class="w-full">
                <div class="bg-white shadow-md rounded">
                    <table
                        id="table"
                        class="min-w-max w-full table-auto"
                        border="1"
                    >
                        <thead id="headers">
                            <tr
                                class="bg-gray-200 text-gray-600 uppercase text-sm py-6 leading-normal"
                            >
                                <th
                                    v-if="finish"
                                    class="py-3 text-xs cursor-pointer select-none px-6 text-left"
                                ></th>
                                <th
                                    v-if="finish"
                                    class="py-3 text-xs cursor-pointer select-none px-6 text-left"
                                >
                                    #
                                </th>
                                <th
                                    v-if="finish"
                                    class="py-3 text-xs cursor-pointer select-none px-6 text-left"
                                >
                                    région
                                </th>
                                <th
                                    v-if="finish"
                                    class="py-3 text-xs cursor-pointer select-none px-6 text-left"
                                >
                                    province
                                </th>
                                <th
                                    v-if="finish"
                                    class="py-3 text-xs cursor-pointer select-none px-6 text-left"
                                >
                                    commune
                                </th>
                                <th
                                    v-for="(question, index) in questions"
                                    :key="index"
                                    class="py-3 text-xs cursor-pointer select-none px-6 text-center"
                                >
                                    {{ question.libelle }}
                                </th>
                            </tr>
                        </thead>
                        <tbody
                            class="text-gray-600 text-sm font-light overflow-y-auto"
                        >
                            <tr
                                v-if="questionAndAnswer.length === 0 && finish"
                                class="border-b text-lg border-gray-200"
                            >
                                <td
                                    class="py-3 px-6 text-center capitalize"
                                    colspan="10"
                                >
                                    aucune membre
                                </td>
                            </tr>
                            <tr
                                v-if="!finish"
                                class="border-b text-lg border-gray-200"
                            >
                                <td
                                    class="py-3 px-6 text-center capitalize"
                                    colspan="10"
                                >
                                    <i
                                        class="fa fa-spinner-third animate-spin"
                                        aria-hidden="true"
                                    ></i>
                                </td>
                            </tr>
                            <tr
                                v-if="questionAndAnswer.length > 0"
                                v-for="(anquite, index) in questionAndAnswer"
                                :key="index"
                                @click="selectAnquite(anquite)"
                                class="border-b w-full bg-white select-none text-xs hover:bg-gray-50 capitalize border-gray-200"
                                :class="{ ' bg-gray-100 ': index % 2 != 0 }"
                            >
                                <td class="py-3 px-6 text-center">
                                    <span class="font-medium">
                                        <input
                                            type="checkbox"
                                            :checked="
                                                anquite == selectedAnquite
                                            "
                                            class="transition duration-300 transform ease-in-out rounded shadow-sm focus:border-pink-500 focus:ring-2 focus:ring-pink-500 focus:outline-none focus:ring-opacity-50 focus:ring-offset-0 disabled:opacity-50 disabled:cursor-not-allowed text-pink-500 border-gray-300"
                                            :class="{
                                                ' rotate-180 ':
                                                    anquite != selectedAnquite,
                                            }"
                                        />
                                    </span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span class="font-medium">
                                        {{ index + 1 }}
                                    </span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <span vif class="font-medium">
                                        {{ anquite.region }}
                                    </span>
                                </td>

                                <td class="py-3 px-6 text-center">
                                    <span vif class="font-medium">
                                        {{ anquite.province }}
                                    </span>
                                </td>

                                <td class="py-3 px-6 text-center">
                                    <span vif class="font-medium">
                                        {{ anquite.commune.libelle }}
                                    </span>
                                </td>

                                <td
                                    v-for="(question,
                                    index) in anquite.questions"
                                    :key="index"
                                    class="py-3 px-6 text-center select-none"
                                >
                                    <span
                                        class="font-medium"
                                        :class="{
                                            'text-gray-400':
                                                question.reponse == null,
                                        }"
                                    >
                                        <!--      {{ reponse.value ||reponse.reponse || "NaN" }} -->
                                        {{ question.reponse || "NaN" }}
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import DownloadDataList from "./DownloadDataList";
import EditAnquite from "./EditAnquite";

import Swal from "sweetalert2";

export default {
    components: {
        DownloadDataList,
        EditAnquite,
    },
    data() {
        return {
            questions: [],
            questionAndAnswer: [],
            finish: false,
            selectedAnquite: null,
        };
    },
    methods: {
        getAnquites() {
            axios
                .get(this.route("anquites.index"))
                .then((response) => {
                    this.finish = true;
                    this.questionAndAnswer = response.data.anquites;
                    this.questions = response.data.questions;
                    _.forEach(this.questionAndAnswer, function (anquite) {
                        _.forEach(anquite.questions, function (question) {
                            question.reponse = null;
                            question.option_id = null;
                            question.anquite_id = anquite.id;
                            _.forEach(anquite.reponses, function (reponse) {
                                if (reponse.question_id == question.id) {
                                    question.reponse = reponse.value;
                                    question.option_id = reponse.option_id;
                                }
                            });
                        });
                    });
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        selectAnquite(anquite) {
            this.selectedAnquite =
                this.selectedAnquite == null || this.selectedAnquite != anquite
                    ? anquite
                    : null;
        },
        deleteAnquite() {
            Swal.fire({
                title: "Êtes-vous sûr?",
                text: "Une fois que vous supprimez, vous perdrez toutes les informations!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#888888",
                cancelButtonText: "Annuler",
                confirmButtonText: "Supprimer",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.questionAndAnswer = _.without(
                        this.questionAndAnswer,
                        this.selectedAnquite
                    );

                    this.selectedAnquite = null;
                    Swal.fire(
                        "Supprimé!",
                        "Votre enquête a été supprimé.",
                        "success"
                    );
                }
            });
        },
    },
    mounted() {
        this.getAnquites();
    },
    computed: {
        canDelete() {
            return _.findLast(this.$page.props.user.all_teams, (team) => {
                return team.id == this.$page.props.user.current_team.id;
            }).membership.role == "admin"
                ? true
                : false;
        },
    },
};
</script>
