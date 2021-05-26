<template>
    <div class="p-3 bg-white rounded shadow">
        <div class="transform -translate-y-1/2 top-1/2 relative">
            <p class="text-center text-gray-500 text-sm p-2 capitalize">
                pays de nationalite
            </p>
            <canvas :id="id" class="w-full"></canvas>
        </div>
    </div>
</template>
<script>
import Chart from "chart.js/auto";

export default {
    components: {},
    data() {
        return {
            statistics: [],
            id: "paynationalite",
            chartType: "pie",
        };
    },
    methods: {
        getresidentstatistics() {
            axios
                // .get(this.route("nationalitestatistics"))
                // .get(this.route("questionstatistics", 6))
                 .get(
                    this.route("spesq", [
                        6,
                        this.$page.props.selectedregion,
                        this.$page.props.selectedprovince,
                        this.$page.props.selectedcommune,
                    ])
                )
                .then((response) => {
                    this.statistics = response.data;
                    let rest =
                        100 -
                        _.sum(
                            _.toArray(_.mapValues(this.statistics, "percent"))
                        );

                    this.statistics.push({
                        libelle: "NaN",
                        percent: rest,
                    });

                    const ctx = document.getElementById(this.id);
                    new Chart(ctx, {
                        type: this.chartType,

                        data: {
                            labels: _.toArray(
                                _.mapValues(this.statistics, "libelle")
                            ),
                            datasets: [
                                {
                                    data: _.toArray(
                                        _.mapValues(this.statistics, "percent")
                                    ),
                                    backgroundColor: [
                                        "#867ae9",
                                        "#c449c2",
                                        "#F4F4F4",
                                    ],
                                    borderWidth: 2,
                                    pointRadius: 5,
                                    pointBorderColor: "rgb(0, 0, 0)",
                                },
                            ],
                        },
                        options: {
                            plugins: {
                                legend: {
                                    position: "bottom",
                                },
                                // title: {
                                //     display: true,
                                //     text: "pays de nationalite",
                                //     fullSize: true,
                                //     position: "top",
                                // },
                            },
                            responsive: true,
                            lineTension: 1,
                        },
                    });
                })
                .catch((err) => {
                    console.log(err);
                });
        },

        // initializeChart() {},
    },
    mounted() {
        this.getresidentstatistics();

        // this.initializeChart();
    },
};
</script>
