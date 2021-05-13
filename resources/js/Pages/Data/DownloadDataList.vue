<template>
    <div>
        <div
            @click="show = true"
            class="cursor-pointer p-2 border rounded border-pink-500 hover:bg-pink-100 text-pink-500 capitalize"
        >
            <i class="fal fa-download" aria-hidden="true"></i>
        </div>

        <jet-dialog-modal :show="show" @close="show = false">
            <template #title> Selectionner le format </template>

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
                        <p class="my-auto ml-2 select-none">Fichier CSV</p>
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

                <button
                    class="cursor-pointer rounded ml-2 p-2 border border-pink-600 bg-pink-600 text-white"
                    :class="{
                        ' opacity-20 cursor-not-allowed ': fileformat === '',
                    }"
                    role="button"
                    :disabled="fileformat === ''"
                    @click="createXLSXTableDemo()"
                >
                    télécharger
                </button>
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
            // @click="exportTableToExcel('table', 'data')"
        };
    },
    methods: {
        selectFormat(format) {
            this.fileformat = this.fileformat === format ? "" : format;
        },

        exportTableToExcel(tableID, filename = "") {
            var downloadLink;
            var dataType = "application/vnd.ms-excel";
            // var dataType = "application/csv;charset=utf-8";

            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, "%20");

            // Specify file name
            filename = filename ? filename + ".xls" : "excel_data.xls";

            // Create download link element
            downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if (navigator.msSaveOrOpenBlob) {
                var blob = new Blob(["\ufeff", tableHTML], {
                    type: dataType,
                });
                navigator.msSaveOrOpenBlob(blob, filename);
            } else {
                // Create a link to the file
                downloadLink.href = "data:" + dataType + ", " + tableHTML;

                // Setting the file name
                downloadLink.download = filename;

                //triggering the function
                downloadLink.click();
            }
        },

        createXLSXTableDemo() {
            // var fileName = "data";
            // var fileName = (Math.random() * 1e32).toString(36);
            // var table = document.getElementById("table");
            // var wb = xlsx.utils.table_to_book(table, { sheet: "data" });
            return xlsx.writeFile(
                xlsx.utils.table_to_book(document.getElementById("table"), {
                    sheet: "data",
                }),
                (Math.random() * 1e32).toString(36) + "." + this.fileformat
            );
        },
    },
};
</script>
