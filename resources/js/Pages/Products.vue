<template>
    <div class="container-fluid d-flex justify-content-around">

        <section class="dark-grey-text text-center col-10">
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
                    <a @click="add(product)" class="btn btn-outline-success btn-rounded btn-md">{{ $t('Ajouter')}}</a>
                </div>
                
            </div>
            
        </section>
        <cart :allProducts="array" class="col-2"></cart>
    </div>
</template>
<script>
    import Cart from './Cart'
    export default {

        data() {
            return {
                products: this.listProducts,
                product: ''
            }
        },
        props: ['listProducts'],
        components: {
            Cart,
        },
    }

</script>
