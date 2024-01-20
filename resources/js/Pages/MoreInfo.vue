<script setup>
import {JsonViewer} from "vue3-json-viewer"
import { Link } from "@inertiajs/vue3";
import MainLayout from '@/Layouts/MainLayout.vue';
import "vue3-json-viewer/dist/index.css";
import LineChart from "@/Components/LineChart.vue";


defineProps({
    Item:Object
})

</script>
<template>
    <MainLayout>
        <Link href="/dashboard" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" >Back</Link>
        <div class="json">
            <JsonViewer :value="Item[0]" copyable  sort theme="dark"/>
        </div>
    </MainLayout>
</template>
<style>
    .json{
        padding-top: 30px;
    }
</style>
