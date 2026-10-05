import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',

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
                    biblioteca: {
                    50: '#f1f8f4',
                    100: '#dcefe3',
                    500: '#2f855a',
                    700: '#276749',
                    900: '#1c4532',
                },
            },
        },
    },

    plugins: [forms],
};
