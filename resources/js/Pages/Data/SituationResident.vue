<template>
    <div class="p-3 bg-white rounded shadow">
        <canvas :id="id" class="w-full"></canvas>
    </div>
</template>
<script>
import Chart from "chart.js/auto";

export default {
    components: {},
    data() {
        return {
            statistics: [],
            id: "residentstatistics",
            chartType: "pie",
            labels: [],
            dataset: [],
        };
    },
    methods: {
        getresidentstatistics() {
            axios
                .get(this.route("residentstatistics"))
                .then((response) => {
                    this.statistics = response.data;
                    this.labels = _.toArray(
                        _.mapValues(this.statistics, "libelle")
                    );

                    this.dataset = _.toArray(
                        _.mapValues(this.statistics, "percent")
                    );
                    console.log(this.dataset);
                    console.log(this.labels);
                   })
                .catch((err) => {
                    console.log(err);
                });
        },

        initializeChart() {
            const ctx = document.getElementById(this.id);
            new Chart(ctx, {
                type: this.chartType,

                data: {
                    labels: (_.toArray(
                        _.mapValues(this.statistics, "libelle")
                    )),
                    datasets: [
                        {
                            data: [400, 29, 11, 1024, 40, 1102],
                            backgroundColor: "rgba(255,255,255,0) ",
                            borderColor: "#11495d",
                            borderWidth: 2,
                            pointStyle: "rectRot",
                            pointRadius: 5,
                            pointBorderColor: "rgb(261, 24, 0)",
                        },
                    ],
                },
            });
        },
    },
    mounted() {
        this.getresidentstatistics();

        this.initializeChart();
    },
};
</script>
