<template>

  <section>
      <div class="jumbo_container d-flex justify-content-center align-items-center">
          <div class="ms_main-jumbotron">
            <div class="row">
              <div class="col ">
                  <div class="jumbotron-text">
                      <h2 class="front-office-style">TOAST RIDER</h2>
                      <p class="front-office-style">L'unico servizio di delivery che porta i migliori ristoranti a casa tua, <br>
                          rapidamente e senza spese di spedizione. <br>
                          Affidati al potere del toast!
                      </p>
                  <div>
              </div>
           </div>
        </div>
     </div>
      
          </div>
     </div>       
 </section>

</template>

<script>
export default {
        name: 'JumbotronComponent'
   }

</script>

<style lang="scss" scoped>

@import '../../style/variables';
@import '../../style/common';


  *{
          margin: auto;
      }
 .jumbo_container{
      margin-top: 5.5rem;
       background-image: url(https://i.ibb.co/zXPr22D/jumbotron-img.jpg);
       background-size: cover;
       background-repeat: no-repeat;
       background-position-x: 50%;
       background-position-y: 0;
       height: 700px;
       min-width: 100%;
       color: $secondary-color;
           .top_header{
             padding-top: 40px;
                 .logo{
                     
                     img{
                       width: 130px;
                     }
                   }
                 nav{
                   
                     ul{
                         li{
                           font-size: 1.2rem;
                           margin-right: 30px;
                         } 
                       }
                     
                     .js_button{
                       margin-left: 10px;
                     }
                  }
               }
           .ms_main-jumbotron{
            
           .jumbotron-text{
               text-align: center;
               padding:0 40px;

               p {
                    margin-top: 20px;
                    font-size: 1.7rem;
                    text-shadow: 2px 2px 0 #ffc509, 2px -2px 0 #ffc509,
                    -2px 2px 0 #ffc509, -2px -2px 0 #ffc509, 2px 0px 0 #ffc509,
                    0px 2px 0 #ffc509, -2px 0px 0 #ffc509, 0px -2px 0 #ffc509;
               }
           }
         }
    }
 </style>
 