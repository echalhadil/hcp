<template>
    <div
        class="bg-white p-3 grid grid-cols-2 md:col-span-2 rounded shadow text-sm"
    >
        <p class="col-span-2 px-3 text-base text-gray-500 capitalize">
            location de votre equipe
        </p>
        <div class="px-3 py-1">
            <p class="capitalize text-gray-500 pb-1">region</p>

            <select
                v-model="selectedregion"
                class="w-full rounded text-sm appearance-none form-select"
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
            <p class="capitalize text-gray-500 pb-1">province</p>
            <select
                v-model="selectedprovince"
                class="w-full rounded text-sm appearance-none form-select"
                name=""
                id=""
            >
                <option
                    class="h-28 rounded-md hover:bg-indigo-400"
                    v-for="(province, index) in provinces"
                    :key="index"
                    :value="province.id"
                >
                    {{ province.libelle }}
                </option>
            </select>
        </div>

        <div class="px-3 pb-1">
            <p class="capitalize text-gray-500 pb-1">commune</p>
            <select
                v-model="selectedcommune"
                class="w-full rounded text-sm appearance-none form-select"
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
                class="my-auto rounded bg-pink-700 text-white p-2"
                @click="setlocation()"
                :disabled="!canchange"
                :class="{ ' opacity-50 ': !canchange }"
            >
                Enregistrer
            </button>
            <p
                v-if="message.visible"
                class="font-semibold text-green-400 ml-auto mt-auto capitalize"
            >
                {{ message.text }}.
            </p>
        </div>
    </div>
</template>

<script>
export default {
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
                .get("/regions")
                .then((response) => {
                    this.regions = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        getregionprovinces() {
            axios
                .get("/regions/" + this.selectedregion + "/provinces")
                .then((response) => {
                    this.provinces = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        getprovincecommunes() {
            axios
                .get(
                    "/regions/" +
                        this.selectedregion +
                        "/provinces/" +
                        this.selectedprovince +
                        "/communes"
                )
                .then((response) => {
                    this.communes = response.data;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        setlocation() {
            if (this.selectedcommune != "") {
                axios
                    .post(this.route("setlocation"), {
                        commune_id: this.selectedcommune,
                    })
                    .then((response) => {
                        //    (this.commune = this.selectedcommune),
                        //     (this.province = this.selectedprovince),
                        //     (this.region = this.selectedregion),
                        this.message = { text: " success ", visble: true };

                        console.log(this.message)

                        // setTimeout(15000, (this.message = {text:"",visible:false}));
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
            return this.selectedcommune === "" ||
                (this.selectedcommune === this.commune &&
                    this.selectedprovince === this.province &&
                    this.selectedregion === this.region)
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
