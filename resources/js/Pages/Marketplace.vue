<script setup>
import ThemeButton from '@/Components/ThemeButton.vue';
import { Head, Link } from '@inertiajs/vue3';

</script>

<template>
    <Head title="Marketplace" />

	<div
		class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-center bg-gray-100 dark:bg-gray-900 selection:bg-purple-500 selection:text-white">
		<div class="shadow-md sm:fixed sm:top-0 sm:right-0 p-6 text-right flex justify-center w-full">
			<div class="flex" style="align-items: center;">
				<Link href="/"
					class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-purple-500 transition-all">
				Home
				</Link>
				<div class="right-4 flex absolute">
					<ThemeButton class="ml-4"/>
				</div>
			</div>
		</div>
<h1 class="text-8xl text-gray-800 dark:text-gray-300">COMING SOON</h1>
	</div>
</template>