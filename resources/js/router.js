import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomePage from './pages/HomePage.vue';
import AboutPage from './pages/AboutPage.vue';
import NotFound from './pages/NotFound.vue';
import BlogPage from './pages/BlogPage.vue';
import SinglePost from './pages/SinglePost.vue';
import ContactPage from './pages/ContactPage.vue';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomePage
        },
        {
            path: '/about',
            name: 'about',
            component: AboutPage
        },
        {
            path: '/blog',
            name: 'blog',
            component: BlogPage
        },
        {
            path: '/blog/:slug',
            name: 'single-post',
            component: SinglePost
        },
        {
            path: '/contact',
            name: 'contact',
            component: ContactPage
        },
        {
            path: '/*',
            name: 'not-found',
            component: NotFound
        },
    ],
});
  
export default router;