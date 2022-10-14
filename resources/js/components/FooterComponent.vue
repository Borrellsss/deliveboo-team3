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
    <section class="d-flex social-media-links mb-4">

      <!-- Twitter -->
      <a class="ms_social-btn" href="#!">
        <i class="fab fa-twitter"></i>
      </a>

      <!-- Google -->
      <a class="ms_social-btn" href="#!">
        <i class="fab fa-google"></i>
      </a>

      <!-- Instagram -->
      <a class="ms_social-btn" href="#!">
        <i class="fab fa-instagram"></i>
      </a>

      <!-- Linkedin -->
      <a class="ms_social-btn" href="#!">
        <i class="fab fa-linkedin-in"></i>
      </a>

    </section>
    <!-- Section: Social media -->

  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="ms_copyright text-center p-3">
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

  footer{
    background-color: #202020;
        
    .links-container{
      margin-top: 3rem;
    }
    .social-media-links{
      margin-top: 3rem;
      justify-content: center;
      gap: 0.7rem;
    }

    .ms_social-btn {
      width: 50px;
      aspect-ratio: 1 / 1;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #fff;
      border: 2px solid #fff;
      border-radius: 50%;
    }

    .ms_social-btn:hover{
      color: $primary-color;
      border: 2px solid $primary-color;
      box-shadow: 0 0 5px $primary-color;
    }

    .ms_copyright {
      background-color: #151515;
    }
  }
  
</style>