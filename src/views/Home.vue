<template>
  <header class="welcome">
    <div class="image">
      <picture>
        <img src="https://images.unsplash.com/photo-1666694421187-75957423ee77" />
        <!-- <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330" /> -->
      </picture>
    </div>
    <div class="data">
      <a>
        <h2>Project</h2>
        <p>Very serious description</p>
      </a>
    </div>
  </header>

  <div class="headline">
    
    <h1>
      <div class="first">Multidisciplinary visual</div>
      <div class="second">creations</div>
      <div class="third">AuAu Studio</div>
    </h1>
    <hr>
    <h3>Switzerland based creative studio</h3>
  </div>

  <Gallery title="Personnal projects" />

  <Gallery title="Clients projects" />

</template>

<script setup>


// import { usePage } from "~/composables";

// const page = usePage();
// const photography = usePage("photography");

// // Example of `isReadyPromise()` page method
// (async () => {
//   await photography.isReadyPromise();
//   // Do something with the reactive page object
//   console.log("Photography page data has been loaded.");
//   console.log(photography.title);
// })();
</script>

<style lang="scss" scoped>
.welcome {
  height: 100vh;
  width: 100vw;


  .image {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;

    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  }

  .data {
    position: absolute;
    left: var(--L-MARGIN-NORMAL);
    bottom: var(--L-MARGIN-NORMAL);

    mix-blend-mode: difference;

    color: #eeeeee;
  }
}

.headline {
  font-size: 6rem;
  line-height: 0.9em;

  padding-bottom: var(--L-MARGIN-LARGE);

  z-index: 1;

  h1 {
    padding: var(--L-MARGIN-XLARGE) var(--L-MARGIN-SMALL) var(--L-MARGIN-SMALL) var(--L-MARGIN-SMALL);
    display: flex;
    flex-wrap: wrap;
    background-color: var(--C-BACK-HIGHLIGHT);

    white-space: nowrap;

    .first {
      width: 100%;
    }
    .second {
      width: 50%;
    }
    .third {
      width: 50%;
      text-align: right;
    }
  }
  hr {
    border: 2rem solid var(--C-BACK-SECONDARY);
  }
  h2 {
    display: none;
    padding: auto 0 auto auto;
    padding-left: 100%;
    text-align: right;
  }
  h3 {
    padding: var(--L-MARGIN-LARGE) var(--L-MARGIN-SMALL) var(--L-MARGIN-SMALL) calc( 100% / 3 + var(--L-MARGIN-SMALL) );
    text-align: left;
    /* font-feature-settings: "ss01"; */
    color: var(--C-TEXT-LIGHT);
    font-variation-settings: "wght" 350;
    font-size: var(--F-SIZE-NORMAL);
    line-height: 1em;
    display: block;
    background-color: var(--C-BACK-COLOR);
  }
}
</style>
