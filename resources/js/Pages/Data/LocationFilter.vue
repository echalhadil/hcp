<template>
    <div
        class="grid md:grid-cols-4 grid-cols-2 capitalize bg-white rounded shadow text-sm text-gray-500 gap-2 p-3"
    >
        <div class="md:col-span-4 col-span-2 text-left text-base">
            <p>Location</p>
        </div>
        <div class="">
            <p>region</p>

            <select
                class="w-full rounded text-sm appearance-none form-select dark:bg-gray-400"
                name=""
                id=""
                v-model="selectedregion"
            >
                <option :value="0">(tout)</option>
                <option
                    v-for="(region, index) in regions"
                    :key="index"
                    :value="region.id"
                >
                    {{ region.libelle }}
                </option>
            </select>
        </div>
        <div class="">
            <p>province</p>

            <select
                class="w-full rounded text-sm appearance-none form-select dark:bg-gray-400"
                name=""
                id=""
                v-model="selectedprovince"
                :disabled="selectedregion == 0"
            >
                <option :value="0">(tout)</option>

                <option
                    v-for="(province, index) in provinces"
                    :key="index"
                    :value="province.id"
                >
                    {{ province.libelle }}
                </option>
            </select>
        </div>
        <div class="">
            <p>commune</p>

            <select
                class="w-full rounded text-sm appearance-none form-select dark:bg-gray-400"
                name=""
                id=""
                v-model="selectedcommune"
                :disabled="selectedprovince == 0"
            >
                <option :value="0">(tout)</option>

                <option
                    v-for="(commune, index) in communes"
                    :key="index"
                    :value="commune.id"
                >
                    {{ commune.libelle }}
                </option>
            </select>
        </div>
        <div class="">
            <p class="text-white select-none">g</p>
            <inertia-link
                :href="
                    route('actualiser', [
                        selectedregion,
                        selectedprovince,
                        selectedcommune,
                    ])
                "
            >
                <button
                    class="w-full rounded text-sm focus:border-pink-500 focus:ring-2 focus:ring-pink-500 bg-pink-600 text-white px-2 py-2 uppercase form-select dark:bg-gray-400"
                >
                    actualiser
                </button>
            </inertia-link>
        </div>
    </div>
</template>
<script>
export default {
    // props: ["selectedcommune", "selectedprovince", "selectedregion"],
    data() {
        return {
            regions: [],
            provinces: [],
            communes: [],
            selectedcommune: this.$page.props.selectedcommune,
            selectedprovince: this.$page.props.selectedprovince,
            selectedregion: this.$page.props.selectedregion,
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

        // actualiser() {
        //     axios
        //         .post(
        //             this.route(
        //                 "actualiser",
        //                 [
        //                     this.selectedregion,
        //                     this.selectedprovince,
        //                     this.selectedcommune,
        //                 ],
        //                 {}
        //             )
        //         )
        //         .then((result) => {
        //             console.log(result)
        //         })
        //         .catch((err) => {});
        // },
    },
    watch: {
        selectedprovince() {
            // if (this.selectedprovince != 0) {
            this.selectedcommune = 0;
            this.getprovincecommunes();
            // }
        },

        selectedregion() {
            // if (this.selectedregion != 0) {
            this.selectedprovince = 0;
            this.selectedcommune = 0;
            this.communes = [];

            this.getregionprovinces();
            // }
        },
    },

    mounted() {
        this.getallregions();
        this.getregionprovinces();
        this.getprovincecommunes();
    },
};
</script>
