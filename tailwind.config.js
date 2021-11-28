module.exports = {
  purge: {
    content: ["./src/Templates/**/*.blade.php"],
    safelist: ["bg-green-500", "bg-yellow-500"],
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
};
