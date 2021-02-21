<template>
    <div class="container-fluid d-flex justify-content-around">

        <section class="dark-grey-text text-center col-sm-12 col-md-9">
            <h2 class="font-weight-bold mb-4 mt-2 pb-2">{{ $t("Nos Produits") }}</h2>

            <div class="row">
                <div v-for="product in products" :key="product.id" class="col-lg-3 col-md-12 mb-4">

                    <div class="view overlay rounded z-depth-2 mb-4">
                        <img class="img-fluid imageProduct" :src="'/image/products/'+product.image" :alt="product.name">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <h4 class="font-weight-bold mb-3"><strong>{{product.name}}</strong></h4>
                    <p class="dark-grey-text"></p>
                    <a @click="add(product.id)" class="btn btn-outline-success btn-rounded btn-md">{{ $t('Ajouter')}}</a>
                </div>
                
            </div>
            
        </section>
        <cart :array="array" :key="count"></cart>
    </div>
</template>
<script>
    import Cart from './Cart'
    export default {
         methods: {
            add(id){
               axios.post('/cart/add/'+id)
               .then(res => {
                  this.count++
                  this.array = res.data
               }).catch(error => {
                  if (error.response.status == 401) {
                       window.location = '/login'
                    }
               })
            }
         },

        data() {
            return {
                products: this.listProducts,
                product: '',
                array: this.items,
                count:0
            }
        },
        props: ['listProducts', 'items'],
        components: {
            Cart,
        },
    }

</script>
