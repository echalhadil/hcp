<template>
    <div class="p-3 bg-white rounded shadow">
        <div class="transform -translate-y-1/2 top-1/2 relative">
            <p class="text-center text-gray-500 text-sm p-2">
                les personnes plus et mois de 18ans
            </p>
            <canvas :id="id" class="w-full h-screen"></canvas>
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
            id: "personneunderover18",
            chartType: "bar",
        };
    },
    methods: {
        getresidentstatistics() {
            axios
                .get(this.route("personneunderover18"))
                .then((response) => {
                    this.statistics = response.data;

                    const ctx = document.getElementById(this.id);
                    ctx.height = 310;
                    new Chart(ctx, {
                        type: this.chartType,
                        data: {
                            // labels: _.toArray(
                            //     _.mapValues(this.statistics, "question")
                            // ),
                            labels: ["moin de 18ans", "plus de 18ans"],
                            datasets: [
                                {
                                    data: _.toArray(
                                        _.mapValues(this.statistics, "nombre")
                                    ),
                                    backgroundColor: ["#867ae9", "#c449c2"],
                                },
                            ],
                        },
                        options: {
                            plugins: {
                                legend: {
                                    display: false,
                                    position: "bottom",
                                },
                            },
                            responsive: true,
                            lineTension: 1,
                            scales: {
                                xAxes: [
                                    {
                                        barPercentage: 0.1,
                                    },
                                ]
                            },
                        },
                    });
                })
                .catch((err) => {
                    console.log(err);
                });
        },
    },
    mounted() {
        this.getresidentstatistics();
    },
};
</script>
