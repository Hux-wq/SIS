<script>

    let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    export let courseId;
    export let code;
    const destroy = async () => {
    const confirmed = await Swal.fire({
      title: 'Delete the Course ' + code.toLocaleUpperCase() + '?',
      text: 'All of the data that is linked to this course will also be deleted!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, keep it',
    });

    if (!confirmed.isConfirmed) {
      return;
    }

    try {
      const response = await fetch(`/Course/${courseId}`, {
        method: 'DELETE',
        headers: {
          'Accept': 'application/json',
          'X-CSRF-TOKEN': csrfToken,
        },
      });

      if (response.ok) {
        Swal.fire({
          position: "center",
          icon: "success",
          title: "Course " + code.toLocaleUpperCase() + " has been deleted!",
          showConfirmButton: true,
          padding:"3em",
        }).then(() => {
          window.location.href = '/Courses'; // Redirect after delete (optional)
        });
      } else {
        const data = await response.json();
        Swal.fire({
          position: 'center',
          icon: 'error',
          title: data.message || 'Failed to delete this Course',
          showConfirmButton: true,
        });
      }
    } catch (error) {
      console.error('An error occurred:', error);
      Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'An error occurred. Please try again.',
        showConfirmButton: true,
      });
    }
    };
</script>

<style>
.fa-trash{
  width: 20px;
}
</style>


<div>
   <button class="btn btn-danger  rounded-circle pt-2"on:click={destroy}><i class="fa-solid fa-trash pb-1 fs-6"></i></button>
</div>