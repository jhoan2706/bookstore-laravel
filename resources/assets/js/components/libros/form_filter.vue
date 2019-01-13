<template>
  <div class="col-3">
    <h5>Filtros de busqueda</h5>
    <form method="GET" action="/admin/libros" @submit.prevent="validateForm">
      <!-- nombre libro -->
      <div class="form-group">
        <label for>Libro</label>
        <input
          type="text"
          v-model="book_name"
          class="form-control form-control-sm"
          v-on:keyup="askForResults"
          placeholder="Título"
        >
      </div>
      <p :class="[error_styles.back]" v-if="error_mss.name.length>0">
        <strong>{{error_mss.name}}</strong>
      </p>
      <!-- autor -->
      <div class="form-group">
        <label for>Autor</label>
        <input
          type="text"
          class="form-control form-control-sm"
          placeholder="Autor"
          v-on:keyup="askForResults"
          v-model="book_autor"
        >
      </div>
      <p :class="[error_styles.back]" v-if="error_mss.autor.length>0">
        <strong>{{error_mss.autor}}</strong>
        <!-- categoria input -->
      </p>
      <div class="form-group">
        <label for="book_category">Categoría</label>
        <select
          class="form-control form-control-sm"
          v-model="book_category"
          @change="askForResults"
        >
          <option value selected>Seleccionar</option>
          <option
            v-for="category in book_categories"
            :key="category.id"
            :value="category.id"
          >{{category.descripcion}}</option>
        </select>
      </div>
      <!-- campo precio -->
      <div class="form-group">
        <label for="book_price">Precio</label>
        <input
          type="text"
          class="form-control form-control-sm mb-1"
          v-model="price1"
          placeholder="0.0"
          v-on:keyup="askForResults"
          style="width:150px;"
        >
        <input
          type="text"
          class="form-control form-control-sm"
          placeholder="999.999"
          style="width:150px;"
          v-on:keyup="askForResults"
          v-model="price2"
        >
      </div>
      <p :class="[error_styles.back]" v-if="error_mss.precios.length>0">
        <strong>{{error_mss.precios}}</strong>
      </p>
      <div class="form-group">
        <label for="book_year">Año publicación</label>
        <input
          type="text"
          class="form-control form-control-sm"
          placeholder="1978"
          v-on:keyup="askForResults"
          v-model="book_year"
        >
      </div>
      <p :class="[error_styles.back]" v-if="error_mss.year.length>0">
        <strong>{{error_mss.year}}</strong>
      </p>
      <button type="button" class="btn btn-outline-dark btn-sm" @click="cleanForm">
        <i class="fas fa-sync-alt"></i>
        Reiniciar Filtros
      </button>
    </form>
  </div>
</template>

<script>
import EventBus from "../../event-bus";
export default {
  data() {
    return {
      data: [],
      //variables del formulario
      book_name: "",
      book_autor: "",
      book_category: "",
      price1: null,
      price2: null,
      book_year: null,
      book_categories: [],
      //manejo de errores
      errors: false,
      error_mss: {
        name: "",
        autor: "",
        precios: "",
        year: ""
      },
      error_styles: {
        errorClass: "text-danger",
        back: "bg-warning"
      }
    };
  },
  computed: {},
  created() {
    this.loadCategories();
  },
  mounted() {},
  methods: {
    loadCategories: function() {
      axios.get("/admin/libros/load_categories").then(response => {
        this.book_categories = response.data;
      });
    },
    askForResults: function() {
      this.data = [];
      if (this.validateForm()) {
        this.errors = false;
        this.data.push({
          book_name: this.book_name,
          book_category: this.book_category,
          book_price1: this.price1,
          book_price2: this.price2,
          book_year: this.book_year
        });
        EventBus.$emit("data-filter", this.data);
      }
    },
    validateForm: function() {
      var validate = true;
      if (!isNaN(this.book_name) && this.book_name != "") {
        this.errors = true;
        this.error_mss.name = "Error en campo 'Libro'";
        validate = false;
      } else {
        this.error_mss.name = "";
      }
      if (!isNaN(this.book_autor) && this.book_autor != "") {
        this.errors = true;
        this.error_mss.autor = "Error en campo 'Autor'";
        validate = false;
      } else {
        this.error_mss.autor = "";
      }
      if (this.price1 != "" && this.price2 != "") {
        if (isNaN(this.price1) == true || isNaN(this.price2) == true) {
          this.errors = true;
          this.error_mss.precios = "Error en campos 'Precios'";
          validate = false;
        } else {
          this.error_mss.precios = "";
        }
      }
      if (isNaN(this.book_year) == true && this.book_year != "") {
        this.errors = true;
        this.error_mss.year = "Error en campo 'Año Libro'";
        validate = false;
      } else {
        this.error_mss.year = "";
      }
      return validate;
    },
    cleanForm: function() {
      this.book_name = "";
      this.book_autor = "";
      this.book_category = "";
      this.price1 = null;
      this.price2 = null;
      this.book_year = null;
      this.askForResults();
    }
  }
};
</script>

<style>
</style>
