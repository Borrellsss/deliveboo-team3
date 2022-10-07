<template>
  <div>
    <div id="dropin-container"></div>
    <button id="submit-button" @click="payment()" class="button button--small button--green">Purchase</button>
  </div>
</template>

<script>
export default {
    name: 'PaymentComponent',
    data() {
      return {
        token: '',
      }
    },

    mounted() {
        braintree.dropin.create({
        authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
        selector: '#dropin-container'
        }),

        // <!-- BRAINTREE -->
        // Faccio la chiama API che restituisce il token di autorizzazione nella risposta
        axios.get("http://127.0.0.1:8000/api/orders/generate")
            .then((response) => {
                this.token = response.data.token;
                
            })
    },
    methods: {
      payment() {
        axios.post(
          'http://127.0.0.1:8000/api/orders/make/payment', {
            token: this.token,
            amount: "20.00"
          })
          .then((result) => {
            console.log(result);
        })
      }
    }

}
</script>

<style>

</style>