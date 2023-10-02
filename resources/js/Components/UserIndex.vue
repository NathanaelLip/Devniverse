<template>
    <!-- User Table -->
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <input class="rounded-md border-none w-3/12 my-4 bg-slate-200 dark:bg-slate-600 dark:text-gray-200" v-model="query" @input="search"
                        placeholder="Search">

                    <table class="min-w-full">
                        <thead class="bg-white border-b dark:border-slate-700">
                            <tr>
                                <th scope="col" class="text-sm font-medium text-gray-900 dark:text-gray-200 bg-slate-300 dark:bg-slate-700 px-6 py-4 text-left">
                                    #
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 dark:text-gray-200 bg-slate-300 dark:bg-slate-700 px-6 py-4 text-left">
                                    Name
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 dark:text-gray-200 bg-slate-300 dark:bg-slate-700 px-6 py-4 text-left">
                                    Email
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 dark:text-gray-200 bg-slate-300 dark:bg-slate-700 px-6 py-4 text-left">
                                    Paypal Amount
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 dark:text-gray-200 bg-slate-300 dark:bg-slate-700 px-6 py-4 text-left">
                                    Verified
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 dark:text-gray-200 bg-slate-300 dark:bg-slate-700 px-6 py-4 text-left">
                                    Admin
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 dark:text-gray-200 bg-slate-300 dark:bg-slate-700 px-6 py-4 text-left">
                                    Mod
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 dark:text-gray-200 bg-slate-300 dark:bg-slate-700 px-6 py-4 text-left">
                                    Banned
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 dark:text-gray-200 bg-slate-300 dark:bg-slate-700 px-6 py-4 text-left">
                                    Ban Reason
                                </th>
                                <th scope="col" class="text-sm font-medium text-gray-900 dark:text-gray-200 bg-slate-300 dark:bg-slate-700 px-6 py-4 text-left">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in users" :key="user.id" class="text-center text-gray-900 dark:text-gray-300 bg-slate-200 dark:bg-slate-600 border-b dark:border-slate-700">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{ user.id }}</td>
                                <td v-if="!editingUser || user.id !== editingUser.id"
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{ user.name }}
                                </td>
                                <td v-else>
                                    <input class="rounded-md border-none w-full dark:text-gray-900 text-center" v-model="editingUser.name"/>
                                </td>
                                <td v-if="!editingUser || user.id !== editingUser.id"
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{ user.email }}
                                </td>
                                <td v-else>
                                    <input class="rounded-md border-none w-full dark:text-gray-900 text-center" v-model="editingUser.email"/>
                                </td>
                                <td v-if="!editingUser || user.id !== editingUser.id"
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">{{
                                        user.paypal_amount }}
                                </td>
                                <td v-else>
                                    <input class="rounded-md border-none w-16 dark:text-gray-900" v-model="editingUser.paypal_amount"/>
                                </td>
                                <td v-if="!editingUser || user.id !== editingUser.id"
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{ user.isVerified
                                    }}
                                </td>
                                <td v-else>
                                    <BooleanInput class="rounded-md border-none w-16 dark:text-gray-900" v-model.number="editingUser.isVerified"></BooleanInput>
                                </td>
                                <td v-if="!editingUser || user.id !== editingUser.id"
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{ user.isAdmin }}
                                </td>
                                <td v-else>
                                    <BooleanInput class="rounded-md border-none w-16 dark:text-gray-900" v-model.number="editingUser.isAdmin"></BooleanInput>
                                </td>
                                <td v-if="!editingUser || user.id !== editingUser.id"
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{ user.isMod }}
                                </td>
                                <td v-else>
                                    <BooleanInput class="rounded-md border-none w-16 dark:text-gray-900" v-model.number="editingUser.isMod"></BooleanInput>
                                </td>
                                <td v-if="!editingUser || user.id !== editingUser.id"
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{ user.isBanned
                                    }}
                                </td>
                                <td v-else>
                                    <BooleanInput class="rounded-md border-none w-16 dark:text-gray-900" v-model.number="editingUser.isBanned"></BooleanInput>
                                </td>
                                <td v-if="!editingUser || user.id !== editingUser.id"
                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium">{{
                                        user.ban_reason }}
                                </td>
                                <td v-else>
                                    <input class="rounded-md border-none w-full dark:text-gray-900 text-center" v-model="editingUser.ban_reason"/>
                                </td>

                                <!-- Add similar logic for other fields like email, PayPal amount, etc. -->
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button @click="editUser(user)"
                                        v-if="!editingUser || user.id !== editingUser.id">Edit</button>
                                    <div v-else class="flex gap-4">
                                        <button @click="saveUserChanges">Save</button>
                                        <button @click="cancelEdit">Cancel</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BooleanInput from './BooleanInput.vue';
export default {
  components: { BooleanInput },
    data() {
        return {
            query: "",
            users: [],
            editingUser: null, // Store the user being edited
        };
    },
    methods: {
        search() {
            axios
                .get("/api/search", {
                    params: { query: this.query }
                })
                .then(response => {
                    this.users = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        editUser(user) {
            this.editingUser = { ...user };
        },
        saveUserChanges() {
            axios
                .put(`/api/users/${this.editingUser.id}`, this.editingUser)
                .then((response) => {
                    const index = this.users.findIndex((user) => user.id === this.editingUser.id);
                    if (index !== -1) {
                        this.users[index] = { ...this.editingUser };
                    }
                    this.editingUser = null;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        cancelEdit() {
            this.editingUser = null;
        },
    },
};
</script>