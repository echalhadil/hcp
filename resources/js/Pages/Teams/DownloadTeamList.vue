<template>
    <div>
        <div
            @click="show = true"
            class="cursor-pointer px-2 py-1 border rounded border-pink-500 hover:bg-pink-100 text-pink-500 capitalize"
        >
            <i class="fal fa-download" aria-hidden="true"></i>
        </div>

        <jet-dialog-modal :show="show" @close="show = false">
            <template #title>Sélectionner le format </template>

            <template #content>
                <div class="flex justify-around">
                    <div
                        @click="selectFormat('xlsx')"
                        class="cursor-pointer hover:bg-gray-50 flex p-2 rounded border w-1/3"
                        :class="{
                            'text-pink-600 border-pink-600 border-2  ':
                                fileformat === 'xlsx',
                        }"
                    >
                        <i
                            class="fal text-4xl fa-file-excel"
                            aria-hidden="true"
                        ></i>
                        <p class="my-auto ml-2 select-none">Fichier EXCEL</p>
                        <i
                            v-if="fileformat === 'xlsx'"
                            class="fas fa-check-circle m-auto mr-0"
                        ></i>
                    </div>

                    

                    <div
                        @click="selectFormat('csv')"
                        class="cursor-pointer hover:bg-gray-50 flex p-2 rounded border w-1/3"
                        :class="{
                            'text-pink-500 border-pink-600 border-2  ':
                                fileformat === 'csv',
                        }"
                    >
                        <i
                            class="fal text-4xl fa-file-csv"
                            aria-hidden="true"
                        ></i>
                        <p class="my-auto ml-2  select-none">Fichier CSV</p>
                        <i
                            v-if="fileformat === 'csv'"
                            class="fas fa-check-circle m-auto mr-0"
                        ></i>
                    </div>
                </div>
            </template>

            <template #footer>
                <jet-secondary-button
                    class="cursor-pointer"
                    @click="show = false"
                >
                    annuler
                </jet-secondary-button>

                <a
                    class="cursor-pointer rounded ml-2 p-2 border border-pink-600 bg-pink-600 text-white"
                    :class="{
                        ' opacity-20 cursor-not-allowed ': fileformat === '',
                    }"
                    :href="(fileformat === '')? '#':route('exportmembers',fileformat)"
                    role="button"
                >
                    télécharger
                </a>
            </template>
        </jet-dialog-modal>
    </div>
</template>
<script>
import JetDialogModal from "@/Jetstream/DialogModal";

export default {
    components: {
        JetDialogModal,
    },
    data() {
        return {
            show: false,
            fileformat: "",
        };
    },
    methods: {
        selectFormat(format) {
            this.fileformat = this.fileformat === format ? "" : format;
        },
       
    },
};
</script>
