<script>
    import { Link } from '@inertiajs/svelte';

    export let heading = '';
    export let label;
    export let path;
    export let icon;

    let currentPath = window.location.pathname;
 
    function setActivePath(path) 
    {
        currentPath = path;
    }

</script>

<style>
    .nav-heading {
        font-size: 11px;
        text-transform: uppercase;
        color: #889aab;
        font-weight: 600;
        margin: 10px 0 5px 15px;
    }
    .nav-item .nav-link span,
    .nav-item .nav-link i {
        color: #fff !important;
    }

</style>

<li class="nav-heading">{heading}</li>
<li class="nav-item">
    <Link   href={path}
            class="nav-link nav-button {currentPath === path ? 'active' : ''}"
            on:click={() => setActivePath(path)}
             >
            <i class={icon} style="width: 20px; text-align:center"></i>
            <span class="w-100">{label}</span>
    </Link>
</li>
