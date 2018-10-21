<template>
<div class="modal fade" id="addPokemon" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar </h5>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
        <form @submit.prevent="savePokemon">
          <div class="form-group">
            <label>Pokemon </label>
            <input type="text" class="form-control" placeholder="Ingresa el nombre del pokemon" v-model="name">
          </div>
          <div class="form-group">
            <label>Picture</label>
            <input type="text" class="form-control" placeholder="Ingresa la url de una imagen" v-model="picture">
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
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
      name: null,
      picture: null
    }
  },
  methods: {
    savePokemon() {
      /*console.log(this.name);
      console.log(this.picture);*/
      //enviar formulario aa traves de peticion http
      axios.post('/pokemons', {
        name: this.name,
        picture: this.picture
      }).then(function(res) {
        $('#addPokemon').modal().hide();
        //esta no es solucion fiable, solo temporal--->integrar bootstrap vue
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        /*------------------*/
        console.log(res);
        console.log(res.data.pokemon);
        EventBus.$emit('pokemon-added',res.data.pokemon);

      }).catch(function(err) {
        console.log(err);
      });
    }
  }
}
</script>

<style lang="css">
</style>
