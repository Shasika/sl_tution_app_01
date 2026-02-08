import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
  plugins: [vue()],
  root: '.',
  build: {
    outDir: 'public/build',
    emptyOutDir: true
  },
  server: {
    port: 5173
  }
});
