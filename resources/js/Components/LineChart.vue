<!-- Styles -->
<script setup>
const props = defineProps({
  count: Array,
  timeperiod: Array,

})


const options = {
  chart: {
    id: 'vuechart'
  },
  yaxis: {
    title: {
      style: {
        fontWeight: 600
      }
    },
  },
  xaxis: {
    categories: props.timeperiod,
  }
}
const series = [{
  name: 'series-1',
  data: props.count,
}]
</script>
<template>
  <div class="container">
    <div class="row text-center mt-2">
      <div class="col-12">
        <a href="/dashboard/last%20week">last week </a>
        <a href="/dashboard/last%20year">last year</a>
      </div>
    </div>
    <div class="row justify-content-center">
      <div id="chart" style="min-height: 480px;">
        <apexchart width="1000" type="line" :options="options" :series="series"></apexchart>
      </div>
    </div>
  </div>
</template>    