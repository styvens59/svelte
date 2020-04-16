<script>
	import { onMount } from "svelte";

	const apiURL = "http://localhost:63342/svelte/api/courses.php"
	let data = [];

	onMount(async function () {
		const response = await fetch(apiURL);
		data = await response.json();
	});
</script>

<div id="app">

	<h1>Ma liste de courses</h1>

	<ul>
		{#if data.length === 0}
			<li>Chargement...</li>
		{:else}
			{#each data as item}
				<li>{item}</li>
			{/each}
		{/if}
	</ul>

</div>

<style>

	#app {
		margin: auto;
		width: 80%;
		text-align: center;
	}

</style>