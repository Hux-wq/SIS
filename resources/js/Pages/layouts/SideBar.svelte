<script>
  import  SidebarLink  from './SidebarLink.svelte';
  import  DropdownSidebarLink  from './DropdownSidebarLink.svelte';
  import { onMount } from 'svelte';

  let sidebar;

  onMount(() => {
    if (sidebar) {
      sidebar.addEventListener('scroll', handleScroll);
    }

    return () => {
      if (sidebar) {
        sidebar.removeEventListener('scroll', handleScroll);
      }
    };
  });

  function handleScroll() {
    localStorage.setItem('sidebarScrollPosition', sidebar.scrollTop);
  }

  export let userid;
  export let username;

  let currentPath = window.location.pathname;

  window.addEventListener('popstate', () => 
    {
        currentPath = window.location.pathname;
    }
  );

  function setActivePath(path) 
    {
        currentPath = path;
    }

</script>

<style>
  .sidebar{
    background: linear-gradient(to bottom right, #18212f, #0c1e42) !important;
  }
</style>

<aside bind:this={sidebar}  id="sidebar" class="sidebar" style="z-index: 99;">

  <ul class="sidebar-nav" id="sidebar-nav" >


    <div class="flex items-center w-full p-1 pl-6" style="display: flex; align-items: center; padding: 3px; width: 40px; background-color: transparent; height: 4rem;">
      <div class="flex items-center justify-center" style="display: flex; align-items: center; justify-content: center;">
          <img src="https://elc-public-images.s3.ap-southeast-1.amazonaws.com/bcp-olp-logo-mini2.png" alt="Logo" style="width: 30px; height: auto;">
      </div>
    </div>

    <div style="display: flex; flex-direction: column; align-items: center; padding: 16px;">
      <div style="display: flex; align-items: center; justify-content: center; width: 96px; height: 96px; border-radius: 50%; background-color: #334155; color: #e2e8f0; font-size: 48px; font-weight: bold; text-transform: uppercase; line-height: 1;">
          <img src="img/profile-img.jpg" style="border-radius: 100%" alt="">
      </div>
      <div style="display: flex; flex-direction: column; align-items: center; margin-top: 24px; text-align: center;">
          <div class="h-txt-theme" style="font-weight: 500; color: #fff;">
              {username}
          </div>
          <div class="h-txt-theme" style="margin-top: 4px; font-size: 14px; color: #fff;">
              {userid}
          </div>
      </div>
  </div>
  <hr class="sidebar-divider">
  <SidebarLink  path={'/dashboard'} 
                heading={'Dashboard'} 
                label={'Dashboard'} 
                icon={'fa-solid fa-chart-pie'}
  />

  <hr class="sidebar-divider ">
  <SidebarLink  path={'/students'} 
                heading={'Find Student'} 
                label={'Students'} 
                icon={'fa-solid fa-graduation-cap'}
  />

  <hr class="sidebar-divider">
  <SidebarLink  path={'/Courses'} 
                heading={'Course and Subjects '} 
                label={'Course List'} 
                icon={'fa-solid fa-list'}
  />
  <SidebarLink  path={'/Program'} 
                label={'Programs'} 
                icon={'fa-solid fa-book'}
  />
  <SidebarLink  path={'/Department'} 
                label={'Department'} 
                icon={'fa-solid fa-building'}/>

  <hr class="sidebar-divider">
  <DropdownSidebarLink  heading={'Student Request'} 
                      dropdownName={'Document Requests'} 
                      path={['/EnrollmentCertificate','/GraduationCertificate', '/Trasncript', 'ID Print']} 
                      label={['Certificate of Enrollment','Certificate of Graduation', 'Trancript', 'ID Print']} 
                      icon={'fa-solid fa-folder-closed'}
                      currentPath={currentPath}
                      toggle={'student-request'}
  />
  <DropdownSidebarLink dropdownName={'Grade & Academic Records'} 
                      path={['/GradeEvaluation','/IncompleteGrade', ]} 
                      label={['Grade Re-Evaluation Request','INC Grade Completion Request']} 
                      icon={'fa-solid fa-folder-closed'}
                      currentPath={currentPath}
                      toggle={'grade-request'}
  />
  <DropdownSidebarLink dropdownName={'Financial & Payments'} 
                      path={['/TuitionFee','/Scholarship', ]} 
                      label={['Tuition Fee Breakdown Request','Scholarship Request']} 
                      icon={'fa-solid fa-credit-card'}
                      currentPath={currentPath}
                      toggle={'financial-request'}
  />
  <DropdownSidebarLink dropdownName={'Graduation & Clearance'} 
                      path={['/GraduationApplication','/Clearance','/Diploma' ]} 
                      label={['Application for Graduation','Clearance Request', 'Diploma']} 
                      icon={'fa-solid fa-user-graduate'}
                      currentPath={currentPath}
                      toggle={'grad-request'}
  />
  <DropdownSidebarLink dropdownName={'Miscellaneous Requests'} 
                      path={['/Internship','/SpecialExam']} 
                      label={['Internship & OJT Certification Request','Special Examination Request']} 
                      icon={'fa-brands fa-files-pinwheel'}
                      currentPath={currentPath}
                      toggle={'misc-request'}
  />

  <hr class="sidebar-divider">
  <DropdownSidebarLink  heading={'Reports and Analytics'} 
                      dropdownName={'Grade Report & Analytics'} 
                      path={  ['/StudentReports', '/ClassReports', '/SchoolReports']} 
                      label={ ['Student Reports', 'Class Reports', 'School Reports']} 
                      icon={'fa-solid fa-chart-line'}
                      currentPath={currentPath}
                      toggle={'reports-analytics'}
  />
  <SidebarLink path={'/EnrollmentReports'} label={'Enrollment Reports'} icon={'fa-solid fa-chalkboard-user'}/>

  </ul>

</aside>
 

