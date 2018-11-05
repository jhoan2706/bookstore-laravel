<template>
    <button type="button" class="btn btn-primary" v-on:click="prueba(bandera)" data-toggle="modal" data-target="#showObjectModal">
        <i class="fas fa-eye"></i>Ver
    </button> 
</template>

<script>
import EventBus from "../event-bus";
export default {
  data() {
    return {
      bandera: true,
      data_object: {}
    };
  },
  mounted() {
    //console.log(JSON.parse(this.object));
  },
  props: ["object"],
  methods: {
    prueba: function(bandera) {
      if (bandera) {
        this.data_object = JSON.parse(this.object);
        this.bandera = false;
      }
      //console.log(this.data_object);
      EventBus.$emit("show-object", this.data_object);
    }
  }
};
</script>

<style>
</style>
