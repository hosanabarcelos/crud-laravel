import Vue from 'vue';
import VueRouter from 'vue-router';
import List from '../views/List.vue';
import EditItem from '../views/EditItem.vue';

Vue.use(VueRouter)

const routes = [
	{
		path: '/list',
		name: 'list',
		component: List
	},
	{
		path: '/edit/:id',
		name: 'edit',
		component: EditItem
	},
]

const router = new VueRouter({
  routes
})

export default router
