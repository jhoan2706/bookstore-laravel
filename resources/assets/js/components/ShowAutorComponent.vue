<template>
  <div class="modal fade" id="showObjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong>Ver Autor</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <h4>{{autor_info.nombre}}</h4> -->
        <div class="card card-inverse" style="background-color: #FFFFF;">
        <div class="card-block">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h2 class="card-title">Nombre: {{autor_info.nombre+" "+autor_info.apellido}}</h2>
                    <!-- <p class="card-text"><strong>Profile: </strong> Web Developer </p> -->
                    <p><strong>Nacionalidad: </strong>
                        {{pais_autor.nombre}}
                    </p>
                    <p class="card-text"><strong>Fecha Nacimiento: </strong>{{autor_info.fecha_nacimiento}}</p>
                    <!-- <p class="card-text"><strong>Nacionalidad: </strong>{{autor_info.fecha_nacimiento}}</p> -->
                </div>
                <!-- <div class="col-md-4 col-sm-4 text-center">
                    <img class="btn-md"  v-bind:src="'../../../../public/images/'+autor_info.foto_dir" alt="" style="border-radius:50%;">
                </div> -->
                <div class="col-md-4 col-sm-4 text-center">
                    <h2><strong> 5.2K </strong></h2>
                    <p><small>Likes</small></p>
                    <button class="btn btn-primary btn-block btn-md"><i class="fas fa-thumbs-up"></i>
                     Like  </button>
                </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <h2><strong>1.4K</strong></h2>
                    <p><small>Shares</small></p>
                    <button class="btn btn-success btn-block btn-md"><i class="fab fa-twitter-square"></i> Share </button>
                </div>
                <div class="col-md-4 col-sm-4 text-center">
                    <h2><strong>3.8K</strong></h2>
                    <p><small>Dislikes</small></p>
                    <button type="button" class="btn btn-danger btn-block btn-md"><i class="fas fa-thumbs-down"></i>Dislike </button>  
                </div>
            </div>
        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>  
</template>

<script>
import EventBus from "../event-bus";
export default {
  data() {
    return {
      autor_info: {},
      pais_autor: {}
    };
  },
  created() {
    EventBus.$on("show-object", data => {
      this.autor_info = data;
      this.pais_autor = this.autor_info.pais; //traspasando mini json objeto de autor_info ya que no permite mostrar en html autor_info.pais.nombre
      //console.log(this.autor_info);
    });
  }
};
</script>

<style>
.btn {
  border-radius: 0;
}
.btn-md {
  border-width: 0;
  outline: none;
  border-radius: 0;
  box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.6);
  cursor: pointer;
}
</style>
