/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./app/Http/Livewire/**/*.php",
  ],
  theme: {
    extend: {
      colors: {
        primary: "#C08B2D",
        secondary: "#B22B2B",
        accent: "#F4B905",
        dark: "#2C3E50",
        light: "#F8F9FA",
        gray: "#6C757D",
      },
      fontFamily: {
        arabic: [
          'Tajawal',
          'Cairo',
          'Noto Sans Arabic',
          'ui-sans-serif',
          'system-ui',
          'sans-serif',
        ],
      },
    },
  },
  plugins: [],
};