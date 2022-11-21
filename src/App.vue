<template>

  <Header />

  <main id="main" tabindex="-1">

    <RouterView :key="route.path" />

  </main>

  <Footer />

</template>

<script setup>
import { useRoute } from "vue-router";
const route = useRoute();
</script>

<style>
#app {
  background: white;
  height: 100vh;
  width: 100vw;
  font-size: var(--F-SIZE-NORMAL)
}
:root {
  font-size: 10px;
  font-variation-settings: "wght" 425;

  --C-BACK-MAIN: #BBBBBB;
  --C-BACK-HIGHLIGHT: #FFFFFF;
  --C-BACK-SECONDARY: #EFEFEF;
  --C-BACK-COLOR: #170049;

  --C-TEXT-DARK: black;
  --C-TEXT-LIGHT: white;

  --L-MARGIN-XLARGE: 25rem;
  --L-MARGIN-LARGE: 10rem;
  --L-MARGIN-NORMAL: 1.75rem;
  --L-MARGIN-SMALL: 1rem;
  --L-MARGIN-XSMALL: 0.5rem;

  --L-HEIGHT-NORMAL: 5rem;

  --S-BORDER: 1PX solid currentColor;

  --F-SIZE-LARGE: 5rem;
  --F-SIZE-NORMAL: 1.5rem;
  --F-SIZE-SMALL: 1.25rem;
}
a {
  text-decoration: none;
}
</style>