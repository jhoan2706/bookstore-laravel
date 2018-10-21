<template lang="html">
  <div class="row">
    <spinner v-show="loading"></spinner>
      <div class="col-sm mt-2" v-for="pokemon in pokemons">
          <div class="card text-center" style="width: 18rem;">
              <img class="card-img-top rounded-circle mx-auto d-block" src="images/" alt="" style="height:100px;width: 100px;background-color: #EFEFEF;margin: 20px" v-bind:src="pokemon.picture">
              <!--<div class="static" v-bind:class="{ active: isActive, 'text-danger': hasError }"></div>-->
              <div class="card-body">
                  <h5 class="card-title">{{pokemon.name}}</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="/trainers/" class="btn btn-primary">Ver más</a>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
import EventBus from '../event-bus';
export default {
  data() {
    return {
      pokemons: [],
      loading: true,
      isActive: true,
      hasError: false
    }
  },
  created(){
    EventBus.$on('pokemon-added',data=>{
      this.pokemons.push(data)
      console.log(data)
    })
  },
  mounted() {
    /*console.log(this.pokemons);*/
    axios
      .get('http://localhost/pokemons')
      .then((res) => {
        this.pokemons = res.data
        this.loading = false
      });
  }
}
</script>

<style lang="css">
</style>
