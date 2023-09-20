<!-- <script setup>
import axios from "axios";
import { ref, onMounted } from 'vue';

const users = ref([])
const getUsers = () => {
	axios
		.get("/api/users")
		.then(res => users.data = res.data)
		.catch(error => console
			.log(error))
}
onMounted(() => getUsers)
</script> -->
<template>
	<div class="text-gray-300 w-full p-10 border-2 border-white">
		<table class="container">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Paypal Amount</th>
					<th>Mod</th>
					<th>Verified</th>
					<th>Banned</th>
					<th>Ban Reason</th>
					<!-- Add more user attributes as needed -->
				</tr>
			</thead>
			<tbody>
				<!-- <tr v-for="user in users" :key="user.id"> -->
				<!-- <td>{{ user.name }}</td> -->
				<!-- <td>{{ alluser.email }}</td>
					<td>{{ alluser.paypal_amount }}</td>
					<td>{{ alluser.isMod }}</td>
					<td>{{ alluser.isVerified }}</td>
					<td>{{ alluser.isBanned }}</td>
					<td>{{ alluser.ban_reason }}</td> -->
				<!-- Display more user attributes as needed -->
				<!-- </tr> -->
			</tbody>
		</table>
	</div>
</template>
  
<script>
export default {
	methods: {
		getUserData: function () {
			axios.get('/admin/allusers').then((res) => {


			});
		},
		mounted() {
			this.getUserData();
		}

	}
}
</script>