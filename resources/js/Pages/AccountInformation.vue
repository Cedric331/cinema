<template>
   <div class="bg-light">
    <label for="first_name">Name:</label>
    <input id="first_name" v-model="form.name" />
    <label for="email">Email:</label>
    <input id="email" v-model="form.email" />
   </div>
</template>


<script>
export default {
   
  props: ['user'],
     data() {
    return {
      form: {
        name: this.user.name,
        email: this.user.email,
      },
    }
  },
}
</script>
