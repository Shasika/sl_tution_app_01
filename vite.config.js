import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/js/main.js', 'resources/js/styles.css'],
      refresh: true
    }),
    vue()
  ],
  build: {
    outDir: 'public/build',
    emptyOutDir: true
  },
  server: {
    port: 5173
  }
});
