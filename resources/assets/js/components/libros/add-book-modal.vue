<template>
  <div class="modal fade" id="addBookModal" tabindex="-1" role="dialog" aria-labelledby="add_bool_label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="add_bool_label">
            <strong>Agregar Libro</strong>
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="resetData">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <div class="alert alert-danger alert-dismissible fade show" v-if="errors.length" role="alert">
            <button type="button" @click="clean_errors" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            <ul>
              <li v-for="error in errors" :key="error">{{error}}</li>
            </ul>
          </div>
          <form action @submit.prevent="addBook" method="post">
            <div class="form-row">
              <div class="form-group col-md-9">
                <label for>Título</label>
                <input type="text" v-model="data.book_name" class="form-control" placeholder="Nombre Libro">
              </div>
              <div class="form-group col-md-3">
                <label for>#Páginas</label>
                <input type="number" v-model="data.book_pages" class="form-control" placeholder="# Páginas">
              </div>
            </div>
            <div class="form-group">
              <label for="">ISBN</label>
              <input type="text"
                class="form-control" v-model="data.ISBN" placeholder="ISBN">     
            </div>
            <div class="form-group">
              <label for>Descripción</label>
              <textarea class="form-control" v-model="data.book_desc" rows="3" placeholder="Descripción del libro"></textarea>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for>Año publicación</label>
                <input type="number" v-model="data.book_date" class="form-control" min="1800" max="2025">
              </div>
              <div class="form-group col-md-4">
                <label for>Categoría</label>
                <select class="form-control" v-model="data.book_category">
                    <option value selected>Seleccionar</option>
                    <option
                      v-for="category in book_categories"
                      :key="category.id"
                      :value="category.id"
                    >{{category.descripcion}}</option>
                  </select>
              </div>
  
              <div class="form-group col-md-4">
                <label for>Precio</label>
                <input type="text" v-model="data.book_price" class="form-control" placeholder="$ Precio">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for>Stock</label>
                <input type="text" v-model="data.book_stock" class="form-control" placeholder="# Stock">
              </div>
              <div class="form-group col-md-2">
                <label for>Peso (kg)</label>
                <input type="text" v-model="data.peso" class="form-control" placeholder="# Peso">
              </div>
              <div class="form-group col-md-2">
                <label for>Edicion</label>
                <select class="form-control" v-model="data.edicion">
                    <option value="Primera" selected>Primera</option>
                    <option value="Segunda">Segunda</option>
                    <option value="Tercera">Tercera</option>
                    <option value="Cuarta">Cuarta</option>
                  </select>
              </div>
              <div class="form-group col-md-2">
                <label for>Formato</label>
                <select class="form-control" v-model="data.formato">
                    <option :value="data.formato" selected>{{data.formato}}</option>
                  </select>
              </div>
  
              <div class="form-group col-md-2">
                <div class="form-check">
                  <label for>Estado</label>
                  <br>
                  <input class="form-check-input" type="checkbox" id="gridCheck" v-model="data.book_status">
                  <label class="form-check-label" for="gridCheck">{{data.book_status?"Disponible":"No Disponible"}}</label>
                </div>
              </div>
            </div>
            <div class="form-group">
                <label for="foto_dir">Portada</label>
                <input type="file" class="form-control-file" placeholder="Seleccione una imagen">
            </div>            
            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import EventBus from "../../event-bus";
  export default {
    data() {
      return {
        data: {
          book_name: "",
          book_desc: "",
          book_pages: null,
          book_price: null,
          book_date: null,
          book_category: "",
          book_status: false,
          book_stock: null,
          edicion: "Primera",
          formato: "Libro",
          peso: null,
          ISBN:"",
          foto_dir:null
        },
        errors: [],
        book_categories: []
      };
    },
    created() {
      this.loadCategories();
    },
    methods: {
      addBook: function() {
        if (this.validarForm()) {
          axios
            .post("/admin/libros", this.data)
            .then(response => {
              /* console.log(response); */
              $("#addBookModal").modal("hide");
              $(".modal-backdrop").remove();
              this.resetData();
              //emitir evento para actualizar asyncronamente los libros
              EventBus.$emit("book_added", true);
            })
            .catch(err => {
              console.log(err);
            });
        }
      },
      validarForm: function() {
        var validate = true;
        this.errors = [];
        if (!this.data.book_name) {
          this.errors.push("Error en el campo 'Nombre'.");
          validate = false;
        }
        if (!this.data.book_desc) {
          this.errors.push("Error en el campo 'Descripción'.");
          validate = false;
        }
        if (isNaN(this.data.book_pages) || !this.data.book_pages) {
          this.errors.push("Error en el campo '# Páginas'.");
          validate = false;
        }
        if (isNaN(this.data.book_price) || !this.data.book_price) {
          this.errors.push("Error en el campo '# Precio'.");
          validate = false;
        }
        if (isNaN(this.data.book_stock) || !this.data.book_stock) {
          this.errors.push("Error en el campo '# Stock'.");
          validate = false;
        }
        if (isNaN(this.data.peso)) {
          this.errors.push("Error en el campo '# Peso'.");
          validate = false;
        }
        if (this.data.book_category == "") {
          this.errors.push("Seleccione una categoría para el libro.");
          validate = false;
        }
        if (this.data.book_date == null) {
          this.errors.push("Error en 'Año de publicación' del libro.");
          validate = false;
        }
        return validate;
      },
      validateISBN:function (isbn) {  

      },
      clean_errors: function() {
        this.errors = [];
      },
      loadCategories: function() {
        axios.get("/admin/libros/load_categories").then(response => {
          this.book_categories = response.data;
        });
      },
      resetData: function() {
        this.data.book_name = "";
        this.data.book_desc = "";
        this.data.book_pages = null;
        this.data.book_price = null;
        this.data.book_date = null;
        this.data.book_category = "";
        this.data.book_stock = null;
      }
    }
  };
</script>

<style>
  
</style>
