module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            backgroundImage: theme => ({
                'jar-pattern': "url('/images/Sprinkle.svg')",
            })
        },
    },
    plugins: [],
}