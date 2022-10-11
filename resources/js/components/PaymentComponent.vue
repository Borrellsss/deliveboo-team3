<template>
  <div>
        <!-- User Form -->
    <div>
      <form>
        <!-- Name -->
        <div class="mb-1">
          <label for="customer_name" class="form-label"></label>
          <input type="text" class="form-control" id="customer_name" placeholder="Cognome e Nome">
        </div>

        <!-- Email -->
        <div class="mb-1">
          <label for="customer_mail" class="form-label" ></label>
          <input type="email" class="form-control" id="customer_mail" placeholder="Email">
        </div>

        <!-- Phone Number -->
        <div class="mb-1">
          <label for="customer_phone_number" class="form-label"></label>
          <input type="text" class="form-control" id="customer_phone_number" placeholder="Telefono">
        </div> 

        <!-- Address -->
        <div class="mb-2">
            <label for="customer_address" class="form-label"></label>
            <textarea class="form-control" id="customer_address" rows="2" placeholder="Indirizzo di consegna"></textarea>
        </div> 
      </form>     
    </div>

    <!-- Braintree Drop-in -->
    <div class="drop-in" v-if="Payed">
      <div>
        <div id="dropin-container"></div>
        <div class="btn-container">
          <button id="submit-button" @click="payment()" class="ms_btn">Paga Adesso</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'PaymentComponent',
  data() {
    return {
      token: '',
      Payed: true
    }
  },
  props: {
    Amount: Number
  },

  mounted() {
      braintree.dropin.create({
      authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
      selector: '#dropin-container'
      }),

      // <!-- BRAINTREE -->
      // Chiamata API che restituisce il token di autorizzazione nella risposta
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
          amount: this.Amount
        })
        .then((result) => {
          alert(result.data.message);
          this.Payed = false
        })
    }
  }
}
</script>

<style lang="scss" scoped>
.drop-in,
.btn-container {
  display: flex;
  justify-content: center;
} 
</style>