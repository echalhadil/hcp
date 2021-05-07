<template>

        <canvas id="planet-chart"  class="w-full"></canvas>

</template>
<script>
import planetChartData from './planet-data1.js'


export default {
  data() {
    return {
      planetChartData: planetChartData
    }
  },
  mounted() {
    const ctx = document.getElementById('planet-chart');
    new Chart(ctx, this.planetChartData);
  }
}
</script>
