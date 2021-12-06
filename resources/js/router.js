import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)
import Create from './components/pages/Create'
import List from './components/pages/List'
import Edit from './components/pages/Edit'
const routes = [
    {
        name: 'create',
        path: '/create',
        component: Create,
    },
    {
        name:'index',
        path: '/list',
        component:List,
    },
    {
        name: 'edit',
        path:'/edit/:id',
        component: Edit,
    }

]

export default new Router({
    mode:'history',
    routes
})
