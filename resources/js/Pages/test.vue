<!-- Styles -->
<script>
  import CanvasJSChart from '@canvasjs/vue-charts';
  export default {
    data() {
      return {
        options: {
          animationEnabled: true,
          title:{
            text: "Monthly Expenses"
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
            name: "Rent",
            showInLegend: true,
            yValueFormatString: "$##,###",
            xValueFormatString: "MMM",
            dataPoints: [
              { x: new Date(2021, 0, 1), y: 800 },
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
              { x: new Date(2021, 3, 1), y: 1050 }
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
          height: "360px"
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
</template>    