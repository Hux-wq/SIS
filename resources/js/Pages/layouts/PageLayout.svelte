<script>
    import SideBar from "./SideBar.svelte";
    import Header from "./Header.svelte";
    import Error from "./Error.svelte";
    import PageTitle from "./PageTitle.svelte";

    export let auth;
    export let errors;
    export let title = [];

    
</script>
  

<div id="main">
    <Header userid={auth.user.id} username={auth.user.name} useremail={auth.user.email} />
    <SideBar userid={auth.user.id} username={auth.user.name} />
    <Error errors={errors} />
    <PageTitle title={title}/>

    <slot />

</div>