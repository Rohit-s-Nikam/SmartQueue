#!/bin/sh
# Rebuild the Tailwind utility file (needs Node). Run from the project root.
npx tailwindcss -c tailwind.config.js -i src/tw-input.css -o assets/css/tw.css --minify
