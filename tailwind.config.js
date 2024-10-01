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
    },
    extend: {},
  },
  plugins: [],
};