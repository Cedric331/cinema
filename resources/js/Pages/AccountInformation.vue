<template>

<div class="container z-depth-1 bg-light my-5 p-5">
   <notifications class="mt-5" group="success" position="right top" />

  <section>
    <h3 class="font-weight-normal text-center dark-grey-text my-4 pb-2">{{$t('Modification du compte')}}</h3>

<div class="alert alert-danger" role="alert" v-for="error in errors" :key="error">
   <strong class="m-auto">{{ error[0] }}</strong>
</div>

    <div class="row d-flex justify-content-center">
      <div class="col-md-6 col-lg-3 mb-4">
        <div class="md-form md-outline form-lg">
           <label for="form1">{{$t('Nom')}}</label>
          <input type="text" id="first_name" v-model="form.name" class="form-control form-control-lg" required>
        </div>
      </div>

      <div class="col-md-6 col-lg-3 mb-4">
        <div class="md-form md-outline form-lg">
           <label for="form2">{{$t('E-mail')}}</label>
          <input type="email" id="email" v-model="form.email" class="form-control form-control-lg" required>
        </div>
      </div>

      <div class="col-md-6 col-lg-3 mb-4">
        <div class="md-form md-outline form-lg">
           <label for="form2">{{$t('Téléphone')}}</label>
          <input type="tel" id="phone" v-model="form.phone" class="form-control form-control-lg" required>
        </div>
      </div>

    </div>
      <div class="col-md-6 mb-4 m-auto">
        <button @click="update" class="btn btn-block btn-success">{{$t('Modifier mon compte')}}</button>
        <hr class="my-3">
        <a :href="url" class="btn btn-block btn-primary mt-4">{{$t('Modifier mon mot de passe')}}</a>
        <button type="button" class="btn btn-block btn-danger mt-4" data-toggle="modal" data-target="#modalConfirmDelete">{{$t('Supprimer mon compte')}}</button>
      </div>
  </section>

<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
    <div class="modal-content text-center">
      <div class="modal-header d-flex justify-content-center">
        <p class="heading">{{$t('Supprimer mon compte')}}?</p>
      </div>
      <div class="modal-footer flex-center">
        <button @click="deleteUser" class="btn btn-outline-danger">{{$t('Oui')}}</button>
        <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">{{$t('Annuler')}}</a>
      </div>
    </div>
  </div>
</div>
<!--Modal: modalConfirmDelete-->

</div>
</template>


<script>
export default {
  methods: {
     deleteUser(){
        axios({
         method: 'get',
         url: '/account/delete'
         }).then(res => {
          window.location = '/'
        }).catch(err => {})
     },
     update(){
        axios({
         method: 'post',
         url: '/account/information',
         data: this.form
         }).then(res => {
            this.errors = ''
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
           this.errors = err.response.data.errors
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
   
  props: ['user', 'url'],
     data() {
    return {
       errors: {},
      form: {
        name: this.user.name,
        email: this.user.email,
        phone: '0'+this.user.phone,
      },
    }
  },
}
</script>
