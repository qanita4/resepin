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
            colors: {
                'resepin-tomato': 'rgb(var(--resepin-tomato) / <alpha-value>)',
                'resepin-cream': 'rgb(var(--resepin-cream) / <alpha-value>)',
                'resepin-green': 'rgb(var(--resepin-green) / <alpha-value>)',
            },
        },
    },

    plugins: [forms],
};
