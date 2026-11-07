import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './app/Livewire/**/*.php',
        './app/Filament/**/*.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    DEFAULT: '#1B1B6C',
                    light: '#3D52A0',
                    dark: '#0F1048',
                },
                secondary: '#3D52A0',
                accent: '#131454',
                background: '#F8FAFC',
                surface: '#FFFFFF',
                'text-main': '#0F172A',
                'text-secondary': '#334155',
                brand: {
                    50: '#EEF2FF',
                    100: '#E0E7FF',
                    500: '#5E72B8',
                    600: '#3B52A5',
                    700: '#1B1B6C',
                    900: '#0F1048',
                }
            },
            borderRadius: {
                '4xl': '2rem',
            },
            aspectRatio: {
                '4/5': '4 / 5',
                '9/16': '9 / 16',
                '21/9': '21 / 9',
            },
            animation: {
                'float': 'float 6s ease-in-out infinite',
                'bounce-slow': 'bounce-slow 3s ease-in-out infinite',
                'marquee': 'marquee 25s linear infinite',
            },
            keyframes: {
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-10px)' },
                },
                'bounce-slow': {
                    '0%, 100%': { transform: 'translateY(-5%)', animationTimingFunction: 'cubic-bezier(0.8, 0, 1, 1)' },
                    '50%': { transform: 'translateY(0)', animationTimingFunction: 'cubic-bezier(0, 0, 0.2, 1)' },
                },
                marquee: {
                    '0%': { transform: 'translateX(0%)' },
                    '100%': { transform: 'translateX(-50%)' },
                },
            },
        },
    },

    plugins: [forms, typography],
};
