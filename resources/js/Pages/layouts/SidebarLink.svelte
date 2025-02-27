<script>
    import { Link } from '@inertiajs/svelte';
    import { page } from '@inertiajs/svelte';
    import { onMount } from 'svelte';

    export let heading = '';
    export let label;
    export let path;
    export let icon;

    let isActive;
    
    $: {
        const currentPath = $page.url;
        
        // Get the base segment of the path (e.g., "/Students" from "/Students/View/2")
        const pathSegment = path.split('/').filter(Boolean)[0];
        const currentPathSegments = currentPath.split('/').filter(Boolean);
        
        // Check if the current URL contains the same base segment
        isActive = currentPathSegments.length > 0 && 
                  pathSegment === currentPathSegments[0];
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
            class="nav-link nav-button {isActive ? 'active' : ''}"
            >
            <i class={icon} style="width: 20px; text-align:center"></i>
            <span class="w-100">{label}</span>
    </Link>
</li>