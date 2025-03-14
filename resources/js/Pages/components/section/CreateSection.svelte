<script>
    import CreateSectionForm from "./CreateSectionForm.svelte";

    export let depts;
    export let teachers;
    


</script>



<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#program-create-modal">
Create Section
</button>

<div class="modal fade" id="program-create-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Section</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body p-4">
        <CreateSectionForm depts={depts} teachers={teachers}/>
    </div>
    </div>
</div>
</div>