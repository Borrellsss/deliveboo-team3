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
            <div class="col  d-flex align-items-center justify-content-end">
                <div class="nav-container">
                    <div class="ms_banner d-flex">
                        <div class="ms_text d-flex align-items-center">
                            Sei un ristoratore? 
                        </div>
                        <div class="ms_login">
                            <a href="/login" class="js_btn">
                                <i class="fa-thin fa-user"></i>  Accedi
                            </a>
                        </div>
                        <div class="ms_text d-flex align-items-center">
                            oppure 
                        </div >
                        <div class="ms_register">
                            <a href="/login" class="js_btn">
                                Registrati
                            </a>
                        </div>
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

.col {
    flex-basis: 0;
    flex-grow: 1;
    max-width: 70%;
}

header{
    display: flex;
    align-items: center;
    height: 6rem;

    .logo-container{
        width: 5rem;
        .logo {
            width: 100%;
        }

    }

    .ms_banner{

        .ms_text{
                    display: none;
                  }

        .js_btn{
            margin: 0 0.3rem;
            padding: 0.1em 0.8em;
            display: inline-block;
            border: none;
            border-radius: 10rem;
            background-color: $primary-color;
            color:white;
            font-weight: 600;

        }

    }
}

 // SCHERMO LARGE 
 @media only screen and (max-width: 992px) {
                  .ms_text{
                    display: none;
                  }
                }      


</style>