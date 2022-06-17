/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
  theme: {
    extend: {},
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
