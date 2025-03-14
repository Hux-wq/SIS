<script>  
  import { onMount } from "svelte";
  onMount(  () => {

  let table = new DataTable('#gradeTable');
  });

  export let grades;

  function calculateFinalGrade(courseId) {

    let filteredGrades = grades.filter(g => g.course_id === courseId);


    let exams = grades.filter(g => g.type.includes("Examination"));
    let projects = grades.filter(g => g.type.includes("Project"));
    let others = grades.filter(g => g.type.includes('Quiz') || g.type.includes('Assignment'));

    function getCategoryScore(category) {
      let totalScore = category.reduce((sum, g) => sum + g.score, 0);
      let totalMax = category.reduce((sum, g) => sum + g.total, 0);
      return totalMax ? (totalScore / totalMax) * 100 : 0;

      
    }

    

    let examsWeighted = getCategoryScore(exams) * 0.4;
    let projectsWeighted = getCategoryScore(projects) * 0.3;
    let othersWeighted = getCategoryScore(others) * 0.3;

    console.log(othersWeighted);

    return (examsWeighted + projectsWeighted + othersWeighted).toFixed(2);
    }
</script>

<style>
    td,th{
     background: transparent !important;
     text-transform: capitalize;
   }
   
 
 </style>

<div class="">
    <table id="gradeTable" >
        <thead>
          <tr>
            <th class="h-txt-theme"><b>N</b>o#</th>
            <th class="h-txt-theme">Code</th>
            <th class="h-txt-theme">Name</th>
            <th class="h-txt-theme">Status</th>
            
          </tr>
        </thead>
        <tbody>
          
              <tr>
                <td class="sub">1</td>
                <td class="text-uppercase sub">Cap101</td>
                <td class="sub">Capstone 101</td>
                <td class="sub"><span class="badge text-bg-success px-3 p-2">Passed</span></td>
              </tr>

              <tr>
                <td class="sub">2</td>
                <td class="text-uppercase sub">Res101</td>
                <td class="sub">Reseach 101</td>
                <td class="sub"><span class="badge text-bg-danger px-3 p-2 ">Failed</span></td>
              </tr>

              <tr>
                <td class="sub">3</td>
                <td class="text-uppercase sub">OJT101</td>
                <td class="sub">OJT 101</td>
                <td class="sub"><span class="badge text-bg-success px-3 p-2">Passed</span></td>
              </tr>

              <tr>
                <td class="sub">4</td>
                <td class="text-uppercase sub">Cap101</td>
                <td class="sub">Capstone 101</td>
                <td class="sub"><span class="badge text-bg-success px-3 p-2">Passed</span></td>
              </tr>
         
            <!-- <tr class="w-100 border text-center">
              <td colspan=6>
                  <h4 class="pt-4 fw-bolder"> Theres no records in the database</h4>
              </td>
          </tr>
     -->
          
        </tbody>
      </table>
   
</div>