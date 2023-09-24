<script setup>
import NavBar from '@/Components/NavBar.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});
</script>

<template>
	<Head title="Marketplace" />

	<NavBar :canLogin="canLogin" :canRegister="canRegister" />
	<div
		class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-center bg-gray-100 dark:bg-gray-900 selection:bg-purple-500 selection:text-white">

		<h1 class="text-8xl text-gray-800 dark:text-gray-300">COMING SOON</h1>
	</div>
</template>