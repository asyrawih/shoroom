module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
  },
  theme: {
    extend: {
      colors: {
        main: '#2E2C2F',
        secondary : '#F7E733'
      },
    }
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),
  ],
}
