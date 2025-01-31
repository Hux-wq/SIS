<script>
    import DropdownSidebarLinkItem from "./DropdownSidebarLinkItem.svelte";

    export let heading = '';
    export let dropdownName;
    export let icon;
    export let label = [];
    export let path = [];
    export let currentPath;
    export let toggle;

    let combined = path.map((item, index) => ({
    path: item,
    label: label[index]
    }));

   
</script>

<style>
    .nav-link .fa-chevron-down {
      margin-right: 0;
      transition: transform 0.3s ease-in-out;
      color: #fff;
    }
    .nav-link:not(.collapsed) .fa-chevron-down {
      transform: rotate(180deg);
    }
    .nav-link i,
    .nav-link span{
    color: #fff;
  }
    
</style>

<li class="nav-heading">{heading}</li>
<li class="nav-item">
    <a class="nav-link collapsed"  data-bs-target="#{toggle}-nav" data-bs-toggle="collapse" href="/">
      <i class={icon} style="width: 20px; text-align:center"></i><span>{dropdownName}</span><i class="fa-solid fa-chevron-down ms-auto"></i>
    </a>
    <ul id="{toggle}-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
    {#each combined as { path, label }}
      <li class="nav-item">
            <DropdownSidebarLinkItem label={label} path={path} currentPath={currentPath} />
      </li>
    {/each}
    </ul>
</li>