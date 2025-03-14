<script>
    import Attendance from './components/student-profile/Attendance.svelte';
import GradeGraph from './components/student-profile/GradeGraph.svelte';
    import GradePerformance from './components/student-profile/GradePerformance.svelte';
    import GradeSummary from './components/student-profile/GradeSummary.svelte';
    import ProfileSection from './components/student-profile/ProfileSection.svelte';
    import PageLayout from './layouts/PageLayout.svelte';
    import PageTitle from './layouts/PageTitle.svelte';


    export let auth;
    export let errors = {};
    export let students;
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


    return (examsWeighted + projectsWeighted + othersWeighted).toFixed(2);
    }
    

</script>

<style>
    .border{
        border: 1px solid rgb(207, 207, 207) !important;
        border-radius: 5px;
    }
    .fa-solid{
        aspect-ratio: 1/1;
        width: 40px;
        font-size:25px;
    }
</style>


<PageLayout auth={auth} errors={errors} title={['Student',students.name,'Academic Performance']}>
    
      <section class="section profile">
        
        <ProfileSection  students={students}/>


        <div class="row">
            <div class="col-8">
                <section>

                    <div class="card p-3">
                    
                        <h5 class="p-3">Academic Progress</h5>
    
                        <div class="row">
                            <div class="col">
                                <div class="px-3 py-2 alert alert-primary">
                                    <h6>Current GPA</h6>
                                    <h2>96%</h2>
                                </div>
                            </div>
                            <div class="col">
                                <div class="px-3 py-2 alert alert-success">
                                    <h6>Credits Completed</h6>
                                    <h2>75/120</h2>
                                </div>
                            </div>
                            <div class="col">
                                <div class="px-3 py-2 alert alert-dark">
                                    <h6>Course Completion</h6>
                                    <h2>85%</h2>
                                </div>
                            </div>
                        </div>
    
                    </div>

                </section>
                    <div class="card p-3">
                    
                    <h5 class="p-3">Current Semester Courses</h5>

                    <div class="row">
                        <div class="col-12">
                            <div class="px-3 py-2 mb-3 border">
                                <div class="p-3 d-flex justify-content-between">
                                    <div>
                                        <h4>Capstone and Research 1</h4>
                                        <h6>Cap101</h6>
                                    </div>
                                    <div>
                                        <h3 class="text-success text-center">A</h3>
                                        <h6>{calculateFinalGrade(1)}%</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="px-3 py-2 mb-3 border">
                                <div class="p-3 d-flex justify-content-between">
                                    <div>
                                        <h4>Database Systems</h4>
                                        <h6>Cat101</h6>
                                    </div>
                                    <div>
                                        <h3 class="text-success">B</h3>
                                        <h6>87%</h6>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        
                        
                    </div>

                    </div>
                <section>

                </section>

            
            </div>

            <div class="col-4">
                <div class="card">
                    <h5 class="m-3">Achievements</h5>

                    <div class="row">
                        <div class="col-12">
                            <div class="m-3 mt-0">
                                <div class="d-flex align-items-center">
                                    <span class="p-2 border" style="color:orangered;"><i class="fa-solid fa-trophy d-flex align-items-center justify-content-center"></i></span> &nbsp; <div><h6 class="p-0 m-0"> Dean's Lister</h6><p class="p-0 m-0">2024</p></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="m-3 mt-0">
                                <div class="d-flex align-items-center">
                                    <span class="p-2 border" style="color:violet;"><i class="fa-solid fa-medal d-flex align-items-center justify-content-center"></i></span> &nbsp; <div><h6 class="p-0 m-0"> Academic Excellence</h6><p class="p-0 m-0">2024</p></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="m-3 mt-0">
                                <div class="d-flex align-items-center">
                                    <span class="p-2 border" style="color:violet;"><i class="fa-solid fa-medal d-flex align-items-center justify-content-center"></i></span> &nbsp; <div><h6 class="p-0 m-0"> Academic Excellence</h6><p class="p-0 m-0">2023</p></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="m-3 mt-0">
                                <div class="d-flex align-items-center">
                                    <span class="p-2 border" style="color:violet;"><i class="fa-solid fa-medal d-flex align-items-center justify-content-center"></i></span> &nbsp; <div><h6 class="p-0 m-0"> Academic Excellence</h6><p class="p-0 m-0">2022</p></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

      </section>

      
</PageLayout>

