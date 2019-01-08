import IndexBooks from './components/libros/index.vue'
import View from './components/libros/view.vue';
export const routes=[
    {path:'/vue/',component:IndexBooks,name:'Index'},
    {path:'/vue/view/:id',component:View,name:'View',props:true}
];