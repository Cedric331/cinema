require('./bootstrap');

import { App, plugin } from '@inertiajs/inertia-vue'
import Vue from 'vue'
import { InertiaProgress } from '@inertiajs/progress'
import VueI18n from 'vue-i18n'
import Notifications from 'vue-notification'

InertiaProgress.init()
Vue.use(Notifications);
Vue.use(VueI18n);
Vue.use(plugin);


export const i18n = new VueI18n({
   locale: document.documentElement.lang,
   fallbackLocale: document.documentElement.lang,
   messages: {
      en: {
        "Panier": "Cart",
        "Nos Produits": "Our Products",
        "Ajouter": "Add",
        "Vider le Panier": "Clear the Cart",
        "quantité": "quantity",
        "prix": "price",
        "Total de la commande": "Total order",
        "Commander": "Order",
        "Panier vide": "Empty cart",
        "Oui": "Yes",
        "Non": "No",
        "Téléphone": "Phone",
        "Nom": "Name",
        "Téléphone": "Phone",
        "Annuler": "Cancel",
        "Modification du compte": "Change of account",
        "Supprimer mon compte": "Delete my account",
        "Modifier mon mot de passe": "Change my password",
        "Modifier mon compte": "Modify my account",
      },
      fr: {
         "Panier": "Panier",
         "Nos Produits": "Nos Produits",
         "Ajouter": "Ajouter",
         "Vider le Panier": "Vider le Panier",
         "quantité": "quantité",
         "prix": "prix",
         "Total de la commande": "Total de la commande",
         "Commander": "Commander",
         "Panier vide": "Panier vide",
         "Oui": "Oui",
         "Non": "Non",
         "Téléphone": "Téléphone",
         "Nom": "Nom",
         "Téléphone": "Téléphone",
         "Annuler": "Annuler",
         "Modification du compte": "Modification du compte",
         "Supprimer mon compte": "Supprimer mon compte",
         "Modifier mon mot de passe": "Modifier mon mot de passe",
         "Modifier mon compte": "Modifier mon compte",
       },
  }
 });


const el = document.getElementById('app')

new Vue({
   i18n,
  render: h => h(App, {
    props: {
      initialPage: JSON.parse(el.dataset.page),
      resolveComponent: name => require(`./Pages/${name}`).default,
    },
  }),
}).$mount(el)
