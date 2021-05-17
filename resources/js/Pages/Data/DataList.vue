<template>
    <div class="p-5 bg-white w-full mt-4 rounded shadow">
        <div class="flex mr-auto w-full">
            <div class="flex relative ml-9 my-auto"></div>

            <div class="flex ml-auto my-auto" v-if="questionAndAnswer.length > 0">
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
                                    v-for="(question, index) in questions"
                                    :key="index"
                                    class="py-3 text-xs cursor-pointer select-none px-6 text-left"
                                >
                                    {{ question.libelle }}
                                </th>
                            </tr>
                        </thead>
                        <tbody
                            class="text-gray-600 text-sm font-light overflow-y-auto"
                        >
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
                                v-for="(anquite, index) in questionAndAnswer"
                                :key="index"
                                class="border-b w-full bg-white text-xs hover:bg-gray-50 capitalize border-gray-200"
                                :class="{ ' bg-gray-100 ': index % 2 != 0 }"
                            >
                                <td
                                    v-for="(question,
                                    index) in anquite.questions"
                                    :key="index"
                                    class="py-3 px-6 text-center"
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

export default {
    components: {
        DownloadDataList,
    },
    data() {
        return {
            questions: [],
            questionAndAnswer: [],
        };
    },
    methods: {
        getAnquites() {
            axios
                .get(this.route("anquites.index"))
                .then((response) => {
                    this.questionAndAnswer = response.data.anquites;
                    this.questions = response.data.questions;
                    _.forEach(this.questionAndAnswer, function (anquite) {
                        _.forEach(anquite.questions, function (question) {
                            question.reponse = null;
                            question.anquite_id = anquite.id;
                            _.forEach(anquite.reponses, function (reponse) {
                                if (reponse.question_id == question.id) {
                                    question.reponse = reponse.value;
                                }
                            });
                        });
                    });
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
    mounted() {
        this.getAnquites();
    },
};
</script>
