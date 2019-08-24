<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>


<script type="text/javascript">
   $(document).ready(function() {   
      if(window.location.hash.substring(1) == 'nuevo')
      {
         $("#modal_nuevo_atributo").modal('show');
         document.f_nuevo_atributo.nuevo.focus();
      }
      $("#b_nuevo_atributo").click(function(event) {
         event.preventDefault();
         $("#modal_nuevo_atributo").modal('show');
         document.f_nuevo_atributo.nuevo.focus();
      });
   });
</script>

<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="btn-group">
            <a class="btn btn-sm btn-default" href="index.php?page=ventas_articulos">
               <span class="glyphicon glyphicon-arrow-left"></span>
               <span class="hidden-xs">&nbsp;Artículos</span>
            </a>
            <a class="btn btn-sm btn-default" href="<?php echo $fsc->url();?>" title="Recargar la página">
               <span class="glyphicon glyphicon-refresh"></span>
            </a>
         </div>
         <a id="b_nuevo_atributo" class="btn btn-sm btn-success" href="#">
            <span class="glyphicon glyphicon-plus"></span>
            <span class="hidden-xs">&nbsp;Nuevo</span>
         </a>
         <div class="btn-group">
            <?php $loop_var1=$fsc->extensions; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

               <?php if( $value1->type=='button' ){ ?>

               <a href="index.php?page=<?php echo $value1->from;?><?php echo $value1->params;?>" class="btn btn-sm btn-default"><?php echo $value1->text;?></a>
               <?php } ?>

            <?php } ?>

         </div>
      </div>
   </div>
</div>

<div class="container-fluid">
   <div class="row">
      <div class="col-sm-12">
         <div class="page-header">
            <h1>
               <span class="glyphicon glyphicon-list-alt"></span>
               Atributos y valores
               <small><?php echo count($fsc->resultados); ?></small>
            </h1>
            <p class="help-block">
               Desde aquí puedes crear atributos como talla, color, etc... para
               usar en los artículos. <b>Recuerda</b> que para poder elegir los
               atributos de un artículo debes modificar su <b>tipo</b> a
               <b>producto con atributos</b>.
            </p>
         </div>
      </div>
   </div>
   <div class="row">
      <?php $loop_var1=$fsc->resultados; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

      <div class="col-sm-4 col-lg-3" style="margin-bottom: 5px;">
         <a href="<?php echo $value1->url();?>" class="btn btn-sm btn-block btn-default">
            <span class="glyphicon glyphicon-list-alt"></span>
            &nbsp; <?php echo $value1->nombre;?>

         </a>
      </div>
      <?php }else{ ?>

      <div class="col-sm-12 col-lg-12">
         <div class="alert alert-warning">Sin resultados.</div>
      </div>
      <?php } ?>

   </div>
</div>

<form name="f_nuevo_atributo" action="<?php echo $fsc->url();?>" method="post" class="form">
   <div class="modal" id="modal_nuevo_atributo" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               <h4 class="modal-title">Nuevo atributo</h4>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  Nombre:
                  <input type="text" name="nuevo" placeholder="Atributo..." class="form-control" onkeypress="teclear(event);return LetrasNumeros(event)" autocomplete="off" required=""/>
               </div>
            </div>
            <div class="modal-footer">
               <button class="btn btn-sm btn-primary" type="submit">
                  <span class="glyphicon glyphicon-floppy-disk"></span>&nbsp; Guardar
               </button>
            </div>
         </div>
      </div>
   </div>
</form>

<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>

<script type = "text/javascript">
   
    var flag = false;
     var teclaAnterior = "";
     
     function teclear(event) {
       teclaAnterior = teclaAnterior + " " + event.keyCode;
       var arregloTA = teclaAnterior.split(" ");
       if (event.keyCode == 32 && arregloTA[arregloTA.length - 2] == 32) {
         event.preventDefault();
       }
     }
  </script>
  