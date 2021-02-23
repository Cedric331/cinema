<template>
   <div>
     <cart class="bg-dark container my-5 p-3 w-50" :array="products" :sumTotal="sumTotal" :key="count"></cart>
   </div>
</template>


<script> 
import Cart from './Cart'
export default {
        components: {
            Cart,
        },
   data() {
      return {
         sumTotal: this.total,
         products: this.items,
         count:0
      }
   },
  props: ['items','total'],
}
</script>
