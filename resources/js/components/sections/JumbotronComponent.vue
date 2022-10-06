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
                  <h2>TOAST RIDER</h2>
                  <p>L'unico servizio di delivery che porta i migliori ristoranti a casa tua <br>
                      rapidapente, senza spese spedizione! 
                      Affidati al potere del toast!
                  </p>
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

  *{
          margin: auto;
      }
 .js_container{
      //  background-image: url(../../../../public/images/jumbotron-img.jpg);
       background-size: cover;
       background-repeat: no-repeat;
       background-position-x: 50%;
       background-position-y: 0;
       height: 400px;
       min-width: 100%;
       color: red;
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
              background-color: pink;
              
               
            
           .jumbotron-text{
               text-align: center;
               padding:0 40px;

               p{
                 margin-top: 20px;
                 padding-right: 1.5rem;
               }
           }
               
              //    .buttons{
              //        .js_button{
              //            margin-right: 1.3rem;
              //            letter-spacing: 2px;
              //            padding: 0.8rem 2.3rem;
              //            border-radius: 30px;
              //        }
              //        .js_button.blue{
              //          background-color: red($color: #000000);
              //        }
              //      }
               }
      }
 </style>
 