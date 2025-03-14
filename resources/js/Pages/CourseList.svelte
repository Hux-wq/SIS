<script>
  import { onMount } from "svelte";
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

  onMount(  () => {
      let table = new DataTable('#courseTable');
  });
</script>

<style>
 td,th{
  background: transparent !important;
  text-transform: capitalize;
}
</style>

<PageLayout auth={auth} errors={errors} title={['Courses']}>
<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">

          <h5 class="card-title yellow">Courses</h5>
          <CreateCourse progs={programs} />

          <hr>
          <table id="courseTable">
            <thead>
              <tr>
                <th class="h-txt-theme"><b>N</b>o#</th>
                <th class="h-txt-theme">Code</th>
                <th class="h-txt-theme">Name</th>
                <th class="h-txt-theme">Program</th>
                <th class="h-txt-theme">Department</th>
                <th class="h-txt-theme">Created by</th>
                <th class="h-txt-theme">Action</th>
              </tr>
            </thead>
            <tbody>
              {#if courses.length > 0}
                  {#each courses as course}
                  <tr>
                      <td class="sub">{course.id}</td>
                      <td class="text-uppercase sub">{course.code}</td>
                      <td class="sub">{course.name}</td>
                      <td class="sub">{getProgramName(course.program_id)}</td>
                      <td class="sub">{getDepartmentCode(course.program_id)}</td>
                      <td class="sub">{course.created_by}</td>
                      <td class="d-flex gap-1">
                      <EditCourse  courseId={course.id} programs={programs} />
                      <DeleteCourse courseId={course.id} code={course.code}/>
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

