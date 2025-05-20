/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/assets/**/*.js", "./resources/**/*.php"],
  theme: {
    extend: {
      colors: {
        'biblio-orange': '#F39C12',
        'biblio-cream': '#FFF3E0',
      },
    },
  },
  plugins: [],
}
