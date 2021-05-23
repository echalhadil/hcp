<!-- Add Team Member -->

<template>
    <div>
        <button
            class="px-2 py-1 rounded bg-pink-500 text-white border-pink-500 focus:border-pink-500 focus:ring-2 focus:ring-pink-500 focus:outline-none focus:ring-opacity-50 focus:ring-offset-0 disabled:opacity-50"
            :disabled="selectedAnquite == null"
            @click="show = true"
            :class="{ 'cursor-not-allowed': selectedAnquite == null }"
        >
            Éditer
        </button>
        <jet-modal :show="show" @close="show = false">
            <div class="px-6 py-4 dark:bg-gray-400">
                <div class="text-lg dark:text-gray-200">
                    <div>Ajouter un membre de l'équipe</div>
                </div>

                <div class="mt-4">
                    <div class="text-sm text-gray-500 dark:text-gray-100">
                        Ajoutez un nouveau membre de l'équipe à votre équipe, ce
                        qui lui permet de collaborer avec vous.
                    </div>
                </div>
                <div class="mt-4 overflow-y-auto p-2 md:p-0 height">
                    <div
                        class="text-sm grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-500 dark:text-gray-100"
                    >
                        <div
                            v-for="(question, index) in anquite.questions"
                            :key="index"
                            class="mt-4"
                        >
                            <jet-label
                                :for="question.libelle"
                                :v-model="question.libelle"
                            />
                            <!-- if it have options -->
                            <select
                                v-if="question.has_option"
                                v-model="question.option_id"
                                required
                                class="form-select mt-1 rounded border-pink-500 block w-full"
                            >
                                <option
                                    v-for="(option, index) in question.options"
                                    :key="index"
                                    :value="option.id"
                                >
                                    {{ option.libelle }}
                                </option>
                            </select>
                            <!-- else-->
                            <jet-input
                                v-else
                                type="text"
                                class="mt-1 block w-full"
                                required
                                v-model="question.reponse"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-6 py-4 bg-gray-100 dark:bg-gray-400 text-right">
                <div class="flex flex-row justify-end">
                    <transition
                        leave-active-class="transition ease-in duration-1000"
                        leave-from-class="opacity-100"
                        leave-to-class="opacity-0"
                    >
                        <div
                            v-show="success"
                            class="text-sm my-auto mr-2 text-gray-600"
                        >
                            Enregistré.
                        </div>
                    </transition>
                    <jet-secondary-button @click="show = false"
                        >anuller</jet-secondary-button
                    >
                    <jet-button
                        type="submit"
                        class="ml-2"
                        :disabled="prossessing"
                        :class="{ 'opacity-25': prossessing }"
                        @click="updateAnquite"
                        >mettre à jour</jet-button
                    >
                </div>
            </div>
        </jet-modal>
    </div>
</template>
<script>
import JetModal from "@/Jetstream/Modal";
import JetLabel from "@/Jetstream/Label";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetButton from "@/Jetstream/Button";
import JetDangerButton from "@/Jetstream/DangerButton";
import JetSecondaryButton from "@/Jetstream/SecondaryButton";
import JetActionMessage from "@/Jetstream/ActionMessage";

export default {
    components: {
        JetModal,
        JetLabel,
        JetInput,
        JetInputError,
        JetButton,
        JetDangerButton,
        JetSecondaryButton,
        JetActionMessage,
    },
    props: ["selectedAnquite"],

    data() {
        return {
            show: false,
            anquite: {},
            success: false,
            prossessing: false,
        };
    },
    methods: {
        updateAnquite() {
            this.prossessing = true;
            axios
                .put(
                    route("anquites.update", this.selectedAnquite.id),
                    this.anquite.questions
                )
                .then((response) => {
                    (this.selectedAnquite.questions = response.data),
                    _.forEach(
                        this.selectedAnquite.questions,
                        (question) => {
                            _.forEach(question.options, (option) => {
                                if (option.id == question.option_id)
                                    question.reponse = option.libelle;
                            });
                        }
                    );
                    (this.anquite.questions = response.data),
                    (this.success = true),
                    (this.prossessing = false),
                        setTimeout(() => {
                            this.success = false;
                        }, 1000);
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
    watch: {
        show() {
            if (this.show)
                this.selectedAnquite.questions = _.forEach(
                    this.selectedAnquite.questions,
                    (question) => {
                        if (question.has_option) {
                            let options = null;
                            axios
                                .get(this.route("options", question.id))
                                .then((reponse) => {
                                    question.options = reponse.data;
                                })
                                .catch((err) => {
                                    console.log(err);
                                });
                        }
                    }
                );
            // var a = this.selectedAnquite.slice();
            this.anquite = Object.assign({}, this.selectedAnquite);
            // this.anquite = JSON.parse(JSON.stringify(this.selectedAnquite));
        },
    },

    computed: {},
};
</script>

<style scope>
.height {
    height: calc(100vh - 15.6rem);
}
</style>
