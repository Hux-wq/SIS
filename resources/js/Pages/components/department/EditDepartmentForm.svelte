<script>
    import { onMount } from 'svelte';

    export let departmentId;

    let code = 'a';
    let name = 'a';
    let head = 'default';
    let errors = {
        code: null,
        name: null,
        head: null,
    };

    let csrfToken;

    onMount(() => {
        // Fetch department data by ID
        fetch(`/Department/Edit/${departmentId}`)
            .then((response) => response.json())
            .then((data) => {
                code = data.code;
                name = data.name;
                head = data.head;
            })
            .catch((error) => console.error('Error fetching department data:', error));

        // Get CSRF token for safe form submission
       csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    });
    
    const submitForm = async (event) => {
        event.preventDefault();

        // Reset errors before submission
        errors = { code: null, name: null, head: null };

        const formData = new FormData();
        formData.append('code', code);
        formData.append('name', name);
        formData.append('head', head);
        formData.append('_token', csrfToken); 

        try {
            const response = await fetch(`/Department/Update/${departmentId}`, {
                method: 'PUT',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-Token': csrfToken,
                },
                body: JSON.stringify({
                code,
                name,
                head,
                    
                }),
            });
            console.log(response);
            const data = await response.json();
            
            if (!response.ok) {
                if (response.status === 422) {
                    errors = data.errors || {};
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
                    title: 'Department has been updated!',
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
        <label for="head" class="form-label">Head</label>
        <select class="form-select shadow-none" bind:value={head} id="head" name="head">
            <option value="Default">Default</option>
            <!-- Optionally populate heads dynamically -->
        </select>
        {#if errors.head}
            <div class="alert alert-danger text-danger mt-1">
                {errors.head}
            </div>
        {/if}
    </div>

    <button type="submit" class="btn btn-primary float-end">Update</button>
</form>
