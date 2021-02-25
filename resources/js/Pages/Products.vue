<template>
    <div class="container-fluid d-flex justify-content-around bg-light">
<notifications class="mt-5" group="success" position="left bottom" />
        <section class="dark-grey-text text-center col-sm-12 col-md-9">
            <h2 class="font-weight-bold mb-4 mt-2 pb-2">{{ $t("Nos Produits") }}</h2>

            <div class="row">
                <div v-for="product in products" :key="product.id" class="col-lg-4 col-sm-12 col-md-6 mb-4">

                    <div class="view overlay rounded z-depth-2 mb-2">
                        <img class="img-fluid imageProduct" :src="'/image/products/'+product.image" :alt="product.name">
                        <h4 class="font-weight-bold mb-3"><strong>{{product.name}}</strong></h4>
                        <div class="mask rgba-white-slight d-inline" v-for="(ingredient, index) in product.ingredients"
                            :key="ingredient.name">
                            {{ ingredient.name }}<em v-if="index != product.ingredients.length-1">,</em>
                        </div>
                    </div>
                    <strong class="mb-1">{{$t('prix')}} : {{product.price.toFixed(2)}} €</strong>
                    <hr>
                    <a @click="add(product.id)"
                        class="btn btn-outline-success btn-rounded btn-md">{{ $t('Ajouter')}}</a>
                </div>
            </div>

        </section>
        <cart v-if="auth" class="d-none d-xxl-block bg-dark col-sm-12 col-md-3" :array="array" :sumTotal="sumTotal"
            :key="count"></cart>
    </div>
</template>
<script>
    import Cart from './Cart'
    export default {
        methods: {
            add(id) {
                axios.post('/cart/add/' + id)
                    .then(res => {
               if (document.documentElement.lang == 'fr') {
                  this.$notify({
                     group: 'success',
                     type: 'success',
                     title: 'Succès',
                     text: 'Produit ajouté au panier!'
                     });
               } else {
                  this.$notify({
                     group: 'success',
                     type: 'success',
                     title: 'Success',
                     text: 'Product added to shopping cart!'
                     });
                  }
                        this.count++
                        this.array = res.data[0]
                        this.sumTotal = res.data[1]
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
                sumTotal: this.total,
                array: this.items,
                count: 0,
            }
        },
        props: ['listProducts', 'items', 'total', 'auth'],
        components: {
            Cart,
        },
    }

</script>
