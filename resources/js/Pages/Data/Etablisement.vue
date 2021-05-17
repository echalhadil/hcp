                        
<template>
    <div class="p-3 bg-white rounded shadow">
        <div class="transform -translate-y-1/2 top-1/2 relative">
            <p class=" text-center text-gray-500 text-sm p-2 capitalize ">etablisement</p>
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
            id: "etablisement",
            chartType: "pie",
        };
    },
    methods: {
        getresidentstatistics() {
            axios
                
                .get(this.route("questionstatistics",17))   
                // .get(this.route("etablisementstatistics"))
                .then((response) => {
                    
                    this.statistics = response.data;
                    let rest =
                        100 -
                        _.sum(
                            _.toArray(_.mapValues(this.statistics, "percent"))
                        );

                    this.statistics.push({
                        libelle:'NaN',
                        percent:rest
                    });

                    console.log(rest);
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
                                        "rgb(215, 99, 132)",
                                        "rgb(140, 212, 135)",
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
