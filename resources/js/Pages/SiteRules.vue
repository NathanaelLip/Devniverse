<script setup>
import Footer from '@/Components/Footer.vue';
import NavBar from '@/Components/NavBar.vue';
import ThemeButton from '@/Components/ThemeButton.vue';
import { Head, Link } from '@inertiajs/vue3';

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
	<Head title="Home" />

	<div
		class="relative sm:flex flex-col sm:justify-center sm:items-center min-h-screen bg-center bg-gray-100 dark:bg-gray-900 selection:bg-purple-500 selection:text-white">
		<NavBar />

		<div class="flex w-full justify-center items-center mt-auto mb-auto h-96 text-center">
			<p class="container my-8 text-gray-800 dark:text-gray-400"><strong>Site Rules:</strong><br><br>
				<strong>Respect Content Creators:</strong><br> Show appreciation for the website's content creators by
				providing constructive
				feedback and avoiding any form of harassment or negativity.<br><br>

				<strong>No Plagiarism:</strong><br> Do not copy, reproduce, or distribute any content from the website
				without proper attribution
				and permission from the content creator.<br><br>

				<strong>Stay on Topic:</strong><br> Keep discussions, comments, and contributions on the website relevant to
				the content and
				purpose of the platform.<br><br>

				<strong>Respect Copyright:</strong><br> Ensure that any content you upload, share, or discuss on the website
				complies with
				copyright laws and does not infringe on intellectual property rights.<br><br>

				<strong>No Malicious Activities:</strong><br> Do not engage in any form of hacking, exploitation, or other
				malicious activities
				that may harm the website or its users.<br><br>

				<strong>Respect Privacy:</strong><br> Protect your own and others' privacy by not sharing personal
				information without consent
				and following the website's privacy policies.<br><br>

				<strong>Be Responsible:</strong><br> Take responsibility for your actions and contributions on the website.
				Report any issues or
				violations to the website's staff.<br><br>

				<strong>No Inappropriate Content:</strong><br> Refrain from posting or sharing any explicit, adult, or
			offensive content on the
			website.
		</p>
	</div>

	<Footer />
</div></template>
