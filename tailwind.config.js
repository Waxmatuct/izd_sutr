const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.vue",
        "./resources/**/*.blade.php",
    ],
    darkMode: "class",
    theme: {
        extend: {
            fontFamily: {
                sans: ["Roboto", ...defaultTheme.fontFamily.sans],
            },
        },
        colors: {
            transparent: "transparent",
            current: "currentColor",
            black: colors.black,
            white: colors.white,
            gray: colors.gray,
            primary: colors.indigo,
            secondary: colors.green,
            red: colors.red,
            green: colors.green,
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
