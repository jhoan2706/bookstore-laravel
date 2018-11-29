<template lang="html">
  <div>
    <!-- paginacion -->
    <div class="row mt-2">
      <nav>
        <ul class="pagination ml-3">
          <li v-if="pagination.current_page > 1" class="page-item">
            <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page - 1)">
              <span>Atras</span>
            </a>
          </li>
          <li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']" class="page-item">
            <a class="page-link" href="#" @click.prevent="changePage(page)">{{ page }}</a>
          </li>
          <li v-if="pagination.current_page < pagination.last_page" class="page-item">
            <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page + 1)">
              <span>Siguiente</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <!-- lista libros -->
    <div class="row">
      <div v-if="libros.length>0" class="col-3 mb-3"  v-for="libro in libros">
        <div class="card" >
          <img class="card-img-top" v-bind:src="libro.foto_dir" height="250"  alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><small>{{libro.nombre}}</small></h5>
            <p class="card-text"><b>Categoria </b><small>{{libro.categoria_libro.descripcion}}</small></p>
          </div>
        </div>
  
      </div>
    </div>
    
  </div>
</template>

<script>
  export default {
    data() {
      return {
        libros: [],
        pagination: {
          'total': 0,
          'current_page': 0,
          'per_page': 0,
          'last_page': 0,
          'from': 0,
          'to': 0
        },
        offset: 3,
      };
    },
    created: function() {
      this.getLibros();
    },
    methods: {
      getLibros(page) {
        console.log(page);        
        var urlLibros = 'http://localhost/admin/libros?page=' + page;
        axios.get(urlLibros).then(response => {
          this.libros = response.data.libros.data,
          this.pagination = response.data.pagination
        });
      },
      changePage: function(page) {
        this.pagination.current_page = page;
        this.getLibros(page);
      }
    },
    computed: {
      isActived: function() {
        return this.pagination.current_page;
      },
      pagesNumber: function() {
        if (!this.pagination.to) {
          return [];
        }
  
        var from = this.pagination.current_page - this.offset;
        if (from < 1) {
          from = 1;
        }
  
        var to = from + (this.offset * 2);
        if (to >= this.pagination.last_page) {
          to = this.pagination.last_page;
        }
  
        var pagesArray = [];
        while (from <= to) {
          pagesArray.push(from);
          from++;
        }
        return pagesArray;
      }
    }
  };
</script>

<style>
  
</style>