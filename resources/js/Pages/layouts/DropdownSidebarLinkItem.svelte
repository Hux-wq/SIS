<script>
    import { Link } from '@inertiajs/svelte';

    export let label;
    export let path;
    export let currentPath;
    export let onClick = () => {}; // Default empty function

    const isActive = currentPath === path;
    
    
</script>

<style>
    span, .fa-circle{
        color: #fff !important;
    }
</style>

<li class="nav-item">
    <Link class="nav-link nav-button {isActive ? 'active' : ''}"  href="{path}" on:click={onClick}>
      <span class="d-flex align-items-center"><i class="fa-solid fa-circle" ></i>{label}</span>
    </Link>
</li>