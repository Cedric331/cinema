require('./bootstrap');

import { App, plugin } from '@inertiajs/inertia-vue'
import Vue from 'vue'
import { InertiaProgress } from '@inertiajs/progress'
import VueI18n from 'vue-i18n'

InertiaProgress.init()
Vue.use(VueI18n);
Vue.use(plugin)

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