<template>
  <header id="header">
    <div class="left">
      <a href="/">AuAu Studio</a>
    </div>
    <div class="right">
      <a href="/">Work</a>
      <a href="/">About</a>
      <a href="/">Contact</a>
      <a href="/">FR/EN</a>
    </div>
  </header>
</template>

<script setup>
// import { useRoute } from "vue-router";
// import { useSite } from "~/composables";
// import { usePage } from "~/composables";
// import LanguageSwitcher from "./LanguageSwitcher.vue";

// const page = usePage();
// const site = useSite();
// const route = useRoute();

console.log(
  "%cDesigned & developed by Aurian Aubert%cwww.apademide.ch",
  "font-size:12px;font-weight:bold;color:#000;background-color:#fff;padding:2px 10px 1px 10px;border-radius:2px;",
  "font-size:12px;color:#fff;background-color:#000;font-weight:bold;padding:3px 10px 2px 10px;border-radius:2px;margin-left:10px"
);
</script>

<style scoped lang="scss">
  #header {
    display: grid;
    grid-template-columns: 1fr 2fr;

    width: 100%;
    position: fixed;
    padding: var(--L-MARGIN-SMALL) 0;
    z-index: 10000;

    color: #eeeeee;
    mix-blend-mode: difference;
    border-bottom: 1px solid #eeeeee;


    div {
      display: flex;
      justify-content: space-between;

      padding: 0 var(--L-MARGIN-SMALL);

      a {
        display: inline-block;
      }
    }

  }
</style>
