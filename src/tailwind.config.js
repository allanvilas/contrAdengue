module.exports = {
    content: [
        "./**/*.php",
        "./resources/css/**/*.{css,html,js}"
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
                display: ['Poppins', 'sans-serif'],
            },
            colors: {
                background: 'var(--color-background)',
                surface: 'var(--color-surface)',
                surfaceTone: 'var(--color-surfaceTone)',
                primary: 'var(--color-primary)',
                secondary: 'var(--color-secondary)',
                danger: 'var(--color-danger)',
                success: 'var(--color-success)',
                accent: 'var(--color-accent)',
                text: 'var(--color-text)',
                'text-muted': 'var(--color-text-muted)',
            }
        }
    },
    plugins: [],
}
