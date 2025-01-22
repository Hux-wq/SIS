<script>
    import { Link } from '@inertiajs/svelte';

    export let label;
    export let path;
    export let currentPath;

    currentPath = window.location.pathname;

    function setActivePath(path) 
    {
        currentPath = path;
    }
</script>

<li class="nav-item">
    <Link class="nav-link nav-button {currentPath === path ? 'active' : ''}"  href="{path}" on:click={() => setActivePath(path)}>
      <span class="d-flex align-items-center"><i class="fa-solid fa-circle" ></i>{label}</span>
    </Link>
</li>