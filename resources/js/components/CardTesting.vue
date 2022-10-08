<template>
    <section id="card-testing">
          <div class="fo-container">
            <div class="row gx-5 row row-cols-4 row-cols-md-4 row-cols-lg-4 row-cols-xl-4">

                <div class="col">
                    <div class="card">
                        <img class="card-img-top" src="https://images.adsttc.com/media/images/5e4c/1025/6ee6/7e0b/9d00/0877/slideshow/feature_-_Main_hall_1.jpg?1582043123" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">John Doe</h4>
                            <p class="card-text">Some example text.</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img class="card-img-top" src="https://images.adsttc.com/media/images/5e4c/1025/6ee6/7e0b/9d00/0877/slideshow/feature_-_Main_hall_1.jpg?1582043123" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">John Doe</h4>
                            <p class="card-text">Some example text.</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img class="card-img-top" src="https://images.adsttc.com/media/images/5e4c/1025/6ee6/7e0b/9d00/0877/slideshow/feature_-_Main_hall_1.jpg?1582043123" alt="Card image">
                        <div class="card-body">
                            <h4 class="">John Doe</h4>
                            <p class="">Some example text.</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <img class="card-img-top" src="https://images.adsttc.com/media/images/5e4c/1025/6ee6/7e0b/9d00/0877/slideshow/feature_-_Main_hall_1.jpg?1582043123" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">John Doe</h4>
                            <p class="card-text">Some example text.</p>
                        </div>
                    </div>
                </div>

            </div>
          </div>
        </section>
</template>

<script>
export default {
    name: 'CardTesting',

       }
</script>

<style lang="scss" scoped>
@import '../style/variables';
@import '../style/common';


#card-testing{
    margin-top: 300px;
}

// .col{
//     margin-left: 60px;
// }
.fo-container{
    width: 80%;
    margin: 0 auto;
}

.card{
    width: 100%;

    h4{
        width: 100%;
    }

   p{
        width: 100%;
    
    }
}

@media only screen and (max-width: 1200px) {

        .fo-container{
                width: 80%;
                margin: 0 auto;
            }

            .col{
                padding: 10px;
            }
        }

@media only screen and (max-width: 992px) {

    .fo-container{
            width: 80%;
            margin: 0 auto;
        }

        .col{
            padding: 5px;
        }
}


@media only screen and (max-width: 768px) {

            .fo-container{
            width: 90%;
            margin: 0 auto;
        }

        .col{
            padding: 5px;
        }
}


</style>