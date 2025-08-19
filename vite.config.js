import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/layout.css',            // <--- nuevo
        'resources/js/ui.js',                  // <--- nuevo
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/css/features/dashboard.css', 
      ],
      refresh: true,
    }),
  ],
})
