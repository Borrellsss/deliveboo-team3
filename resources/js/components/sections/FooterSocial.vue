<template>
    <li>
        <a :href="symbol.url"><i :class="`fa-brands fa-${symbol.name}`"></i></a>
    </li>
</template>

<script>
export default {
      name: 'FooterSocial',
    props: {
        symbol: Object
     }
  }
</script>

<style lang="scss" scoped>
//  @import '../assets/scss/vars.scss';
     .svg-inline--fa{
            height: 1.8em;
            color: $subtext-color;
            margin-right: 10px;
         }
</style>