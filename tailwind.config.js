/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        'blue-50': '#eff6ff',
        'blue-100': '#dbeafe',
        'blue-500': '#3b82f6',
        'blue-600': '#2563eb',
      },
      fontFamily: {
        'sans': ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
        'montserrat': ['Montserrat', 'sans-serif'],
        'din-arabic': ['Noto Kufi Arabic', 'sans-serif'],
      },
    },
  },
  plugins: [],
};
