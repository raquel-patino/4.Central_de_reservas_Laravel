/** @type {import('tailwindcss').Config} */
export default {
    content: [
      '../../vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
      '../../storage/framework/views/*.php',
      '../**/*.blade.php',
      '../**/*.js',
      '../**/*.vue',
      '../views',
    ],
    theme: {
      extend: {
        fontFamily: {
          elegant: ['Playfair Display', 'serif'],
          sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'],
          modern: ["Lora", "serif"],
        },
      },
    },
    plugins: [],
  }
  