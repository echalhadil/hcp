<template>
    <div class="p-2 transform relative top-1/2 -translate-y-1/2">
        <p class="text-center text-gray-500 p-2">Nombre De Questionnaires</p>
        <div class=" "></div>
        <canvas id="pie-chart" class="w-full"></canvas>
    </div>
</template>
<script>
// import  Chart from 'chart.js'

import chartConfig from "./chartConfig.js";
import Chart from "chart.js/auto";

export default {
    // props: ["teamdata"],
    data() {
        return {
            chartConfig: chartConfig,
            teamdata: [],
            days: [],
            total: [],
        };
    },
    methods: {
        getanquiteteam() {
            axios
                .get("/anquiteteam")
                .then((response) => {
                    this.teamdata = response.data;
                    const ctx = document
                        .getElementById("pie-chart")
                        .getContext("2d");

                    var mychart = new Chart(ctx, {
                        type: "line",
                        // data:this.teamdata,
                        data: {
                            labels: _.toArray(
                                _.mapValues(this.teamdata, "day")
                            ),
                            datasets: [
                                {
                                    label: "votre Equipe",
                                    data: _.toArray(
                                        _.mapValues(this.teamdata, "total")
                                    ),
                                    // backgroundColor:background_gradient,
                                    // borderColor: border_gradient,
                                    borderColor: "rgb(75, 192, 192)",
                                    tension: 0.5,
                                    borderWidth: 2,
                                    pointStyle: "rectRot",
                                    pointRadius: 5,
                                    pointBorderColor: "rgb(7, 192, 192)",
                                    // fill: true,
                                },
                                {
                                    label: "moyenne d'equipes",
                                    data: _.toArray(
                                        _.mapValues(this.teamdata, "avg")
                                    ),
                                    backgroundColor: "rgba(221, 232, 119,0.2) ",
                                    tension: 0.5,
                                    borderColor: "#831843",
                                    borderWidth: 2,
                                    pointStyle: "circle",
                                    pointRadius: 5,
                                    pointBorderColor: "rgb(261, 24, 0)",
                                    // fill: true,
                                },
                            ],
                        },
                        options: {
                            interaction: {},
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: "bottom",
                                },
                            },
                            scales: {
                                x: {
                                    display: true,
                                    title: {
                                        display: true,
                                        text: "Jours",
                                    },
                                },
                                y: {
                                    display: true,
                                    title: {
                                        display: true,
                                        text: "Nombre",
                                    },
                                    max:
                                        _.max([
                                            _.max(
                                                _.toArray(
                                                    _.mapValues(
                                                        this.teamdata,
                                                        "avg"
                                                    )
                                                )
                                            ),
                                            _.max(
                                                _.toArray(
                                                    _.mapValues(
                                                        this.teamdata,
                                                        "total"
                                                    )
                                                )
                                            ),
                                        ]) + 2,
                                    min: 0,
                                },
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
        this.getanquiteteam();
    },
};
</script>
