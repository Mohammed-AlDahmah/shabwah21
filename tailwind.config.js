import defaultTheme from 'tailwindcss/defaultTheme';

export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        container: {
            center: true,
            padding: '1rem',
            screens: {
                sm: '640px',
                md: '768px',
                lg: '1024px',
                xl: '1280px',
                '2xl': '1400px', // يشابه عرض h21.news على الشاشات الكبيرة
            },
        },
        extend: {
            colors: {
                primary: '#D72835',
                secondary: '#0C1B2A',
                accent: '#F4B905',
                dark: '#2C3E50',
                light: '#F8F9FA',
                gray: '#6C757D',
            },
            fontFamily: {
                arabic: ['Noto Sans Arabic', ...defaultTheme.fontFamily.sans],
            },
            typography: ({ theme }) => ({
                DEFAULT: {
                    css: {
                        color: theme('colors.dark'),
                        a: {
                            color: theme('colors.primary'),
                            '&:hover': {
                                color: theme('colors.accent'),
                            },
                        },
                        h1: { fontWeight: '700', letterSpacing: '-.02em' },
                        h2: { fontWeight: '700', letterSpacing: '-.02em' },
                        h3: { fontWeight: '600' },
                    },
                },
            }),
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
    ],
};