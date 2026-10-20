/** Tailwind is used for layout utilities only (preflight off so Bootstrap + design-system.css stay untouched).
 *  Rebuild after adding classes:  npx tailwindcss -c tailwind.config.js -i src/tw-input.css -o assets/css/tw.css --minify */
module.exports = {
  content: ['./*.php', './*/*.php', './includes/*.php', './assets/js/*.js'],
  corePlugins: { preflight: false },
  theme: { extend: {} },
  plugins: []
};
