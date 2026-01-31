import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                'soft-green': '0 24px 100px 0px rgba(38, 89, 73, 0.35)',
                'orange-glow': '0 10px 25px rgba(235, 125, 77, 0.35)',
                'gray': '0 48px 100px 0px rgba(17, 12, 46, 0.35)',
                'soft-gray': '0 48px 100px 0px rgba(17, 12, 46, 0.15)',
            },
            dropShadow: {
                'soft-green': '0 20px 35px rgba(38, 89, 73, 0.35)',
                'orange-glow': '0 18px 30px rgba(235, 125, 77, 0.4)',
                'gray': '0 48px 100px 0px rgba(17, 12, 46, 0.35)',
                'soft-gray': '0 48px 100px 0px rgba(17, 12, 46, 0.15)',
            },
        },
    },

    plugins: [forms],
};
