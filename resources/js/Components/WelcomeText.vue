<template>
	<div class="typewriter">{{ typedText }}</div>
  </template>
  
  <script>
  export default {
	data() {
	  return {
		textToType: "This is a typewriter animation.", // Your text here
		typedText: "", // Initially empty
		currentIndex: 0, // Index to keep track of typed characters
		typingSpeed: 100, // Speed of typing in milliseconds
	  };
	},
	created() {
	  // Start typing when the component is created
	  this.typeText();
	},
	methods: {
	  typeText() {
		if (this.currentIndex < this.textToType.length) {
		  this.typedText += this.textToType.charAt(this.currentIndex);
		  this.currentIndex++;
		  setTimeout(this.typeText, this.typingSpeed);
		} else {
		  // Typing is complete, reset for the next loop
		  this.resetTypewriter();
		}
	  },
	  resetTypewriter() {
		setTimeout(() => {
		  this.typedText = "";
		  this.currentIndex = 0;
		  this.typeText();
		}, 2000); // Wait for 2 seconds before starting the next loop
	  },
	},
  };
  </script>
  
  <style scoped>
  /* CSS for typewriter animation */
  .typewriter {
	overflow: hidden; /* Ensures text is not visible outside the container */
	white-space: nowrap; /* Prevents line breaks */
	border-right: 2px solid #333; /* Blinking cursor effect */
	animation: typewriter 1s steps(24) forwards; /* Typing animation */
  }
  
  @keyframes typewriter {
	to {
	  width: 100%; /* Expands the container to reveal all text */
	}
  }
  </style>
  