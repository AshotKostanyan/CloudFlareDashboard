<!-- Styles
<script>
  import CanvasJSChart from '@canvasjs/vue-charts';
  export default {
    props: [
      'data1'
    ],
    data() {
      return {
        options: {
          animationEnabled: true,
          title:{
            text: "Monthly Reqests Info"
          },
          axisY:{
            prefix: "",
            tickLength: 0,
            includeZero: true
 
          },
          axisX: {
            valueFormatString: "MMM",
            interval: 1,
            intervalType: "month"
          },
          legend: {
            cursor:"pointer",
            itemclick : this.toggleDataSeries
          },
          toolTip: {
            shared: true
          },
          data: [{
            type: "stackedColumn",
            name: "Count",
            showInLegend: true,
            xValueFormatString: "MMM",
            dataPoints: [
              this.data1,
              { x: new Date(2021, 1, 1), y: 850 },
              { x: new Date(2021, 2, 1), y: 825 },
              { x: new Date(2021, 3, 1), y: 860 }
            ]
          },
          {
            type: "stackedColumn",
            name: "Food",
            showInLegend: true,
            yValueFormatString: "$##,###",
            xValueFormatString: "MMM",
            dataPoints: [
              { x: new Date(2021, 0, 1), y: 260 },
              { x: new Date(2021, 1, 1), y: 350 },
              { x: new Date(2021, 2, 1), y: 280 },
              { x: new Date(2021, 3, 1), y: 325 }
            ]
          },
          {
            type: "stackedColumn",
            name: "Utilities",
            showInLegend: true,
            yValueFormatString: "$##,###",
            xValueFormatString: "MMM",
            dataPoints: [
              { x: new Date(2021, 0, 1), y: 105 },
              { x: new Date(2021, 1, 1), y: 125 },
              { x: new Date(2021, 2, 1), y: 130 },
              { x: new Date(2021, 3, 1), y: 105 }
            ]
          },
          {
            type: "stackedColumn",
            name: "Fuel",
            showInLegend: true,
            yValueFormatString: "$##,###",
            xValueFormatString: "MMM",
            dataPoints: [
              { x: new Date(2021, 0, 1), y: 140 },
              { x: new Date(2021, 1, 1), y: 130 },
              { x: new Date(2021, 2, 1), y: 180 },
              { x: new Date(2021, 3, 1), y: 240 }
            ]
          }]
        },
        styleOptions: {
          width: "100%",
          height: "500px"
        }
      }
    },
    methods: {
      toggleDataSeries(e) {
        if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
          e.dataSeries.visible = false;
        }
        else {
          e.dataSeries.visible = true;
        }
        e.chart.render();
      }
    }
  }
</script>
<template>
  <CanvasJSChart :options="options" :styles="styleOptions"/>
</template>     -->
<template>
  <div ref="chartRef" :style="{ height, width }"></div>
</template>
<script lang="ts" setup>
  import { onMounted, ref, Ref } from 'vue';
  import { useECharts } from '@/';
  import { basicProps } from './props';

  defineProps({
    ...basicProps,
  });

  const chartRef = ref<HTMLDivElement | null>(null);
  const { setOptions } = useECharts(chartRef as Ref<HTMLDivElement>);
  onMounted(() => {
    setOptions({
      tooltip: {
        trigger: 'axis',
        axisPointer: {
          lineStyle: {
            width: 1,
            color: '#019680',
          },
        },
      },
      grid: { left: '1%', right: '1%', top: '2  %', bottom: 0, containLabel: true },
      xAxis: {
        type: 'category',
        data: [...new Array(12)].map((_item, index) => `${index + 1}月`),
      },
      yAxis: {
        type: 'value',
        max: 8000,
        splitNumber: 4,
      },
      series: [
        {
          data: [3000, 2000, 3333, 5000, 3200, 4200, 3200, 2100, 3000, 5100, 6000, 3200, 4800],
          type: 'bar',
          barMaxWidth: 80,
        },
      ],
    });
  });
</script>