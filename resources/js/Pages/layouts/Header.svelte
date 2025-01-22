<script>

    import MenuOptions from './MenuOptions.svelte';

    export let username;
    export let userid;
    export let useremail;


    const toggleSidebar = () => {
    document.body.classList.toggle('toggle-sidebar');
    };
</script>

<header id="header" class="header fixed-top d-flex align-items-center bg-box-theme">

    <button class="bg-transparent border-0 d-flex align-items-center justify-content-between" on:click={toggleSidebar}>
      <i class="fa-solid fa-bars fs-5 toggle-sidebar-btn header-text-theme"></i>
    </button><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <MenuOptions username={username} userid={userid} useremail={useremail} />
    </nav><!-- End Icons Navigation -->

</header>