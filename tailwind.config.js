module.exports = {
  purge: {
    content: ["./templates/**/*.blade.php"],
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
