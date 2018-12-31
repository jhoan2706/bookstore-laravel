<template>
  <div class="row">
    <div class="col-6">
      <h3>Agregar Título</h3>
      <form action="/admin/libros" @submit.prevent="validarForm" method="post">
        <div class="form-group">
          <label for>Nombre</label>
          <input type="text" v-model="book_name" class="form-control" placeholder="Nombre Libro">
          <small id="helpId" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
          <label for>Descripcíon</label>
          <textarea
            class="form-control"
            v-model="book_desc"
            rows="3"
            placeholder="Descripción del libro"
          ></textarea>
        </div>
        <div class="form-group">
          <label for># Páginas</label>
          <input type="number" class="form-control" v-model="book_pages" placeholder="# Páginas">
        </div>
        <div class="form-group">
          <label for>Fecha Publicación</label>
          <input type="date" class="form-control" min="0000-01-01" max="2020-06-06">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <div class="col-6">
      <div
        class="alert alert-danger alert-dismissible fade show mt-5"
        v-if="errors.length"
        role="alert"
      >
        <button
          type="button"
          @click="clean_errors"
          class="close"
          data-dismiss="alert"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
        <ul>
          <li v-for="error in errors" :key="error">{{error}}</li>
        </ul>
        <strong>Porfavor, ingresa los datos correctamente</strong>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      data: [],
      book_name: "",
      book_desc: "",
      book_pages: null,
      errors: []
    };
  },
  computed: {},
  methods: {
    validarForm: function() {
      this.errors = [];
      if (this.book_name && this.book_desc && !isNaN(this.book_pages)) {
        this.data.push({
          book_name: this.book_name,
          book_desc: this.book_desc,
          book_pages: this.book_pages
        });
        return true;
      }
      if (!this.book_name) {
        this.errors.push("Error en el campo 'Nombre'.");
      }
      if (!this.book_desc) {
        this.errors.push("Error en el campo 'Descripción'.");
      }
      if (isNaN(this.book_pages) || !this.book_pages) {
        this.errors.push("Error en el campo '# Páginas'.");
      }
    },
    clean_errors: function() {
      this.errors = [];
    }
  }
};
</script>

<style>
</style>
