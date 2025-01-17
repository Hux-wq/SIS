
import { createInertiaApp } from '@inertiajs/svelte'
import Sidebar from './Pages/layouts/SideBar.svelte';
import MenuOptions from './Pages/layouts/MenuOptions.svelte';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.svelte', { eager: true })
    return pages[`./Pages/${name}.svelte`]
  },
  setup({ el, App, props }) {
    new App({ target: el, props })
  },
});

new Sidebar({
    target: document.getElementById('sidebarlayout'),
});

new MenuOptions({
    target: document.getElementById('MenuOptions'),
});


