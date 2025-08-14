import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
  plugins: [
    laravel({
      input: [
        "resources/css/app.css", // Main CSS
        "resources/js/app.js", // Main JS
      ],
      refresh: true,
    }),
    tailwindcss(),
  ],
});
