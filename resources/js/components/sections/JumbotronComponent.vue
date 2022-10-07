<template>
  <section>
      <div class="js_container d-flex justify-content-center align-items-center">
          <!-- <div class="top_header d-flex justify-content-between d-flex align-items-center">
              <div class="logo">
                  <img class="logo" src="images/toast-rider-logo.svg" alt="toast-rider-logo">
              </div>
              <nav class="d-flex align-items-center">
                  <div class="js_button">
                    <a href="#">get in touch now</a>
                  </div>
              </nav>
          </div> -->
          <div class="js_jumbotron">
            <div class="row">
              <div class="col ">
                  <div class="jumbotron-text">
                  <h2 class="jack">TOAST RIDER</h2>
                  <p class="jack">L'unico servizio di delivery che porta i migliori ristoranti a casa tua, <br>
                      rapidamente e senza spese di spedizione. <br>
                      Affidati al potere del toast!
                  </p>
                 <div>
                  
                 </div>
              </div>
              <!-- <div class="buttons">
                  <span class="js_button">buy avada now</span>
                  <span class="js_button blue">contact us</span>
              </div> -->
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
 .js_container{
      margin-top: 5.5rem;
       background-image: url(https://i.ibb.co/zXPr22D/jumbotron-img.jpg);
      //  background-image: url(../../../../public/images/jumbotron-img.jpg);
       background-size: cover;
       background-repeat: no-repeat;
       background-position-x: 50%;
       background-position-y: 0;
       height: 500px;
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
           .js_jumbotron{
              
               
            
           .jumbotron-text{
               text-align: center;
               padding:0 40px;


               p{
                 margin-top: 20px;
                 text-shadow: 2px 2px 0 #ffc509, 2px -2px 0 #ffc509,
                  -2px 2px 0 #ffc509, -2px -2px 0 #ffc509, 2px 0px 0 #ffc509,
                   0px 2px 0 #ffc509, -2px 0px 0 #ffc509, 0px -2px 0 #ffc509;
               }
           }
               
          }
       
                }
 </style>
 