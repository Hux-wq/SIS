<script>
    import CreateCourseForm from "./CreateCourseForm.svelte";


    export let progs;
    


</script>



<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#course-create-modal">
Create Course
</button>

<div class="modal fade" id="course-create-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Create a Course</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body p-4">
        <CreateCourseForm  progs={progs} />
    </div>
    </div>
</div>
</div>