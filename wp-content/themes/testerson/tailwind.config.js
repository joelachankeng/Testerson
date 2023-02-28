const options = require("./config"); //options from config.js
const defaultTheme = require("tailwindcss/defaultTheme");

const allPlugins = {
  typography: require("@tailwindcss/typography"),
  forms: require("@tailwindcss/forms"),
  lineClamp: require("@tailwindcss/line-clamp"),
  containerQueries: require("@tailwindcss/container-queries"),
};

const plugins = Object.keys(allPlugins)
  .filter((k) => options.plugins[k])
  .map((k) => {
    if (k in options.plugins && options.plugins[k]) {
      return allPlugins[k];
    }
  });

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {
      fontFamily: {},
      colors: {
        brand: {
          primary: "#FFF",
          secondary: "#FFF",
          tertiary: "#FFF",
        },
      },
    },
  },
  plugins: plugins,
};
