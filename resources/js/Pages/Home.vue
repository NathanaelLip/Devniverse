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
    <Head title="Home" />

    <div
        class="relative sm:flex flex-col sm:justify-center sm:items-center min-h-screen bg-center bg-gray-100 dark:bg-gray-900 selection:bg-purple-500 selection:text-white">
        <NavBar :canLogin="canLogin" :canRegister="canRegister" />

        <div class="flex flex-col w-full justify-center items-center mt-auto mb-auto h-96 text-center">
            <h1 class="font-extrabold lg:text-7xl md:text-6xl text-4xl uppercase text-purple-600">Devniverse</h1>
            <h1 class="font-extrabold lg:text-2xl md:text-xl text-md lowercase text-gray-600 dark:text-gray-200">Code Your Path To The Stars</h1>
        </div>

        <Footer />
    </div>
</template>

<script>
export default {
    methods: {
        toggleMode() {
            const html = document.documentElement;

            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        },
    },
    computed: {
        // Create a computed property that formats 'data-type' as a string
        userName() {
            return '[' + '"' + this.$page.props.auth.user.name + '!"' + ', "To Devniverse!"]';
        },
    },
};
</script>
