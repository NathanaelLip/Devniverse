<template>
	<input class="h-10" v-model="inputValue" @input="handleInput" type="checkbox">
  </template>
  
  <script>
  export default {
	props: {
	  value: Boolean, // Value received from parent component
	},
	data() {
	  return {
		inputValue: this.value, // Initialize with the received value
	  };
	},
	methods: {
	  handleInput() {
		// Ensure the inputValue is a boolean
		this.inputValue = !!this.inputValue;
		this.$emit('input', this.inputValue); // Emit the validated value to the parent component
	  },
	},
  };
  </script>  