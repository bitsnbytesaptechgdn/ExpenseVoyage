import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/backend/maps/vertical-layout-light/style.css.map",
                "resources/css/backend/vertical-layout-light/style.css",
                "resources/js/app.js",
                "resources/js/backend/Chart.roundedBarCharts.js",
                "resources/js/backend/dataTables.select.min.js",
                "resources/js/backend/hoverable-collapse.js",
                "resources/js/backend/off-canvas.js",
                "resources/js/backend/template.js",
                "resources/js/backend/settings.js",
                "resources/js/backend/todolist.js",
                "resources/js/backend/dashboard.js",
            ],
            refresh: true,
        }),
    ],
});
