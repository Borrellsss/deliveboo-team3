<template>
    <div>
            <HeaderComponent/>
            <MainComponent/>
       <main>
			<router-view></router-view>
	    </main>
        <FooterComponent/>
    </div>
</template>

<script>


import HeaderComponent from '../components/HeaderComponent.vue';
import MainComponent from '../components/MainComponent.vue';
import FooterComponent from '../components/FooterComponent.vue';

export default {
    name: 'App',
    components: {
        HeaderComponent, 
        MainComponent,
        FooterComponent,
    }
}


</script>

<style lang="scss">
@import '~bootstrap/scss/bootstrap';
@import '../style/variables';
@import '../style/common';

</style>
