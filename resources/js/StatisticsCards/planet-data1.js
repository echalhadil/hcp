export const planetChartData = {
  type: "doughnut",
  data: {
    labels: [ "Female", "Male"],
    datasets: [
      {
       
        data: [40, 50],
        backgroundColor: [
          'rgb(255, 99, 132)',
          'rgb(54, 162, 235)'
        ],
        hoverOffset:3
        
      }
    ]
  },
  options: {
    responsive: true,
    lineTension: 1,
    
  }
};

export default planetChartData;