/** @type {import('tailwindcss').Config} */

const colors = require('tailwindcss/colors')

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    // extend: {},
    // colors: {
    //   'background': '#0a100a',
    //   'surface': '#0c150d',
    //   'words': '#eefff2',
    //   'primary': '#ffffff',
    //   'secondary': '#ffffff',
    //   red: colors.red,
    // }

    extend: {},
    colors: {
      'background': '#121d12',
      'surface': '#162718',
      'lighter': ' #1f2e20',
      'words': '#eefff2',
      'primary': '#ffffff',
      'secondary': '#ffffff',
      red: colors.red,
      black: colors.black,
      slate: colors.slate,
      white: colors.white,
      blue: colors.blue,
      green: colors.green,
      gray: colors.gray,

    },
    // transitionDuration: {
    //   '2000': '2000ms',
    // }
  },
  plugins: [
    // require('@tailwindcss/forms'),
  ],
}



