<template>
   <div>
    <h1>header</h1>
   </div>
</template>


<script>
export default {
    name: 'HeaderComponent',

}
</script>

<style lang="scss" scoped>
@import '../style/variables';
@import '../style/common';

h1 {
    color: $primary-color;
}
</style>