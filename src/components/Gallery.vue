<template>
  <div class="header">
    <h4>{{ title }}</h4>
    <p>4 items</p>
    <p class="right">Date</p>
  </div>
  <div class="content">

    <li v-for="item in items">
      {{ item.message }}
    </li>

  </div>
</template>

<script>
export default {
  props: ['title'];
  data() {
  return {
    items: [{ message: 'Foo' }, { message: 'Bar' }]
  }
}
}

</script>

<style scoped lang="scss">
 .header {
  display: grid;
  grid-template-columns: repeat(3, 1fr);

  padding: var(--L-MARGIN-NORMAL) 0;
  border-top: var(--S-BORDER);
  border-bottom: var(--S-BORDER);

  > * {
    padding: 0 var(--L-MARGIN-SMALL);
  }
  
  .right {
    text-align: right;
  }
 }

 .content {
  padding: var(--L-MARGIN-SMALL);
  background-color: var(--C-BACK-SECONDARY)
 }
</style>
