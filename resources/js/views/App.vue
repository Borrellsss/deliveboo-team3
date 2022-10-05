<template>
    <div>
            <HeaderComponent />
       <main>
			<router-view></router-view>
	    </main>
        <MainComponent />
    </div>
</template>

<script>

import HeaderComponent from '../components/HeaderComponent.vue';
import MainComponent from '../components/MainComponent.vue';

export default {
    name: 'App',
    components: {
        HeaderComponent, 
        MainComponent
    }
}
</script>

<style lang="scss">
@import '~bootstrap/scss/bootstrap';
@import '../style/variables';
@import '../style/common';

</style>
