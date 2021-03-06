/** @type {import('tailwindcss').Config} */
module.exports = {
    mode: 'jit',
    content: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            backgroundImage: {
                'hero-tm-tantoura': "url('/assets/tantoura.jpg')",
            }
        },
        fontFamily: {
            'sans': ['Montserrat', 'ui-sans-serif', 'system-ui'],
            'serif': ['ui-serif', 'Georgia'],
            'mono': ['"Ubuntu Mono"', 'ui-monospace', 'SFMono-Regular', 'monospace'],
            'display': ['Ubuntu', 'system-ui'],
            'body': ['Montserrat', 'system-ui'],
        },
        plugins: [],
    }
}
