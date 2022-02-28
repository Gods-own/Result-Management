module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            backgroundImage: {
                'jar-pattern': "url('./public/Sprinkle.svg')",
            }
        },
    },
    plugins: [],
}