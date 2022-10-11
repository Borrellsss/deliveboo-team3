<template>
    <div>
            <HeaderComponent />

            <PaymentComponent />
       <main>
			<router-view></router-view>
	    </main>
        <FooterComponent/>
        
    </div>
</template>

<script>

import HeaderComponent from '../components/HeaderComponent.vue';
import PaymentComponent from '../components/PaymentComponent.vue';
import FooterComponent from '../components/FooterComponent.vue';
import '@fortawesome/fontawesome-free/js/all.js';
export default {
    name: 'App',
    components: {
        HeaderComponent, 
        PaymentComponent,
        FooterComponent
    },
    computed: {
        isUserLogged() {
            return  window.userLogged;
        }
    }
}
</script>

<style lang="scss">
@import '~bootstrap/scss/bootstrap';
@import '../style/variables';
@import '../style/common';

*{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;;
}



</style>
