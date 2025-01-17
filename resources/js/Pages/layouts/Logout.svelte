<script>
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
    function logout() {
      // Create the form and add the CSRF token to the request
      const form = document.createElement('form');
      form.method = 'POST';
      form.action = '/logout';
      
      const csrfInput = document.createElement('input');
      csrfInput.type = 'hidden';
      csrfInput.name = '_token';
      csrfInput.value = csrfToken;
      
      form.appendChild(csrfInput);
  
      // Submit the form
      document.body.appendChild(form);
      form.submit();
    }
  </script>
  
  <li>
    <button type="button" on:click={logout} class="dropdown-item d-flex align-items-center">
      <i class="fa-solid fa-right-from-bracket"></i>
      <span>Log Out</span>
    </button>
  </li>
  