<template>

    <!-- HEADER -->
   <header>

        <!-- Header Top -->
        <div class="header-top">

            <!-- Banner -->
            <div class="banner">
                BANNER
            </div>
        </div>

        <!-- Header Bottom -->
        <div class="header-bottom">

            <!-- Logo -->
            <div class="logo">
                LOGO
            </div>

            <!-- Login -->
            <div class="login">
                LOGIN
            </div>
        </div>
   </header>
</template>


<script>
export default {
    name: 'HeaderComponent',

}
</script>

<style lang="scss" scoped>
@import '../style/variables';
@import '../style/common';

header {

    .header-top,
    .header-bottom {
        display: flex;
        align-items: center;
    }
    .header-top {
        height: 5rem ;
        background-color: $primary-color; 
        color: $secondary-color;
        justify-content: center;
    }

    .header-bottom {
        height: 5rem ;
        background-color: $secondary-color;
        color: $primary-color;
        justify-content: space-between;
        padding: 1.2rem;
    }
}
</style>