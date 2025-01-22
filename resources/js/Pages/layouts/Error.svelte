<script>

    export let errors = {};

</script>

<div>
    {#if errors}
      <div class="error-messages">
        {#each Object.keys(errors) as field}
          <div>{field}: {errors[field]}</div>
        {/each}
      </div>
    {/if}
</div>