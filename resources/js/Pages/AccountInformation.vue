<template>

<div class="container z-depth-1 bg-light my-5 p-5">
   <notifications class="mt-5" group="success" position="right top" />

  <section>
    <h3 class="font-weight-normal text-center dark-grey-text my-4 pb-2">{{$t('Modification du compte')}}</h3>

    <div class="row d-flex justify-content-center">
      <div class="col-md-6 col-lg-3 mb-4">
        <div class="md-form md-outline form-lg">
           <label for="form1">{{$t('Nom')}}</label>
          <input type="text" id="first_name" v-model="form.name" class="form-control form-control-lg">
        </div>
      </div>

      <div class="col-md-6 col-lg-3 mb-4">
        <div class="md-form md-outline form-lg">
           <label for="form2">{{$t('Email')}}</label>
          <input type="text" id="email" v-model="form.email" class="form-control form-control-lg">
        </div>
      </div>

    </div>
      <div class="col-md-6 mb-4 m-auto">
        <button @click="update" class="btn btn-block btn-success">{{$t('Modifier mon compte')}}</button>
        <hr class="my-3">
        <button class="btn btn-block btn-primary mt-4">{{$t('Modifier mon mot de passe')}}</button>
        <button class="btn btn-block btn-danger mt-4">{{$t('Supprimer mon compte')}}</button>
      </div>
  </section>
</div>
</template>


<script>
export default {
  methods: {
     update(){
        axios({
         method: 'post',
         url: '/account/information',
         data: this.form
         }).then(res => {
            if (document.documentElement.lang == 'fr') {
            this.$notify({
               group: 'success',
               type: 'success',
               title: 'Modification du compte',
               text: 'Vos informations sont à jour!'
            });
            } else {
            this.$notify({
               group: 'success',
               type: 'success',
               title: 'Update Account',
               text: 'Your information is up to date!'
            });
            }
      
        }).catch(err => {
           if (document.documentElement.lang == 'fr') {
            this.$notify({
               group: 'success',
               type: 'warn',
               title: 'Erreurs',
               text: 'Oups il y a une erreur!'
            });
            } else {
            this.$notify({
               group: 'success',
               type: 'warn',
               title: 'Errors',
               text: 'Oops there is an error!'
            });
            }
  
        })
     }
  },
   
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
