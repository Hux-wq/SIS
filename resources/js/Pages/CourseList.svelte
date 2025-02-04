<script>
  import CreateCourse from './components/course/CreateCourse.svelte';
    import DeleteCourse from './components/course/DeleteCourse.svelte';
    import EditCourse from './components/course/EditCourse.svelte';
import PageLayout from './layouts/PageLayout.svelte';
 
  export let courses;
  export let programs = [];
  export let departments;
  export let auth;
  export let errors = {};


  const getProgramName = (programId) => {
      const program = programs.find(prog => prog.id === programId);
      return program ? program.name : 'Unknown Program';
  };

  const getDepartmentCode = (programId) => {

    const program = programs.find(program => program.id === programId);
    console.log(program.department_id);
    const dept = departments.find(department => department.id === program.department_id);
    console.log(dept);
    return dept ? dept.code.toUpperCase() : "Unknown Department";
  };
</script>

<style>
 td,th{
  background: transparent !important;
  text-transform: capitalize;
}
</style>

<PageLayout auth={auth} errors={errors} title={'Courses'}>
<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">

          <h5 class="card-title yellow">Courses</h5>
          <CreateCourse progs={programs} />

          <hr>
          <table class="table">
            <thead>
              <tr>
                <th ><b>N</b>o#</th>
                <th >Code</th>
                <th >Name</th>
                <th >Program</th>
                <th >Department</th>
                <th >Created by</th>
                <th >Action</th>
              </tr>
            </thead>
            <tbody>
              {#if courses.length > 0}
                  {#each courses as course}
                  <tr>
                      <td>{course.id}</td>
                      <td class="text-uppercase">{course.code}</td>
                      <td>{course.name}</td>
                      <td>{getProgramName(course.program_id)}</td>
                      <td>{getDepartmentCode(course.program_id)}</td>
                      <td>{course.created_by}</td>
                      <td class="d-flex gap-1">
                      <EditCourse courseId={course.id} programs={programs} />
                      <DeleteCourse courseId={course.id}/>
                      </td>
                  </tr>
                  {/each}
              {:else}
                <tr class="w-100 border text-center">
                  <td colspan=7>
                      <h4 class="pt-4 fw-bolder"> Theres no records in the database</h4>
                  </td>
              </tr>
              {/if}
              
            </tbody>
          </table>
          <!-- End Table with stripped rows -->

        </div>
      </div>

    </div>
  </div>
</section>
</PageLayout>

