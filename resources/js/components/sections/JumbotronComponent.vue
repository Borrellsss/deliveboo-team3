<template>
    <section>
        <div class="ms_container">
            <div class="top_header d-flex justify-content-between d-flex align-items-center">
                <div class="logo">
                  <img src="../assets/img/logo_seo_w_2x.png" alt="logo" />
                </div>
                <nav class="d-flex align-items-center">
                    <ul class="d-flex">
                       <NavList 
                          v-for="navLink, index in navLinks" :key="index" :item="navLink"
                       />
                    </ul>
                    <div class="ms_button">
                      <a href="#">get in touch now</a>
                    </div>
                </nav>
            </div>
            <div class="ms_jumbotron">
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
  
  <style>
  
  </style>