<template>
   <section>
       <div class="container d-flex">
        <div class="join-us-container d-flex align-items-center ">
            <div class="row">
                <div class="col">
                  <div class="text-container">
                    <h3>Hai un ristorante?</h3>
                    <h4>
                        Diventa Partner! <br> Per te subito grandi vantaggi.
                    </h4>
                    <a class="js_btn" href="/register">Registrati <i class="cell-symbol  fa-solid fa-right-to-bracket"></i></a>
                  </div>
                </div>
            </div>
        </div>
    </div>
   </section>
</template>

<script>
export default {
    name: 'JoinUsComponent'

}
</script>

<style lang="scss" scoped>

    @import '../../style/variables';
    @import '../../style/common';

    .join-us-container{
        margin-bottom: 3rem;
       margin-top: 5.5rem;
       background-image: url(https://i.ibb.co/vDdrPkr/mockup-background.jpg);
      //  background-image: url(../../../../public/images/jumbotron-img.jpg);
       background-size: cover;
       background-repeat: no-repeat;
       background-position-x: 10%;
       background-position-y: 0;
       height: 500px;
       min-width: 100%;
       color: $secondary-color;
       border-radius: 20px;
    }

    .text-container{
        color: $primary-color;
        text-align: left;
        padding-left: 5rem;
        padding-right: 5rem;

            h3{
                font-size: 2.5rem;
            }

            h4{
                font-size: 1.5rem;
                margin: 0.5rem 0;
            }

            .js_btn{
                font-size: 1.2rem;
                margin: 0.5rem 0.3rem;
                padding: 0.1em 0.8em;
                display: inline-block;
                border: none;
                border-radius: 10rem;
                background-color: $primary-color;
                color: $tertiary-color;
                font-weight: 600;

            }


    }


</style>