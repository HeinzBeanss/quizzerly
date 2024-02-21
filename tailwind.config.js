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

    extend: {
      colors: {
        // 'background': '#121d12',
        // 'surface': '#162718',
        // 'lighter': ' #1f2e20',
        // 'words': '#eefff2',
        // 'primary': '#ffffff',
        // 'secondary': '#ffffff',
        'background': '#11202a',
        'surface': '#09796d',
        'lighter': ' #0d8071',
        'words': '#B6CFCA',
        'primary': '#ffffff',
        'secondary': '#ffffff',
        'faint': '#f7f7f7',
        'category': '#e3e9e4',
        'faintest': '#F0F7F6',
        'almostwhite': '#fcfcfc'
      },
      height: {
        '200': '34rem',
        '250': '44rem',
        '300': '48rem',
      },
      width: {
        '85/100': '85%',
      }
    },
    // transitionDuration: {
    //   '2000': '2000ms',
    // }
    fontFamily: {
      rubik: ['Rubik', 'sans-serif'],
      roboto: ['Roboto', 'sans-serif'],
    },
  },

  plugins: [
    // require('@tailwindcss/forms'),
  ],
}



