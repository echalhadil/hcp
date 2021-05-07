export const chartConfig = {
  
  type: "line",
  data: {
    labels: ["01/12", "02/12", "03/12", "04/12", "05/12", "06/12", "07/12", "08/12"],
    datasets: [
      {
        label:"votre Equipe",
        data: [400, 29, 11, 1024, 40, 1102, 2102, 293],
        backgroundColor: "rgba(255,255,255,0) ",
        borderColor: "#11495d",
        borderWidth: 2,
        pointStyle: 'rectRot',
        pointRadius: 5,
        pointBorderColor: 'rgb(261, 24, 0)'

      }
  
    ]
  },
  options: {
    plugins: {
      legend: {
        labels: {
          usePointStyle: true,
        },
      }
    },
    responsive: true,
    lineTension: 1,
    scales: {
      yAxes: [
        {
          ticks: {
            beginAtZero: true,
            padding: 20
          }
        }
      ],
      xAxes: [
        {
          ticks: {
            beginAtZero: true,
            padding: 20
          }
        }
      ]
    }
  }

};

export default chartConfig;