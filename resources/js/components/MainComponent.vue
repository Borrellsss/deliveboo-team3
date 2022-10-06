<template>
  <main>
    ciao sono il main component
    <JumbotronComponent/>
  </main>
</template>

<script>

  import JumbotronComponent from '../components/sections/JumbotronComponent.vue';
  
  export default {
      name: 'MainComponent',
      components: {
          JumbotronComponent,
      }
  }

</script>

<style lang="scss" scoped>

  main{
    background-color: lightgray;
  }

  

</style>