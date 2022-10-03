<template>
    <div id='app'>
        <HeaderComponent />
    </div>
</template>

<script>

import HeaderComponent from '../components/HeaderComponent.vue';

export default {
    name: 'App',
    components: {
        HeaderComponent
    }
}
</script>

<style lang="scss">
@import '../style/variables';
@import '../style/common';
</style>
