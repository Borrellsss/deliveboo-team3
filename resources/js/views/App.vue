<template>
    <div>
            <HeaderComponent />

            <PaymentComponent />
       <main>
			<router-view></router-view>
	    </main>
    </div>
</template>

<script>

import HeaderComponent from '../components/HeaderComponent.vue';
import PaymentComponent from '../components/PaymentComponent.vue';

export default {
    name: 'App',
    components: {
        HeaderComponent, 
        PaymentComponent
    }
}
</script>

<style lang="scss">
@import '~bootstrap/scss/bootstrap';
@import '../style/variables';
@import '../style/common';

</style>
