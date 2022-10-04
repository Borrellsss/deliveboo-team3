<template>
    <div id='app'>
        <HeaderComponent />
        <UserRestaurantComponent />
    </div>
</template>

<script>

import HeaderComponent from '../components/HeaderComponent.vue';
import UserRestaurantComponent from '../components/UserRestaurantComponent.vue'


export default {
    name: 'App',
    components: {
        HeaderComponent,
        UserRestaurantComponent
       
    }
}
</script>

<style lang="scss">
@import '~bootstrap/scss/bootstrap';
@import '../style/variables';
@import '../style/common';

</style>
