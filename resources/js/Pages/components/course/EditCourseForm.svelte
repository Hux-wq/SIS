<script>
    import { onMount } from 'svelte';

    export let courseId;
    export let programs;

    let code = '';
    let name = '';
    let program_id;


    let errors = {
        code: null,
        name: null,
    };

    let csrfToken;

    onMount(() => {
        // Fetch department data by ID
        fetch(`/Course/Edit/${courseId}`)
            .then((response) => response.json())
            .then((data) => {
                code = data.code;
                name = data.name;
                program_id = data.program_id;
                
            })
            .catch((error) => console.error('Error fetching department data:', error));

        // Get CSRF token for safe form submission
       csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    });

    // When the department is selected, set department name and ID
    const handleDepartmentChange = (event) => {
        const selectedProg = depts.find(prog => prog.code === event.target.value);
        programName = selectedProg ? selectedProg.name : '';
        programId = selectedProg ? selectedProg.id : '';
    };
    
    const submitForm = async (event) => {
        event.preventDefault();

        // Reset errors before submission
        errors = { code: null, name: null,};

    
        try {
            const response = await fetch(`/Course/Update/${courseId}`, {
                method: 'PUT',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': csrfToken,
                },
                body: JSON.stringify({
                    code,
                    name,
                    program_id,
                    
                }),
                
            });
            console.log({ code, name, departmentId });
            const data = await response.json();
            
            if (!response.ok) {
                if (response.status === 422) {
                    errors = data.errors || {};
                    console.log(errors);
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Something went wrong!',
                        text: data.message || 'Please try again later.',
                        showConfirmButton: true,
                    });
                }
            } else {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Course ' + code.toLocaleUpperCase() + ' has been updated!',
                    showConfirmButton: true,
                    padding: '3em',
                });
                
            }
        } catch (error) {
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Something went wrong!',
                text: error || 'Please try again later.',
                showConfirmButton: true,
            });
            console.error('An error occurred:', error);
            console.log(error);
        }
    };
</script>

<form on:submit={submitForm}>
    <div class="mb-3">
        <label for="code" class="form-label">Code</label>
        <input bind:value={code} type="text" class="form-control shadow-none text-uppercase" id="code" name="code">
        {#if errors.code}
            <div class="alert alert-danger text-danger mt-1">
                {errors.code}
            </div>
        {/if}
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input bind:value={name} type="text" class="form-control shadow-none text-capitalize" id="name" name="name">
        {#if errors.name}
            <div class="alert alert-danger text-danger mt-1">
                {errors.name}
            </div>
        {/if}
    </div>

    <div class="mb-3">
        <label for="department" class="form-label">Department</label>
        <select class="form-select shadow-none text-capitalize" bind:value={program_id} id="departmentId" name="departmentId">
            <option value="">Default</option>
            {#each programs as prog}
                <option value={prog.id}>{prog.name}</option>
            {/each}
        </select>   
        {#if errors.department}
            <div class="alert alert-danger text-danger mt-1">
                {errors.department}
            </div>
        {/if}
    </div>

    <button type="submit" class="btn btn-primary float-end">Update</button>
</form>
