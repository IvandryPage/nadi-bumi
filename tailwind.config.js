tailwind.config = {
  theme: {
    extend: {
      colors: {
        primary: '#285430',
        secondary: '#5F8D4E',
        accent: '#A4BE7B',
        neutral: '#E5D9B6',
      },
      fontFamily: {
        roboto: ['Ubuntu', 'sans-serif'],
      },
    },
  },
  content: [
    "./*.{php,html}",
    "./includes/**/*.{php,html}",
    "./assets/js/**/*.{js}",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}