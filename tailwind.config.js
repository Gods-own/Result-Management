module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            backgroundImage: theme => ({
                'jar-pattern': "url('/public/Sprinkle.svg')",
            })
        },
    },
    plugins: [],
}
