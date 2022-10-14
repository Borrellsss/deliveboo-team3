<template>
  <section>

    <!-- Card Left -->
    <div class="row1-container">
        <div class="box">

            <!-- Card Icon -->
            <div class="text-center pb-3 secondary-color pb-5">
                <i class="fa-solid fa-bicycle fa-4x"></i>
            </div>

            <!-- Card Title -->
            <h3 class="text-center mb-3">
                Rider
            </h3>

            <!-- Card Text -->
            <p class="text-center">
                Diventa un rider: flessibilità, ottimi guadagni e un mondo di vantaggi per te!
            </p>
        </div>

        <!-- Card Top -->
        <div class="box">

            <!-- Card Icon -->
            <div class="text-center pb-3 secondary-color">
                <i class="fa-solid fa-utensils fa-4x"></i>
            </div>

            <!-- Card Title -->
            <h3 class="text-center mb-3">
                Lavora con noi
            </h3>

            <!-- Card Text -->
            <p class="text-center">
                La nostra missione è trasformare il modo in cui le persone mangiano.
            </p>
        </div>

        <!-- Card Right -->
        <div class="box">

            <!-- Card Icon -->
            <div class="text-center pb-3 secondary-color">
                <i class="fa-solid fa-recycle fa-4x"></i>
            </div>
            
            <h3 class="text-center mb-3">
                Rispettiamo l'Ambiente
            </h3>
            
            <!-- Card Text -->
            <p class="text-center">
                Utilizziamo un packaging Plastic-free funzionale e sostenibile.
            </p>
        </div>
    </div>
    
    <!-- Card Bottom -->
    <!-- <div class="row2-container">
        <div class="box orange"> -->

            <!-- Card Icon -->
            <!-- <div class="text-center pb-3 secondary-color">
                <i class="fa-solid fa-recycle fa-4x"></i>
            </div> -->
            
            <!-- <h3 class="text-center mb-3">
                Rispettiamo l'Ambiente
            </h3> -->
            
            <!-- Card Text -->
            <!-- <p class="text-center">
                Utilizziamo un packaging Plastic-free funzionale e sostenibile.
            </p> -->
        <!-- </div>
    </div> -->
  </section>
</template>

<script>
export default {
    name: 'HiringComponent'
}
</script>

<style lang="scss" scoped>
@import '../../style/variables';
@import '../../style/common';

section {

    .box p {
        color: var(--grayishBlue);
    }

    .box {
        padding: 30px;
        margin: 20px;  
    }

    .primary-color {
        color: $primary-color;
    }

    .secondary-color {
        color: $secondary-color;
    }

    @media (max-width: 400px) {
        h3 {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 450px) {
        .box {
            height: 200px;
        }
    }

    @media (max-width: 950px) and (min-width: 450px) {
        .box {
            text-align: center;
            height: 180px;
        }
    }

    @media (min-width: 950px) {
        .row1-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .row2-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .box-down {
            position: relative;
            top: 150px;
        }

        .box {
            width: 20%;
        
        }

        .header p {
            width: 30%;
        }
    }
}
</style>