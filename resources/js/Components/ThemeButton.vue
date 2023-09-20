<template>
	<label class="switch">
		<input type="checkbox" checked @click="changeTheme();" id="input">
		<span class="slider round"></span>
	</label>
</template>

<style scoped>
body {
	transition: .4s;
}

input {
	outline: none;
	border: none;
}

.switch {
	position: relative;
	display: inline-block;
	width: 70px;
	height: 35px;

}

.switch input {
	opacity: 0;
	width: 0;
	height: 0;
}

.slider {
	position: absolute;
	cursor: pointer;
	top: 0;
	left: 0;
	right: 0;
	bottom: 0;
	background-color: #27173a;
	-webkit-transition: .4s;
	transition: .4s;
}

.slider:before {
	position: absolute;
	content: "";
	height: 30px;
	width: 30px;
	left: 4px;
	bottom: 3px;
	background-color: #f9c20a;
	-webkit-transition: .4s;
	transition: .4s;
}

input:checked+.slider {
	background-color: #5CB3FF;
}

input:focus+.slider {
	box-shadow: 0 0 1px #2196F3;
}

input:checked+.slider:before {
	/*background: transparent;
  box-shadow: 25px 0px 0px 0px #f9c20a;*/
	-webkit-transform: translateX(33px);
	-ms-transform: translateX(33px);
	transform: translateX(33px);
	background-color: #f2f2f2;
}

.slider.round {
	border-radius: 34px;
}

.slider.round:before {
	border-radius: 50%;
}
</style>

<script>
export default {
    methods: {
        changeTheme() {
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
};
</script>