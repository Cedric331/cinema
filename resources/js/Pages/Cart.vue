<template>
    <div class="bg-dark col-sm-12 col-md-3">
       <h3 class="text-white text-center">{{ $t("Panier") }}</h3>
       <h5 class="text-center"><button v-if="total != '0,00'" @click="deleteCart()" class="btn btn-secondary">{{ $t('Vider le Panier')}}</button></h5>
       <hr class="text-white my-1">
       <h5 v-if="total == '0,00'" class="mt-5 text-white text-center">{{$t('Panier vide')}}</h5>
        <ul class="list-group my-3 text-center">
           <li class="mb-2" v-for="product in products" :key="product.id">
            <button type="button" class="m-auto list-group-item list-group-item-action col-10 position-relative">{{product.name}} - {{ $t("quantité") }}: {{product.quantity}}  - {{ $t("prix") }}:  {{product.price}}€
               <button v-if="product.quantity > 1" @click="deleteItem(product.id)" class="position-absolute btn-sm top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-1" style="font-size:10px;">X</button>
               <button v-if="product.quantity > 1" @click="remove(product.id)" class="btn btn-warning mt-2 btn-sm col-3">-</button>
               <button v-if="product.quantity == 1" @click="remove(product.id)" class="btn btn-danger mt-2 btn-sm col-3"><i class="fas fa-trash"></i></button>
               <button @click="add(product.id)" class="btn btn-success mt-2 btn-sm col-3">+</button>
            </button>
            </li>
        </ul>
        <hr v-if="total != '0,00'" class="text-white my-1">
        <h5 v-if="total != '0,00'" class="text-white my-2">{{ $t("Total de la commande") }}: {{total}}€</h5>
        <div class="text-center">
         <button v-if="total != '0,00'" class="btn btn-light mt-2">{{$t('Commander')}}</button>
        </div>
    </div>
</template>


<script>
    export default {
  methods: {
     add(id){
         axios.post('/cart/add/'+id)
         .then(res => {
            this.count++
            this.products = res.data[0]
            this.total = res.data[1]
         }).catch(error => {
            if (error.response.status == 401) {
                 window.location = '/login'
              }
         })
      },
      remove(id){
         axios.post('/cart/remove/'+id)
         .then(res => {
            this.count++
            this.products = res.data[0]
            this.total = res.data[1]
         }).catch(error => {
            if (error.response.status == 401) {
                 window.location = '/login'
              }
         })
      },
      deleteItem(id){
         axios.post('/cart/deleteItem/'+id)
         .then(res => {
            this.count++
            this.products = res.data[0]
            this.total = res.data[1]
         }).catch(error => {
            if (error.response.status == 401) {
                 window.location = '/login'
              }
         })
      },
      deleteCart(){
         axios.post('/cart/deleteCart')
         .then(res => {
            this.count++
            this.products = res.data[0]
            this.total = res.data[1]
         }).catch(error => {
            if (error.response.status == 401) {
                 window.location = '/login'
              }
         })
      },
  },
  data () {
    return {
       products: this.array,
       total: this.sumTotal
    }
  },
      props: ['array', 'sumTotal'],

    }

</script>
