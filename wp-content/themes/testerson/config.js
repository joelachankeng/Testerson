module.exports = {
  config: {
    tailwindjs: "./tailwind.config.js",
    port: 9000,
  },
  plugins: {
    typograpy: true,
    forms: true,
    lineClamp: true,
    containerQueries: true,
  },
  paths: {
    root: "./",
    src: {
      base: ".",
      css: "./src/css",
      js: "./src/js",
      img: "./src/img",
    },
    dist: {
      base: "./dist",
      css: "./dist/css",
      js: "./dist/js",
      img: "./dist/img",
    },
    build: {
      base: "./build",
      css: "./build/css",
      js: "./build/js",
      img: "./build/img",
    },
  },
};
