import typography from '@tailwindcss/typography';

export default {
  content: [
    './resources/**/*.antlers.html',
    './resources/**/*.blade.php',
    './resources/**/*.vue',
    './content/**/*.md'
  ],
  theme: {
    extend: {
        fontFamily: {
            'calgary': ['Calgary Serial', 'serif'],
            'Inter': ['Inter', 'sans-serif']
        },
    },
  },
  plugins: [
      typography
  ],
}
