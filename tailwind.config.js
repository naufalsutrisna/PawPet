/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/**/*.blade.php",
  ],
  theme: {
    extend: {
      colors: {
        secondary: "#735943",
        secondary80: "#E2C0A5",
        tertiary50: "#2B7BBD",
        neutral98: "#FFF8F5",
        neutral40: "#655D58",
      },
      fontFamily: {
        Poppins: ["Poppins", "sans-serif"],
      },
      screens: {
        xs: "480px",
        ss: "620px",
        sm: "768px",
        md: "1060px",
        lg: "1200px",
        xl: "1700px",
      },
    },
  },
  plugins: [],
}

