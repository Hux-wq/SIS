import { createInertiaApp } from '@inertiajs/svelte';
import { Inertia } from '@inertiajs/inertia'; 

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.svelte', { eager: true })
    return pages[`./Pages/${name}.svelte`]
  },
  setup({ el, App, props }) {
    console.log(props);
    new App({ target: el, props });
  },
});
