<script setup>
import NavBar from '@/Components/NavBar.vue';
import Footer from '@/Components/Footer.vue';
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

	<div
		class="relative sm:flex flex-col sm:justify-center sm:items-center min-h-screen bg-center bg-gray-100 dark:bg-gray-900 selection:bg-purple-500 selection:text-white">
		<NavBar :canLogin="canLogin" :canRegister="canRegister" />

		<div class="flex flex-col w-full justify-center items-center mt-auto mb-auto h-96 text-center">
			<h1 class="lg:text-8xl text-5xl font-extrabold text-center text-gray-800 dark:text-gray-300">COMING SOON</h1>
        </div>

		<Footer />
	</div>
</template>