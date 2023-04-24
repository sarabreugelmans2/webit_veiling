const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './src/**/*.{html,js}'
    ],

    theme: {
        extend: {
            backgroundImage: {
                'stripes': "url('https://www.webit.be/wp-content/themes/webit/images/stripes.png')",
            },
            content:  {
                'stripes': "url('https://www.webit.be/wp-content/themes/webit/images/stripes.png')",
            },
            colors: {
                'webit': '#5BBDEE'
            },

        },

        fontFamily: {
            serif: ['Martel', ...defaultTheme.fontFamily.serif],
        },

    },

    plugins: [require('@tailwindcss/forms')],
};
