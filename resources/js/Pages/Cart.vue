<template>
    <div class="bg-dark col-sm-12 col-md-3 ">
       <h3 class="text-white text-center">{{ $t("Panier") }}</h3>
       <hr class="text-white my-1">
        <ul class="list-group my-2 text-center">
           <li class="mb-2" v-for="product in products" :key="product.id">
            <button type="button" class="m-auto list-group-item list-group-item-action col-10">{{product.name}} - quantité: {{product.quantity}}  - prix:  {{product.price}}€
               <button @click="add(product.id)" class="btn btn-success col-3">+</button>
               <button @click="remove(product.id)" class="btn btn-warning col-3">-</button>
            </button>
            </li>
        </ul>
        <hr class="text-white my-1">
        <h4 class="text-white">Total: </h4>
    </div>
</template>


<script>
    export default {
  methods: {
     add(id){
         axios.post('/cart/add/'+id)
         .then(res => {
            this.count++
            this.products = res.data
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
            this.products = res.data
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
            this.products = res.data
         }).catch(error => {
            if (error.response.status == 401) {
                 window.location = '/login'
              }
         })
      },
  },
  data () {
    return {
       products: this.array
    }
  },
      props: ['array'],

    }

</script>
