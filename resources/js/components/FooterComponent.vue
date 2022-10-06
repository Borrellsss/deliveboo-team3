<template>
    <footer>
    <div class="ms_container d-flex flex-column align-items-center">
        <div class="logo_container">
          <!-- <img src="../assets/img/logo_seo_2x.png" alt="Seo logo"> -->
         </div>
          <ul class="footer_links d-flex justify-content-between">
            <FooterList 
                v-for="navLink, index in navLinks" :key="index" :item="navLink"
              />
          </ul>
          <ul class="site_info d-flex justify-content-center">
              <li>
                &copy; Copyright 2012-2020
              </li>
              <li>
                Avada theme by <span>ThemeFusion</span>
              </li>
              <li>
              All Rights Reserved
              </li>
              <li>
                Powered by <span>WordPress</span>
              </li> 
          </ul>
          <ul class="social_links d-flex justify-content-center">
              <FooterSocial
                v-for="socialLink, index in socialLinks" :key="index" :symbol="socialLink"
              />
          </ul>
     </div>
  </footer>
</template>

<script>
  import FooterList from './sections/FooterList.vue'
  import FooterSocial from './sections/FooterList.vue'

export default {
  name: 'FooterComponent',
  components: {
        FooterList,
        FooterSocial
 },
  data() {
     return {
         navLinks: [
             {
                 text: 'Home',
                 url: '#',
                 current: true,
             },
             {
                 text: 'Who We Are',
                 url: '#',
                 current: false,
             },
             {
                 text: 'What We Do',
                 url: '#',
                 current: false,
             },
             {
                 text: 'Where We Work',
                 url: '#',
                 current: false,
             },
             {
                 text: 'Carrers',
                 url: '#',
                 current: false,
             },
             {
                 text: 'News',
                 url: '#',
                 current: false,
             },
              {
                 text: 'Get in Touch Now',
                 url: '#',
                 current: false,
             },
         ],
         socialLinks: [
             {
                 name: 'facebook',
                 url: '#',
             },
             {
                 name: 'instagram',
                 url: '#',
             },
             {
                 name: 'twitter',
                 url: '#',
             }, 
                  {
                 name: 'youtube',
                 url: '#',
             }, 
        ],
     };
 }
}

</script>

<style lang="scss" scoped>

@import '../style/variables';
@import '../style/common';

  *{
    margin: 0 auto;
}
.ms_container{ 
    width: 60%;
    .logo_container{
    
          img{
            width: 170px;
            margin: 80px 0 50px 0;
          }
      }
    ul{
      width: 100%;
     }
      .footer_links{
      margin-bottom: 50px ;  
      color: red;    
      }

   .site_info{
    margin-bottom: 40px;
          li{
            margin-right: 1rem;
            color: red; 
                  span{
                    font-weight: 600;
                    color: red;
                  }
             }
          li:after{
          content: "|";
          margin-left: 10px;
           }
     }
    .social_links{
      margin-bottom: 40px;
      color: red;
          
          li{
          margin-right: 1rem;
          font-size: 0.8rem;
          }
     }
  }
</style>