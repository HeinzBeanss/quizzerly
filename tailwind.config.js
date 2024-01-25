/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {},
    colors: {
      'background': '#ffffff',
      'surface': '#ffffff',
      'words': '#ffffff',
      'primary': '#ffffff',
      'secondary': '#ffffff',
    }
  },
  plugins: [
    // require('@tailwindcss/forms'),
  ],
}

