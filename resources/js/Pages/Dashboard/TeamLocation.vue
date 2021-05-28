<template>
    <div
        class="bg-white dark:bg-gray-400 dark:text-gray-200 text-gray-500 p-3 grid grid-cols-2 md:col-span-2 rounded shadow text-sm"
    >
        <p class="col-span-2 px-3 text-base capitalize">
            location de votre equipe
        </p>
        <div class="px-3 py-1">
            <p class="capitalize pb-1">region</p>

            <select
                v-model="selectedregion"
                class="w-full rounded text-sm appearance-none form-select dark:bg-gray-400"
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

        <div class="px-3 py-1">
            <p class="capitalize pb-1">province</p>
            <select
                v-model="selectedprovince"
                class="w-full rounded text-sm appearance-none form-select dark:bg-gray-400"
                name=""
                id=""
            >
                <option
                    class="h-28 rounded-md"
                    v-for="(province, index) in provinces"
                    :key="index"
                    :value="province.id"
                >
                    {{ province.libelle }}
                </option>
            </select>
        </div>

        <div class="px-3 pb-1">
            <p class="capitalize pb-1">commune</p>
            <select
                v-model="selectedcommune"
                class="w-full rounded text-sm appearance-none dark:bg-gray-400 form-select"
                name=""
                id=""
            >
                <option
                    v-for="(commune, index) in communes"
                    :key="index"
                    :value="commune.id"
                >
                    {{ commune.libelle }}
                </option>
            </select>
        </div>

        <div class="px-3 pb-1 flex mt-auto">
            <button
                class="my-auto rounded bg-pink-700 dark:bg-gray-500 text-white dark:text-gray-100 p-2"
                @click="setlocation()"
                :disabled="!canchange"
                :class="{ ' opacity-50 ': !canchange }"
            >
                Enregistrer
            </button>
            <jet-action-message :on="message.visible" class="my-auto ml-3">
                {{ message.text }}.
            </jet-action-message>
        </div>
    </div>
</template>

<script>
import JetActionMessage from "@/Jetstream/ActionMessage";

export default {
    components: {
        JetActionMessage,
    },
    props: ["region", "province", "commune"],
    data() {
        return {
            selectedcommune: this.commune,
            selectedprovince: this.province,
            selectedregion: this.region,
            regions: [],
            provinces: [],
            communes: [],
            message: {
                text: "",
                visible: false,
            },
        };
    },

    methods: {
        getallregions() {
            axios
                .get(this.route("regions"))
                .then((response) => {
                    this.regions = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        getregionprovinces() {
            if (this.selectedregion) {
                var region_id = this.selectedregion;
                axios
                    .get(this.route("provinces", { region_id }))
                    .then((response) => {
                        this.provinces = response.data;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            }
        },
        getprovincecommunes() {
            if (this.selectedprovince) {
                var region_id = this.selectedregion;
                var province_id = this.selectedprovince;
                axios
                    .get(
                        this.route("communes", {
                            region_id,
                            province_id,
                        })
                    )
                    .then((response) => {
                        this.communes = response.data;
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            }
        },
        setlocation() {
            if (this.selectedcommune != "") {
                axios
                    .post(this.route("setlocation"), {
                        commune_id: this.selectedcommune,
                    })
                    .then((response) => {
                        this.message.text = "Succès";
                        this.message.visible = true;
                        setTimeout(() => {
                            this.message.visible = false;
                        }, 500);
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            }
        },
    },
    watch: {
        selectedprovince() {
            if (this.selectedprovince != "") {
                this.selectedcommune = "";
                this.getprovincecommunes();
            }
        },

        selectedregion() {
            if (this.selectedregion != "") {
                this.selectedprovince = "";
                this.selectedcommune = "";
                this.communes = [];

                this.getregionprovinces();
            }
        },
    },
    computed: {
        canchange() {
            return this.selectedcommune == "" ||
                (this.selectedcommune == this.commune &&
                    this.selectedprovince == this.province &&
                    this.selectedregion == this.region)
                ? false
                : true;
        },
    },

    mounted() {
        this.getallregions();
        this.getregionprovinces();
        this.getprovincecommunes();
    },
};
</script>
