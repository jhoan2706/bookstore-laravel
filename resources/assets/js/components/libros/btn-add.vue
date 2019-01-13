<template>
  <div class="col-6">
    <div class="dropdown">
      <button
        class="btn btn-outline-dark dropdown-toggle"
        type="button"
        id="dropdownMenuButton"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false"
      >Acciones</button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a
          href="#"
          class="dropdown-item"
          v-on:click="myfunction()"
          data-toggle="modal"
          data-target="#addBookModal"
        >
          <i class="fas fa-plus-circle"></i>Agregar
        </a>
      </div>
    </div>
    <!-- <addBookModal></addBookModal> -->
  </div>
</template>

<script>
import AddModal from "./add-book-modal";
export default {
  data() {
    return {
      bandera: false
    };
  },
  components: {
    AddModal
  },
  methods: {
    myfunction: function() {
      this.bandera = true;
    }
  }
};
</script>

<style>
</style>
