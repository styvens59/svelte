<script>
	import {onMount} from "svelte";
	import CourseItem from "./CourseItem.svelte";

	const apiURL = "http://localhost:63342/svelte/api/courses.php"
	const apiBaseURI = "http://localhost:63342/svelte/api"
	let data = [];

	onMount(async function () {
		const response = await fetch(`${apiBaseURI}/courses.php`,
				{
					credentials : "include"
				});
		data = await response.json();
	});

	function handleClick(event)
	{
		fetch(`${apiBaseURI}/update.php`, {
			method : 'POST',
			credentials : "include",
			body: JSON.stringify({
				index: event.detail.index,
				purchased: event.detail.purchased
			})
		});
	}
</script>

<div id="app">

	<h1>Ma liste de courses</h1>

	<ul>
		{#if data.length === 0}
			<li>Chargement...</li>
		{:else}
			{#each data as item, i}
				<CourseItem index={i} {...item} on:handleClick={handleClick}/>
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