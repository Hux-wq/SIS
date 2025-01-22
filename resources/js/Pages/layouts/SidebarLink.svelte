<script>
    import { Link } from '@inertiajs/svelte';

    export let heading = '';
    export let label;
    export let path;
    export let icon;
    export let currentPath;

    currentPath = window.location.pathname;

    function setActivePath(path) 
    {
        currentPath = path;
    }
</script>

<li class="nav-heading">{heading}</li>
<li class="nav-item">
    <Link class="nav-link nav-button {currentPath === path ? 'active' : ''}" href={path} on:click={() => setActivePath(path)}>
        <i class={icon} style="width: 20px;"></i>
        <span class="w-100">{label}</span>
    </Link>
</li>
