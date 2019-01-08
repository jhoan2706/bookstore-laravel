<template>
<div>
    <h4>Detalle del libro</h4>
    <router-link to="/vue"><a>Back to the root</a></router-link>
</div>
</template>

<script>
export default {
    data() {
        return {
            libro:{}
        }
    },
    props:['id'],
    created() {
        console.log(this.id);
        this.getBookById();
        
    },
    methods: {
        getBookById:function () {  
            axios.get('/admin/libros/'+this.id)
            .then(response=>{
                console.log(response.data);            
                
            })
            .catch(err=>{
                console.log(err);
                
            })
        }
    },
};
</script>

<style>
</style>
