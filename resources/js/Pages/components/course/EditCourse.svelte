<script>
    import EditCourseForm from "./EditCourseForm.svelte";


    export let courseId;
    export let programs;
</script>



<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#department-{courseId}-edit-modal">
    <i class="fa-solid fa-eye"></i>
</button>

<div class="modal fade" id="department-{courseId}-edit-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Program</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body p-4">
        <EditCourseForm courseId={courseId} programs={programs}/>
    </div>
    </div>
</div>
</div>