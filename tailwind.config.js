module.exports = {
    mode: 'jit',
    content: [
        "./theme/**/*.{twig,php}",
        "./src/**/*.{vue,js,ts,jsx,tsx}",
    ],
    theme: {
        extend: {
            fontSize: {
                '120': ['7.5rem', { lineHeight: '6.75rem', letterSpacing: '0em', }],
            },
            colors:{
                'color':'var(--color)',
            }
        },
    }
}
