<script>
      import { onMount } from 'svelte';

let isDarkMode = false;
let rootText = "Toggle Light Mode";

// Apply the theme based on the current mode
function applyTheme(isDark) {
  const root = document.documentElement;
  
  if (isDark) {
    root.style.setProperty('--bg-hover-theme', '#f6f9ff');
    root.style.setProperty('--bg-theme', '#c6d1e6');
    root.style.setProperty('--bg-box-theme', 'linear-gradient(to bottom right, #f3f3f3,rgb(219, 219, 219))');
    root.style.setProperty('--header-text-theme', '#1f2937');
    root.style.setProperty('--sub-text-theme', '#1d1d27');
    root.style.setProperty('--primary-color', '#2b38a6');
    root.style.setProperty('--yellow-sub-color', '#2b38a6');
    rootText = "Toggle Dark Mode";
  } else {
    root.style.setProperty('--bg-hover-theme', '#343738');
    root.style.setProperty('--bg-theme', '#022d41');
    root.style.setProperty('--bg-box-theme', 'linear-gradient(to bottom left, #18212f, #0c1e42)');
    root.style.setProperty('--header-text-theme', '#ffffff');
    root.style.setProperty('--sub-text-theme', '#889aab');
    root.style.setProperty('--primary-color', '#d84041');
    root.style.setProperty('--yellow-sub-color', '#fbff00');
    rootText = "Toggle Light Mode";
  }
}

// Check localStorage for the saved theme preference
onMount(() => {
  isDarkMode = localStorage.getItem('theme') === 'dark';
  applyTheme(isDarkMode);
});

// Toggle theme and save preference to localStorage
function toggleTheme() {
  isDarkMode = !isDarkMode;
  const newTheme = isDarkMode ? 'dark' : 'light';
  localStorage.setItem('theme', newTheme);
  applyTheme(isDarkMode);
}
</script>

<li>
    <button class="dropdown-item d-flex align-items-center" style="cursor: pointer" on:click={toggleTheme}>
    <i class="fa-solid fa-moon"></i>
    <span>{rootText}</span>
    </button>
</li>