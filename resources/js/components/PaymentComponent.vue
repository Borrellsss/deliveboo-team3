<template>
  <div>
    <div id="dropin-container"></div>
    <button id="submit-button" class="button button--small button--green">Purchase</button>
  </div>
</template>

<script>
export default {
    name: 'PaymentComponent',

    // mounted() {
    //     braintree.dropin.create({
    //     authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
    //     selector: '#dropin-container'
    //     }),

    // //     // <!-- BRAINTREE -->
    // //     // Faccio la chiama API che restituisce il token di autorizzazione nella risposta
    // //     // axios.get("http://127.0.0.1:8000/api/orders/generate"
            
    // //     // )

    // //     // axios.post(
    // //     //         "http://127.0.0.1:8000/api/order/make/payment?token=fake-valid-nonce&amount=" +
    // //     //             total_amount
    // //     //     ).then((result) => {
            
    // //     // }
    // // }
}
</script>

<style>

</style>