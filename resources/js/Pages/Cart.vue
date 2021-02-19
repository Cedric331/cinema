<template>
    <div class="bg-dark">
       <h3 class="text-white">{{ $t("Panier") }}</h3>
        <div class="list-group">
            <button v-for="product in products" :key="product.id" type="button" class="list-group-item list-group-item-action">{{product.name}}</button>
        </div>
    </div>
</template>


<script>
    export default {
  data () {
    return {
       products: this.array
    }
  },
      props: ['array'],

    }

</script>
