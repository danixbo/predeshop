/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        colors: {
            'primary': '#6C63FF',
            'secondary': '#111111',
            'tertiary': '#2F2E41',
            'quaternary': '#eaeaea',
            'sidebar': '#1D1C1E',
        },
        fontFamily: {
            'poppins': ['Poppins', 'sans-serif'],
            'helvetica': ['Helvetica', 'sans-serif'],
        },
        fontWeight: {
            'bold': '700',
            'semibold': '600',
            'medium': '500',
            'regular': '400',
        },
      },
    },
    plugins: [],
  }