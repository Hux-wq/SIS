<script>
  import DropdownSidebarLinkItem from "./DropdownSidebarLinkItem.svelte";
  import { onMount } from 'svelte';

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

  let isOpen = false;

  onMount(() => {
      // Check if this dropdown should be open based on stored value
      const openDropdown = localStorage.getItem('openDropdown');
      if (openDropdown === toggle) {
          isOpen = true;
      }
      
      // Check if the current path is one of this dropdown's children
      const isChildActive = path.some(p => currentPath === p);
      if (isChildActive) {
          isOpen = true;
          localStorage.setItem('openDropdown', toggle);
      }
  });

  function toggleDropdown() {
      isOpen = !isOpen;
      if (isOpen) {
          localStorage.setItem('openDropdown', toggle);
      } else {
          localStorage.removeItem('openDropdown');
      }
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
  .nav-link .fa-chevron-down {
      margin-right: 0;
      transition: transform 0.3s ease-in-out;
      color: #fff;
  }
  .fa-chevron-down-clicked {
      transform: rotate(180deg);
  }
  .nav-link i,
  .nav-link span {
      color: #fff;
  }
</style>

<li class="nav-heading">{heading}</li>
<li class="nav-item">
  <a class="nav-link {isOpen ? '' : 'collapsed'}" data-bs-target="#{toggle}-nav" data-bs-toggle="collapse" href="/" on:click|preventDefault={toggleDropdown}>
      <i class={icon} style="width: 20px; text-align:center"></i>
      <span>{dropdownName}</span>
      <i class="fa-solid fa-chevron-down {isOpen ? 'fa-chevron-down-clicked' : ''} ms-auto"></i>
  </a>
  <ul id="{toggle}-nav" class="nav-content {isOpen ? 'show' : 'collapse'}" data-bs-parent="#sidebar-nav">
      {#each combined as { path: itemPath, label: itemLabel }}
          <li class="nav-item">
              <DropdownSidebarLinkItem 
                  label={itemLabel} 
                  path={itemPath} 
                  currentPath={currentPath}
                  onClick={() => localStorage.setItem('openDropdown', toggle)}
              />
          </li>
      {/each}
  </ul>
</li>