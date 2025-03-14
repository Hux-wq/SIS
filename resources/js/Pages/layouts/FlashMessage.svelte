<!-- resources/js/Components/FlashMessage.svelte -->
<script>
    import { page } from '@inertiajs/svelte';
    import { onMount, onDestroy } from 'svelte';

    let message = '';
    let type = 'info';
    let visible = false;
    let timeout;

    onMount(() => {
        // Check for flash messages from Laravel
        if ($page.props.flash) {
            if ($page.props.flash.error) {
                message = $page.props.flash.error;
                type = 'error';
                visible = true;
            } else if ($page.props.flash.success) {
                message = $page.props.flash.success;
                type = 'success';
                visible = true;
            } else if ($page.props.flash.status) {
                message = $page.props.flash.status;
                type = 'warning';
                visible = true;
            }

            // Auto-dismiss after 5 seconds
            if (visible) {
                timeout = setTimeout(() => {
                    visible = false;
                }, 5000);
            }
        }
    });

    onDestroy(() => {
        if (timeout) clearTimeout(timeout);
    });

    function dismiss() {
        visible = false;
    }
</script>

{#if visible && message}
    <div 
        class="fixed top-4 right-4 z-50 
        {type === 'error' ? 'bg-red-500' : 
         type === 'success' ? 'bg-green-500' : 
         'bg-yellow-500'} 
        text-white px-4 py-2 rounded shadow-lg flex items-center justify-between"
    >
        <span>{message}</span>
        <button 
            on:click={dismiss} 
            class="ml-4 hover:bg-opacity-75 rounded-full p-1"
        >
            ✕
        </button>
    </div>
{/if}