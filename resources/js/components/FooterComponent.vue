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
              <a href="#!" class="text-white">Impara a cucinare</a>
            </li>
            <li>
              <a href="#!" class="text-white">Ascoli Porto Sant'Elpidio</a>
            </li>
            <li>
              <a href="#!" class="text-white">Facci un Surrounding</a>
            </li>
            <li>
              <a href="#!" class="text-white">Bububaba</a>
            </li>
            <li>
              <a href="https://campo-minato.com" class="text-white">Campo Minato</a>
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
              <a href="#!" class="text-white">Roma</a>
            </li>
            <li>
              <a href="#!" class="text-white">Salerno</a>
            </li>
            <li>
              <a href="#!" class="text-white">Madrid</a>
            </li>
            <li>
              <a href="#!" class="text-white">Brolo</a>
            </li>
            <li>
              <a href="#!" class="text-white">Catania</a>
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
              <a href="https://github.com/Borrellsss" class="text-white">Edoardo Filippo Borrello</a>
            </li>
            <li>
              <a href="https://github.com/Ilariallaria" class="text-white">Ilaria Leone</a>
            </li>
            <li>
              <a href="https://github.com/Giuseppe-lore" class="text-white">Giuseppe Lo Re</a>
            </li>
            <li>
              <a href="https://github.com/jacoposergio" class="text-white">Jacopo Sergio</a>
            </li>
            <li>
              <a href="https://github.com/Zibo88" class="text-white">Vincenzo Tardino</a>
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
              <a href="#!" class="text-white">Vince, non ti vedo convinto!</a>
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