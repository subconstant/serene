/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './views/**/*.twig',
    './src/**/*.js',
    './src/**/*.scss',
  ],
  theme: {
    fontFamily: {
      'display': 'IBM Plex Mono, Helvetica, Arial, sans-serif',
      'comic': 'Comic Sans MS'
    },
    extend: {
      colors: {
        'primary': '#1703fc',
      },
      typography: {
        DEFAULT: {
          css: {
            maxWidth: 'unset'
          }
        }
      }
    },
  },
  plugins: [
    require('@tailwindcss/typography')
  ],
};