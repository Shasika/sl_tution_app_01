export default {
  darkMode: 'class',
  content: [
    './resources/**/*.vue',
    './resources/**/*.js',
    './resources/**/*.blade.php'
  ],
  theme: {
    extend: {
      colors: {
        brand: {
          50: '#eff6ff',
          500: '#2563eb',
          600: '#1d4ed8'
        }
      }
    }
  },
  plugins: []
};
