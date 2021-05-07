export const ChomageData ={ 
  type: "pie",
  data: {
    labels: ["fon", "chom","NAN"],
    datasets: [
      {
        
        data: [40, 29,23],
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(54, 162, 235)',
          '#F4F4F4F4'
        ],
        borderWidth: 2,
        pointRadius: 5,
        pointBorderColor: 'rgb(0, 0, 0)'

      },
      
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
    
  }

};

export default ChomageData;