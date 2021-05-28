<template>
    <div>
    {{statistics}}
        <canvas :id="id" class="w-full"></canvas>
    </div>
</template>

<script>
// import Chart from "chart.js/auto";
// import zingchart from "zingchart";
// to import the pareto chart module
import moment from "moment";
import ApexCharts from "apexcharts";
export default {
    components: {
        ApexCharts,
    },
    data() {
        return {
            id: "pyramid",
            statistics: [],
        };
    },
    methods: {
      getStatics(){
        axios.get(this.route('agepyramid'))
        .then(reponse =>{
         this.statistics = reponse.data

         _.forEach(this.statistics,(anquite)=>{
           _.forEach(anquite,(sexe)=>{
             sexe.age = moment(sexe.age,"dd-mm-YYYY").fromNow(true); 
             sexe.age  = sexe.age.replace(' years','')
             let min = 0 ;
             let max = 5 ;
         })
         })
        })
        .catch(err =>{

        })
      }
    },
    mounted(){
      this.getStatics()
    }
};
</script>
