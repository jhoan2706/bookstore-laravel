<template>
  <div>
    <div class="row">
      <FormFilter/>
      <div class="col-9">
        <pagination :data="books" @pagination-change-page="getBooks"></pagination>
        <div class="row">
          <div class="col-md-4 col-sm-6 col-12" v-for="book in books.data" :key="book.id">
            <figure class="card card-product">
              <div class="img-wrap">
                <a :href="link_detail+book.id">
                  <img src="https://via.placeholder.com/200" height="250">
                </a>
              </div>
              <figcaption class="info-wrap">
                <h4 class="title">{{book.nombre}}</h4>
                <p class="desc">
                  <b>Categoria:</b>
                  <small>{{book.categoria_libro.descripcion}}</small>
                </p>
                <p class="desc">
                  <b>Fecha:</b>
                  <small>{{book.fecha_publicacion}}</small>
                </p>
                <div class="rating-wrap">
                  <ul class="rating-stars">
                    <li style="width:80%" class="stars-active">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </li>
                    <li>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </li>
                  </ul>
                  <div class="label-rating">132 reviews</div>
                  <div class="label-rating">154 orders</div>
                </div>
              </figcaption>
              <div class="bottom-wrap">                
                <a href class="btn btn-sm btn-primary float-right" title="Añadir al carrito">
                  <i class="fas fa-cart-plus"></i>
                </a>
                <a
                  :href="link_detail+book.id"
                  class="btn btn-sm btn-info float-right mr-1"
                  title="Ver Detalle"
                >
                  <i class="fas fa-info-circle"></i>
                </a>
                <a :href="link_detail+book.id+'/edit'" class="btn btn-sm btn-warning float-right mr-1" title="Editar Libro">
                 <i class="fas fa-pencil-alt"></i>
                </a>

                <!-- <router-link to="/vue/view/{{book.id}}"><a href class="btn btn-sm btn-info float-right mr-1" title="Ver Detalle">
                  <i class="fas fa-info-circle"></i>
                </a></router-link>-->
                <div class="price-wrap h5">
                  <span class="price-new">{{book.precio}}</span>
                  <del class="price-old">1980</del>
                </div>
              </div>
            </figure>
          </div>
        </div>
        <pagination :data="books" @pagination-change-page="getBooks"></pagination>
      </div>
    </div>
  </div>
</template>

<script>
import FormFilter from "./form_filter";
import EventBus from "../../event-bus";
export default {
  data() {
    return {
      books: {},
      data: {
        book_name: null,
        book_category: null,
        book_price1: null,
        book_price2: null,
        book_year: null
      },
      link_detail: "/admin/libros/",
    };
  },
  components: {
    FormFilter
  },
  created() {
    this.getBooks();
    EventBus.$on("data-filter", data => {
      this.data = data[0];
      this.getBooks();
    });
    EventBus.$on("book_added", data => {
      this.resetData();
      this.getBooks();
    });
  },
  methods: {
    getBooks(page = 1) {
      axios
        .get("/admin/libros?page=" + page, {
          params: {
            book_name: this.data.book_name,
            book_category: this.data.book_category,
            book_price1: this.data.book_price1,
            book_price2: this.data.book_price2,
            book_year: this.data.book_year
          }
        })
        .then(response => {
          this.books = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    resetData() {
      this.data.book_name = null;
      this.data.book_category = null;
      this.data.book_price1 = null;
      this.data.book_price2 = null;
      this.data.book_year = null;
    }
  }
};
</script>

<style>
</style>
