module.exports = {
  future: {
    removeDeprecatedGapUtilities: true,
  },
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
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
  ]
}
