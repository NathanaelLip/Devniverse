<script setup>
import Footer from '@/Components/Footer.vue';
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
        <div
            class="shadow-md sm:fixed sm:top-0 sm:right-0 p-6 text-right flex lg:justify-around md:justify-around sm:justify-between w-full">
            <div class="flex" style="align-items: center;">
                <Link href="/marketplace"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-purple-500 transition-all">
                Marketplace
                </Link>
                <div class="right-4 flex absolute">
                    <div v-if="canLogin" class="flex mr-4" style="align-items: center;">
                        <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-purple-500 transition-all">
                        Dashboard</Link>
                        <template v-else>
                            <Link :href="route('login')"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-purple-500 transition-all">
                            Log in</Link>
                            <Link v-if="canRegister" :href="route('register')"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-purple-500 transition-all">
                            Register</Link>
                        </template>
                    </div>
                    <ThemeButton />
                </div>
            </div>
        </div>

        <div class="flex w-full justify-center items-center mt-auto mb-auto h-96 text-center">
            <h1 v-if="$page.props.auth.user" class="font-extrabold text-5xl text-purple-600">Welcome <span class="typewrite"
                    data-period="2000" :data-type="userName"></span></h1>
            <h1 v-else class="font-extrabold text-5xl text-purple-600">Welcome <span class="typewrite" data-period="2000"
                    data-type='[ "Guest!", "To AstreaCraft!" ]'></span></h1>
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
            return '[' + '"' + this.$page.props.auth.user.name + '!"' + ', "To AstreaCraft!"]';
        },
    },
};

var TxtType = function (el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
};

TxtType.prototype.tick = function () {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

    var that = this;
    var delta = 200 - Math.random() * 100;

    if (this.isDeleting) { delta /= 2; }

    if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
    }

    setTimeout(function () {
        that.tick();
    }, delta);
};

window.onload = function () {
    var elements = document.getElementsByClassName('typewrite');
    for (var i = 0; i < elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-type');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
            new TxtType(elements[i], JSON.parse(toRotate), period);
        }
    }
    // INJECT CSS
    var css = document.createElement("style");
    css.type = "text/css";
    css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #5f677a}";
    document.body.appendChild(css);
};
</script>
