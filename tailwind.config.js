const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/tw-elements/dist/js/**/*.js',
        './vendor/wire-elements/modal/resources/views/*.blade.php'
    ],
    safelist: [{
        pattern: /./,
        variants: ['hover', 'focus', 'sm', 'md'],
    },],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Fredoka', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'arma3': "url('/images/bg.jpg')",
                'sg-icon': "url('/images/sg.png')"
            },
            opacity: ['enabled'],
            colors: {
                'portal-red': '#D02F3C',
                'portal-gray': '#0E0E0D'
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('tw-elements/dist/plugin')],
};
