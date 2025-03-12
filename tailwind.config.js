import preset from "./vendor/filament/support/tailwind.config.preset";

import daisyui from "daisyui";

export default {
    presets: [preset],
    content: [
        "./app/Filament/**/*.php",
        "./resources/views/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                gold: {
                    100: "#faf1d3",
                    200: "#f6e3a7",
                    300: "#f1d57b",
                    400: "#edc74f",
                    500: "#e8b923",
                    600: "#ba941c",
                    700: "#8b6f15",
                    800: "#5d4a0e",
                    900: "#2e2507",
                },
            },
        },
    },
    plugins: [],
};
