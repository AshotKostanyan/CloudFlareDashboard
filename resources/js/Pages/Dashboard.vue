<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Head, Link } from '@inertiajs/vue3'
import Pagination from '../Components/Pagination.vue'
import LineChart from '@/Components/LineChart.vue';


defineProps({
    IPS: Object,
    dataset: Array,
});

</script>

<template>
    <MainLayout>
        <LineChart :count="dataset[0]" :timeperiod="dataset[1]" ></LineChart>
        <div v-if="IPS.total > 0" class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            IP
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            COUNT
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            HITS
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            COUNTRY
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            PROXY
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            VPN
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            TOR
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            HOSTING
                        </th>
                        <th scope="col"
                            class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-500 font-medium flex justify-end items-center space-x-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="IPS in IPS.data" :key="IPS.id">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">
                                {{ IPS.ip }}
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">
                                {{ IPS.count }}
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">
                                {{ IPS.hits }}
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            <div v-if="IPS.info != null" class="text-sm font-medium text-gray-900">
                                {{ IPS.info.country }}
                            </div>
                            <div v-else class="text-sm font-medium text-gray-900">
                                Not found
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div v-if="IPS.info != null" class="text-sm font-medium text-gray-900">
                                {{ IPS.info.privacy.proxy }}
                            </div>
                            <div v-else class="text-sm font-medium text-gray-900">
                                Not found
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div v-if="IPS.info != null" class="text-sm font-medium text-gray-900">
                                {{ IPS.info.privacy.vpn }}
                            </div>
                            <div v-else class="text-sm font-medium text-gray-900">
                                Not found
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div v-if="IPS.info != null" class="text-sm font-medium text-gray-900">
                                {{ IPS.info.privacy.tor }}
                            </div>
                            <div v-else class="text-sm font-medium text-gray-900">
                                Not found
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div v-if="IPS.info != null" class="text-sm font-medium text-gray-900">
                                {{ IPS.info.privacy.hosting }}
                            </div>
                            <div v-else class="text-sm font-medium text-gray-900">
                                Not found
                            </div>
                        </td>

                        <td v-if="IPS.info != null"
                            class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex justify-end items-center space-x-3">
                            <Link class="text-green-600 hover:text-green-900" :href="route('dashboard/id', IPS._id)">More
                            Info
                            </Link>


                        </td>
                    </tr>
                </tbody>
            </table>

            <Pagination :links="IPS.links" />
        </div>
        <div v-else class="text-center font-bold text-xl">
            Not Found
        </div>
    </MainLayout>
</template>
