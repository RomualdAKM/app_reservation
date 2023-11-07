import { createRouter, createWebHistory } from 'vue-router'
import index from './../pages/views/index.vue'
import login from './../pages/views/auth/login.vue'
import register from './../pages/views/auth/register.vue'
import motivationIndex from './../pages/views/motivations/index.vue'
import motivationCreate from './../pages/views/motivations/create.vue'
import motivationEdit from './../pages/views/motivations/edit.vue'
import serviceIndex from './../pages/views/services/index.vue'
import serviceCreate from './../pages/views/services/create.vue'
import serviceEdit from './../pages/views/services/edit.vue'
import notFound from '../pages/notFound.vue'

const routes = [
    {   
        name: 'index',
        path: '/',
        component: index,
        
    },
    //auth
    {   
       
        path: '/login',
        component: login,
        
    },
    {   
       
        path: '/register',
        component: register,
        
    },
    //motivation
    {   
        name: 'motivationIndex',
        path: '/motivations',
        component: motivationIndex,
        
    },
    {   
        name: 'motivationCreate',
        path: '/create-motivation',
        component: motivationCreate,
        
    },
    {   
        name: 'motivationEdit',
        path: '/edit-motivation/:motivationId',
        component: motivationEdit,
        props: true
        
    },
    //service
    {   
        name: 'serviceIndex',
        path: '/services',
        component: serviceIndex,
        
    },
    {   
        name: 'serviceCreate',
        path: '/create-service',
        component: serviceCreate,
        
    },
    {   
        name: 'serviceEdit',
        path: '/edit-service/:serviceId',
        component: serviceEdit,
        props: true
        
    },

    {
        path: '/:pathMatch(.*)*',
        component: notFound,
        
    }

]

const router = createRouter({
    history: createWebHistory(),
    routes,

})

export default router
