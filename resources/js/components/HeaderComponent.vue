<template>

    <!-- HEADER -->
   <header>

        <!-- Header Top -->
        <div class="ms_header-top">

            <!-- Banner -->
            <div class="ms_banner">
                <div class="ms_text">
                    Hai un ristorante? 
                </div>
                <a href="/register" class="ms_btn">
                    Registrati
                </a>
            </div>
        </div>

        <!-- Header Bottom -->
        <div class="ms_header-bottom">

            <!-- Logo -->
            <div class="logo-container">
                
                <img class="logo" src="images/toast-rider-logo.svg" alt="toast-rider-logo">
            </div>

            <!-- Login -->
            <div class="ms_login">
                <a href="/login" class="ms_btn">
                    Accedi
                </a>
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

    .ms_header-top,
    .ms_header-bottom,
    .ms_banner {
        display: flex;
        align-items: center;
    }
    .ms_header-top {
        height: 5rem ;
        background-color: $primary-color; 
        color: $secondary-color;
        justify-content: center;

        .ms_text {
            padding-inline: 0.5rem;
        }
    }

    .ms_header-bottom {
        height: 5rem ;
        color: $primary-color;
        justify-content: space-between;
        padding: 1.2rem;
        border-bottom: 1px solid lightgrey;

        .logo {
            width: 35%;
        }
    }
}
</style>