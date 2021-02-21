<template>
    <div class="bg-dark">
       <h3 class="text-white">{{ $t("Panier") }}</h3>
        <ul class="list-group my-2" v-for="product in products" :key="product.id">
           <li>
            <button type="button" class="list-group-item list-group-item-action">{{product.name}} - quantité: {{product.quantity}}</button>
            <button @click="add(product.id)" class=" btn btn-success">+</button>
            <button @click="remove(product.id)" class=" btn btn-danger">-</button>
            </li>
        </ul>
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
      }
  },
  data () {
    return {
       products: this.array
    }
  },
      props: ['array'],

    }

</script>
