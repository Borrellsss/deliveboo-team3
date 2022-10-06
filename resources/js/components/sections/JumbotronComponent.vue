<template>
    <section>
        <div class="js_container">
            <div class="top_header d-flex justify-content-between d-flex align-items-center">
                <div class="logo">
                    <img class="logo" src="images/toast-rider-logo.svg" alt="toast-rider-logo">
                </div>
                <nav class="d-flex align-items-center">
                    <ul class="d-flex">
                       ciao
                    </ul>
                    <div class="js_button">
                      <a href="#">get in touch now</a>
                    </div>
                </nav>
            </div>
            <div class="js_jumbotron">
              <div class="row row-cols-2">
                <div class="col">
                  <h2>SEM Campaign Made simple With Avada</h2>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, sunt vero! Delectus est aspernatur magnam illum! </p>
                  <div class="buttons">
                    <span class="ms_button">buy avada now</span>
                    <span class="ms_button blue">contact us</span>
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

    *{
            margin: auto;
        }
   .js_container{
         background-image: url(../../../../public/images/jumbotron-img.jpg);
         background-size: cover;
         background-repeat: no-repeat;
         background-position-x: 50%;
         background-position-y: 0;
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
             padding: 240px 0;
                   p{
                     margin: 20px 0 40px 0;
                     padding-right: 1.5rem;
                     text-align: start;
                   }
                 
                   .buttons{
                       .js_button{
                           margin-right: 1.3rem;
                           letter-spacing: 2px;
                           padding: 0.8rem 2.3rem;
                           border-radius: 30px;
                       }
                       .js_button.blue{
                         background-color: red($color: #000000);
                       }
                     }
                 }
        }
   </style>
   