
<script setup>
const props = defineProps({
    dataset: Array,
});

const data = ({
    data: {
        series: [props.dataset[1].count,props.dataset[2].count,props.dataset[3].count,props.dataset[4].count,props.dataset[5].count,props.dataset[6].count,props.dataset[7].count,props.dataset[8].count,props.dataset[9].count,],
        chartOptions: {
            chart: {
                width: 380,
                type: 'pie',
            },
            labels: [props.dataset[1]._id,props.dataset[1]._id,props.dataset[2]._id,props.dataset[3]._id,props.dataset[4]._id,props.dataset[5]._id,props.dataset[6]._id,props.dataset[7]._id,props.dataset[8]._id,props.dataset[9]._id,],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        },


    },

})

</script>

<template>
    <div id="chart">
        <apexchart type="pie" width="380" :options="data.data.chartOptions" :series="data.data.series"></apexchart>
    </div>
</template>