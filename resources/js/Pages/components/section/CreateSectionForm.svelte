<script>
    import { onMount } from 'svelte';
  
    export let depts;
    export let teachers;
  
  
  
    let section;
    let adviser;
    let year;
    let semester;
    let specialization;
    let department_id;
  
    let errors = {
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
      errors = { name: null, adviser: null};
  
      const formData = new FormData();
      formData.append('section', section);
      formData.append('adviser', adviser);
      formData.append('year', year);
      formData.append('semester', semester);
      formData.append('specialization', specialization);
      formData.append('department_id', department_id); // Send the department ID
      formData.append('_token', csrfToken);
      try {
          const response = await fetch('/Section/Create', {
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
            section = '';
            adviser = '';
            year = '';
            semester = '';
            specialization ='';
            departmentId = ''; 
          }
      } 
      catch (error) 
      {
        console.error('An error occurred:', error);
      
      }
    };
  </script>
  
  <form  on:submit={submitForm}>
    <div class="row">
        <div class="col-12 mb-3">
            <label for="section" class="form-label">Section</label>
            <input bind:value={section} type="text" class="form-control shadow-none" id="sdction" name="section">
            {#if errors.section}
                <div class="alert alert-danger text-danger mt-1">
                  {errors.section}
                </div>
            {/if}
        </div>
    
        <div class="col-12 mb-3">
            <label for="adviser" class="form-label">Adviser</label>
            <select class="form-select shadow-none" bind:value={adviser} id="adviser" name="adviser">
                <option value="0">Select Adviser</option>
                {#each teachers as teacher}
                  <option value={teacher.id}>{teacher.name}</option>
                {/each}
              </select>
    
    
    
            {#if errors.adviser}
                <div class="alert alert-danger text-danger mt-1">
                  {errors.adviser}
                </div>
            {/if}
        </div>
    
        <div class="col-4 mb-3">
            <label for="year" class="form-label">Year</label>
            <select class="form-select shadow-none" bind:value={year} id="year" name="year">
                <option value="1">1st Year</option>
                <option value="2">2nd Year</option>
                <option value="3">3rd Year</option>
                <option value="4">4th Year</option>
            </select>

            {#if errors.year}
                <div class="alert alert-danger text-danger mt-1">
                  {errors.year}
                </div>
            {/if}
        </div>
      
        <div class="col-4 mb-3">
            <label for="semester" class="form-label">Semester</label>
            <select class="form-select shadow-none" bind:value={semester} id="semester" name="semester">
                <option value="1">1st Semester</option>
                <option value="2">2nd Semester</option>
                
            </select>

            {#if errors.semester}
            <div class="alert alert-danger text-danger mt-1">
              {errors.semester}
            </div>
            {/if}
        </div>
    
        <div class="col-4 mb-3">
            <label for="special" class="form-label">Specialization</label>
            <select class="form-select shadow-none" bind:value={specialization} id="specialization" name="specialization">
                <option value="0">No Specialization</option>
            </select>
            {#if errors.specialization}
            <div class="alert alert-danger text-danger mt-1">
              {errors.specialization}
            </div>
            {/if}
        </div>
      
        <div class="mb-3">
            <label for="department" class="form-label">Department</label>
            <select class="form-select shadow-none text-capitalize" bind:value={department_id} id="department" name="department">
              <option value="Default">Select Department</option>
              {#each depts as dept}
                <option class="text-capitalize" value={dept.id}>{dept.name}</option>
              {/each}
            </select>
      
      
            {#if errors.department}
            <div class="alert alert-danger text-danger mt-1">
              {errors.department}
            </div>
            {/if}
        </div>
    </div>
  
    <button type="submit" class="btn btn-primary float-end">Submit</button>
  </form>
  