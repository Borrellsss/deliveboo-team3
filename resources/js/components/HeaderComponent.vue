<template>

    <!-- HEADER -->
   <header>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="logo-container">
                  <img class="logo" src="images/toast-rider-logo.svg" alt="toast-rider-logo">
                </div>
            </div>
            <div class="col">
                <div class="nav-container">
                    <div class="ms_banner d-flex justify-content-end">
                        <div class="ms_text d-flex align-items-center">
                            Sei un ristoratore? 
                        </div>
                        <div class="ms_login d-flex align-items-center">
                            <a href="/login" class="js_btn">
                                Accedi
                            </a>
                        </div>
                        <div class="ms_text d-flex align-items-center">
                            oppure 
                        </div>
                        <a href="/register" class="js_btn">
                            Registrati
                        </a>
                   </div>
               </div>
            </div>
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

// *{
//     margin: 0 auto;
// }

header{
    display: flex;
    align-items: center;
    height: 6rem;

    .logo-container{
        width: 5rem;
        .logo {
            width: 100%;
        }

        .js_btn{
            color: red;
            background-color: red;
        }
    }
}


</style>