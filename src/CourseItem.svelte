<script>
    import { createEventDispatcher } from 'svelte';

    export let name;
    export let purchased;
    export let index;

    const dispatch = createEventDispatcher();

    function handleClick()
    {
        window.setTimeout( ()=> {
            dispatch('handleClick', {
                name : name,
                index : index,
                purchased : purchased
            });
        });
    }
</script>

<li><label><input type="checkbox" bind:checked="{purchased}" on:click="{handleClick}">
    <span class:purchased="{purchased}">{name}</span>
</label></li>

<style>

    span {
        margin-left: 15px;
    }

    .purchased {
        text-decoration: line-through wavy #ff301f;
        opacity: 0.4;
    }

</style>