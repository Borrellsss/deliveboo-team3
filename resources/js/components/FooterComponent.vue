<template>
    <!-- Footer -->
<footer class="text-center text-white">
  <!-- Grid container -->
  <div class="container p-4">

    <!-- Section: Links -->
    <section class="links-container">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col">

          <ul class="list-unstyled mb-0">
            <li>
              Toast Rider
            </li>
            <li>
              <a href="#!" class="text-white">Storia</a>
            </li>
            <li>
              <a href="#!" class="text-white">Assistenza</a>
            </li>
            <li>
              <a href="#!" class="text-white">Cerca locale</a>
            </li>
            <li>
              <a href="#!" class="text-white">Ami i toast?</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col">

          <ul class="list-unstyled mb-0">
            <li>
              Dove siamo
            </li>
            <li>
              <a href="#!" class="text-white">Italia</a>
            </li>
            <li>
              <a href="#!" class="text-white">San Marino</a>
            </li>
            <li>
              <a href="#!" class="text-white">Isole Fær Øer</a>
            </li>
            <li>
              <a href="#!" class="text-white">Ascoli</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col">

          <ul class="list-unstyled mb-0">
            <li>
              Lavora con noi
            </li>
            <li>
              <a href="#!" class="text-white">Entra nel Team</a>
            </li>
            <li>
              <a href="#!" class="text-white">Parti da zero</a>
            </li>
            <li>
              <a href="#!" class="text-white">Offerte studenti</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col">

          <ul class="list-unstyled mb-0">
            <li>
              Note Legali
            </li>
            <li>
              <a href="#!" class="text-white">Condizioni</a>
            </li>
            <li>
              <a href="#!" class="text-white">Privacy Policy</a>
            </li>
            <li>
              <a href="#!" class="text-white">Cookies</a>
            </li>
            <li>
              <a href="https://www.youtube.com/watch?v=Fq0HUIWLo5o" class="text-white">Facci causa!</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </section>

    <!-- Section: Social media -->
    <section class="social-media-links mb-4">

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a>

    </section>
    <!-- Section: Social media -->


    <!-- Section: Links -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022 Copyright | Toast Rider S.p.A. 
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
</template>

<script>

export default {
  name: 'FooterComponent',
}

</script>

<style lang="scss" scoped>

@import '../style/variables';
@import '../style/common';
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;500;700;900&display=swap');

  *{
    margin: 0 auto;

  footer{
    background-color: rgb(47, 47, 47);
    margin-top: 70px;
        
        .links-container{
          margin-top: 3rem;
        }
        .social-media-links{
          margin-top: 3rem;
        }

        .btn{
          padding: 13px 18px;
          border-radius: 50%;
        }

        .btn:hover{
          background-color: rgb(116, 111, 111);
        }

    }
  }
  
</style>