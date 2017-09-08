import Vue from 'vue'
import Router from 'vue-router'
import Startseite from '@/components/Startseite'
import Idee from '@/components/Idee'

Vue.use(Router)

export default new Router({
  routes: [
    { path: '/idee', name: 'Idee', component: Idee },
    { path: '*', name: 'Alles', component: Startseite }
  ]
})
