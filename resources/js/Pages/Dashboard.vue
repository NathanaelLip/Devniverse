<script setup>
// import UserList from '@/Components/UserList.vue';
import SearchTest from '@/Components/SearchTest.vue';
import UserIndex from '@/Components/UserIndex.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

        <div class="py-20 flex items-center min-h-max text-gray-800">
            <div class="p-4 w-full flex justify-center">
                <div v-if="$page.props.auth.user.isVerified" class="grid grid-cols-6 gap-4">
                    <div class="col-span-12 sm:col-span-6 md:col-span-3">
                        <div class="flex flex-row bg-white dark:bg-gray-950 shadow-sm rounded p-4">
                            <div
                                class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-blue-100 text-blue-500">

                                <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 -960 960 960">
                                    <path
                                        d="M200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm0-80h560v-400H200v400Zm0-480h560v-80H200v80Zm0 0v-80 80Zm280 240q-17 0-28.5-11.5T440-440q0-17 11.5-28.5T480-480q17 0 28.5 11.5T520-440q0 17-11.5 28.5T480-400Zm-160 0q-17 0-28.5-11.5T280-440q0-17 11.5-28.5T320-480q17 0 28.5 11.5T360-440q0 17-11.5 28.5T320-400Zm320 0q-17 0-28.5-11.5T600-440q0-17 11.5-28.5T640-480q17 0 28.5 11.5T680-440q0 17-11.5 28.5T640-400ZM480-240q-17 0-28.5-11.5T440-280q0-17 11.5-28.5T480-320q17 0 28.5 11.5T520-280q0 17-11.5 28.5T480-240Zm-160 0q-17 0-28.5-11.5T280-280q0-17 11.5-28.5T320-320q17 0 28.5 11.5T360-280q0 17-11.5 28.5T320-240Zm320 0q-17 0-28.5-11.5T600-280q0-17 11.5-28.5T640-320q17 0 28.5 11.5T680-280q0 17-11.5 28.5T640-240Z" />
                                </svg>
                            </div>
                            <div class="flex flex-col flex-grow ml-4">
                                <div class="text-sm text-gray-500 dark:text-gray-400">Next Payout</div>
                                <div class="font-bold text-lg dark:text-gray-300">{{ admin.paydate }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-3">
                        <div class="flex flex-row bg-white dark:bg-gray-950 shadow-sm rounded p-4">
                            <div
                                class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-green-100 text-green-500">
                                <svg class="w-6 h-6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 -960 960 960">
                                    <path
                                        d="M560-440q-50 0-85-35t-35-85q0-50 35-85t85-35q50 0 85 35t35 85q0 50-35 85t-85 35ZM280-320q-33 0-56.5-23.5T200-400v-320q0-33 23.5-56.5T280-800h560q33 0 56.5 23.5T920-720v320q0 33-23.5 56.5T840-320H280Zm80-80h400q0-33 23.5-56.5T840-480v-160q-33 0-56.5-23.5T760-720H360q0 33-23.5 56.5T280-640v160q33 0 56.5 23.5T360-400Zm440 240H120q-33 0-56.5-23.5T40-240v-440h80v440h680v80ZM280-400v-320 320Z" />
                                </svg>
                            </div>
                            <div class="flex flex-col flex-grow ml-4">
                                <div class="text-sm text-gray-500 dark:text-gray-400">Payout</div>
                                <div class="font-bold text-lg dark:text-gray-300">${{ $page.props.auth.user.paypal_amount }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else class="grid grid-cols-12 gap-4 w-full">
                    <div class="col-span-12 sm:col-span-12 md:col-span-12">
                        <div class="flex flex-row bg-white dark:bg-gray-950 shadow-sm rounded p-4">
                            <div class="flex flex-col flex-grow ml-4 text-center">
                                <div class="text-lg text-gray-800 dark:text-gray-200">You are not yet verified!</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Admin area -->
        <div v-if="$page.props.auth.user.isAdmin">
            <UserIndex />
            <!-- <SearchTest /> -->
        </div>

    </AuthenticatedLayout>
</template>

<script>
export default {
    data() {
        return {
            admin: [],
        };
    },
    mounted() {
        this.fetchAdmin();
    },
    methods: {
        fetchAdmin() {
            axios.get('/api/admin')
                .then((response) => {
                    this.admin = response.data;
                });
        },
    },
};
</script>