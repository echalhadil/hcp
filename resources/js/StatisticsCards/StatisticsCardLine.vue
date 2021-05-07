<template>
    <canvas id="pie-chart" class="w-full"></canvas>
    
</template>
<script>
// import  Chart from 'chart.js'

import chartConfig from "./chartConfig.js";
import Chart from 'chart.js/auto';

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
                        
                    var border_gradient = ctx.createLinearGradient(
                        0,
                        0,
                        0,
                        230
                    );
                    border_gradient.addColorStop(1, "#831843");
                    border_gradient.addColorStop(0, "#f9a8d4");

                    var border_gradient1 = ctx.createLinearGradient(
                        0,
                        0,
                        0,
                        320
                    );
                    border_gradient1.addColorStop(1, "#231843");
                    border_gradient1.addColorStop(0, "#14a8d4");

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
                                    borderColor: border_gradient,
                                    borderWidth: 2,
                                    pointStyle: "rectRot",
                                    pointRadius: 5,
                                    pointBorderColor: "rgb(261, 24, 0)",
                                    // fill: true,
                                },
                                {
                                    label: "moyenne d'equipes",
                                    data: _.toArray(
                                        _.mapValues(this.teamdata, "avg")
                                    ),
                                    backgroundColor: "rgba(221, 232, 119,0.2) ",
                                    borderColor: border_gradient1,
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
                                    position: "top",
                                },
                                title: {
                                    display: true,
                                    text: "Nombre de enqutes",
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
