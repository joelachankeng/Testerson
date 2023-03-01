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
  content: [
    "./src/**/*.{html,js,php}",
    "./template-parts/**/*.{html,js,php}",
    "./*.php",
  ],
  theme: {
    extend: {
      fontSize: {
        sm: [
          "0.875rem",
          {
            lineHeight: "1.063rem",
            letterSpacing: "0.01em",
            fontWeight: "400",
          },
        ],
        "sm-x": [
          "0.938rem",
          {
            lineHeight: "1.125rem",
            letterSpacing: "0.05em",
          },
        ],
      },
      fontFamily: {
        sans: ["Montserrat", "sans-serif"],
      },
      colors: {
        brand: {
          medBlue: "#0072BB",
          grey: "#555555",
          brightSalmon: "#FB4E64",
          darkGrey: "#53524D",
          brightCyan: "#00B2FF",
        },
        bg: {
          darkGrey: "#272725",
        },
      },
    },
  },
  plugins: plugins,
};
