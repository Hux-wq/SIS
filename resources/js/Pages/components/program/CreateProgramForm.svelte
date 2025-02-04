<script>
  import { onMount } from 'svelte';

  export let depts;



  let code = '';
  let name = '';
  let department_id;

  let errors = {
    code: null,
    name: null,
  };

  let csrfToken;
  // On mount, grab the CSRF token from the meta tag
  onMount(() => {
    csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  });

 

  const submitForm = async (event) => { 
    event.preventDefault();

    // Reset errors before submission
    errors = { code: null, name: null };

    const formData = new FormData();
    formData.append('code', code);
    formData.append('name', name);
    formData.append('department_id', department_id); // Send the department ID
    formData.append('_token', csrfToken);
    try {
        const response = await fetch('/Program/Create', {
          method: 'POST',
          headers: {
            'Accept': 'application/json',
          },
          body: formData,
        });
  
        if (!response.ok) 
        {
            if (response.status === 500)
            {
                errors.internal = "An internal server error occurred. Please try again later.";
            }
            else if(response.status === 419)
            {
                errors.internal = "The session expired. Please refresh the page.";
            } 
            else if(response.status === 422)
            {
                const data = await response.json();
                errors = data.errors || {}; 
                console.log(errors);
            }
        }
        else 
        {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Program has been Added!",
            showConfirmButton: true,
            padding:"3em",
          });

          // Reset input values after success
          code = '';
          name = '';
          department = ''; // Reset department selection
          departmentName = ''; // Reset department name
          departmentId = ''; // Reset department ID
        }
    } 
    catch (error) 
    {
      console.error('An error occurred:', error);
    
    }
  };
</script>

<form on:submit={submitForm}>
  <div class="mb-3">
      <label for="code" class="form-label">Code</label>
      <input bind:value={code} type="text" class="form-control shadow-none" id="code" name="code">
      {#if errors.code}
          <div class="alert alert-danger text-danger mt-1">
            {errors.code}
          </div>
      {/if}
  </div>

  <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input bind:value={name} type="text" class="form-control shadow-none" id="name" name="name">
      {#if errors.name}
      <div class="alert alert-danger text-danger mt-1">
        {errors.name}
      </div>
      {/if}
  </div>

  <div class="mb-3">
      <label for="department" class="form-label">Department</label>
      <select class="form-select shadow-none" bind:value={department_id} id="department" name="department">
        <option value="Default">Select Department</option>
        {#each depts as dept}
          <option value={dept.id}>{dept.name}</option>
        {/each}
      </select>

      <!-- {#if departmentName}
        <div class="mt-3">
          <label for="department_id" class="form-label">Selected Department: {departmentName}</label>
          <input type="text" class="form-control shadow-none" id="department_id" name="department_id" value={departmentId} readonly />
        </div>
      {/if} -->

      {#if errors.department}
      <div class="alert alert-danger text-danger mt-1">
        {errors.department}
      </div>
      {/if}
  </div>

  <button type="submit" class="btn btn-primary float-end">Submit</button>
</form>
