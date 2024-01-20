<script setup>
import SideBar from '../Components/SideBar.vue';
</script>
<template>
    <SideBar></SideBar>
    <div class="w-full pt-5 px-4 sm:px-6 md:px-8 lg:ps-72">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <slot></slot>
                </div>
            </div>
        </div>

    </div>
</template>
