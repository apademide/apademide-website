import { createRouter, createWebHistory } from 'vue-router'
import { scrollBehavior } from './scrollBehaviour'
import { kirbyStore } from '../store/kirbyStore'
import { capitalize } from '../helpers'
// TODO: Use again once Vite fixes a bug with dynamic imports
// import Default from '../views/Default.vue'

/**
 * Creates the Vue Router instance
 *
 * @returns {object} Created router instance for the Vue app
 */
export const initRouter = () => {
  const site = kirbyStore.getSite()

  // Published pages routes
  const routes = site.children.flatMap(page => [
    {
      path: `/${page.id}`,
      component: () => import(`../views/${capitalize(page.template)}.vue`).catch(() => /* Default */ import('../views/Default.vue'))
    },
    // Page children routes
    ...page.children.map(child => ({
      path: `/${child.id}`,
      component: () => import(`../views/${capitalize(child.template)}.vue`).catch(() => /* Default */ import('../views/Default.vue'))
    }))
  ])

  // Redirect `/home` to `/`
  routes.find(route => route.path === '/home').path = '/'
  routes.push({ path: '/home', redirect: '/' })

  // Catch-all fallback
  routes.push({ path: '/:catchAll(.*)', component: /* Default */ () => import('../views/Default.vue') })

  return createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior
  })
}
