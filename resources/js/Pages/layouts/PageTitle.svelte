<script>
    export let title = []; // Accepts an array
</script>
  
  <div class="pagetitle">
    <h1>{Array.isArray(title) ? title[0] : title}</h1>
    <nav  style="--bs-breadcrumb-divider: '>>';" >
      <ol class="breadcrumb">
        {#each title as item, index}
          <li class="breadcrumb-item {index === title.length - 1 ? 'active text-capitalize' : ''}">
            {#if index !== title.length - 1}
              <a href="/">{item}</a>
            {:else}
              {item}
            {/if}
          </li>
        {/each}
      </ol>
    </nav>
  </div>