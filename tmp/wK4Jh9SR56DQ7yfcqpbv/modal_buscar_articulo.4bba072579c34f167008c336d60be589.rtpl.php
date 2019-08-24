<?php if(!class_exists('raintpl')){exit;}?><div class="modal" id="modal_articulos">
   <div class="modal-dialog" style="width: 99%; max-width: 1000px;">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Buscar artículos</h4>
            <p class="help-block">
               <span class="glyphicon glyphicon-info-sign"></span>
               Coloca el puntero sobre un precio para ver la fecha en la que fue actualizado.
            </p>
         </div>
         <div class="modal-body">
            <form id="f_buscar_articulos" name="f_buscar_articulos" action="<?php echo $fsc->url();?>" method="post" class="form">
               <input type="hidden" name="codcliente" value="<?php echo $fsc->cliente_s->codcliente;?>"/>
               <input type="hidden" name="codalmacen"/>
               <input type="hidden" name="coddivisa"/>
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-sm-4">
                        <div class="input-group">
                           <input class="form-control" type="text" name="query" autocomplete="off"/>
                           <span class="input-group-btn">
                              <button class="btn btn-primary" type="submit">
                                 <span class="glyphicon glyphicon-search"></span>
                              </button>
                           </span>
                        </div>
                        <label class="checkbox-inline">
                           <input type="checkbox" name="con_stock" value="TRUE" onchange="buscar_articulos()"/>
                           sólo con stock
                        </label>
                     </div>
                     <div class="col-sm-4">
                        <select class="form-control" name="codfamilia" onchange="buscar_articulos()">
                           <option value="">Cualquier familia</option>
                           <?php $loop_var1=$fsc->familia->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                           <option value="<?php echo $value1->codfamilia;?>"><?php echo $value1->nivel;?><?php echo $value1->descripcion;?></option>
                           <?php } ?>

                        </select>
                     </div>
                     <div class="col-sm-4">
                        <select class="form-control" name="codfabricante" onchange="buscar_articulos()">
                           <option value="">Cualquier fabricante</option>
                           <?php $loop_var1=$fsc->fabricante->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                           <option value="<?php echo $value1->codfabricante;?>"><?php echo $value1->nombre;?></option>
                           <?php } ?>

                        </select>
                     </div>
                  </div>
               </div>
            </form>
         </div>
         <ul class="nav nav-tabs" id="nav_articulos" style="display: none;">
            <li id="li_mis_articulos">
               <a href="#" id="b_mis_articulos">Mi catálogo</a>
            </li>
            <li id="li_nuevo_articulo">
               <a href="#" id="b_nuevo_articulo">
                  <span class="glyphicon glyphicon-plus"></span>&nbsp; Nuevo
               </a>
            </li>
         </ul>
         <div id="search_results"></div>
         <div id="nuevo_articulo" class="modal-body" style="display: none;">
            <form name="f_nuevo_articulo" action="<?php echo $fsc->url();?>" method="post" class="form">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-sm-4">
                        <div class="form-group">
                           Referencia:
                           <div class="input-group">
                              <input class="form-control" type="text" name="referencia" maxlength="18" autocomplete="off"/>
                              <span class="input-group-btn" title="Borrar">
                                 <button class="btn btn-default" type="button" onclick="document.f_nuevo_articulo.referencia.value='';document.f_nuevo_articulo.descripcion.focus();">
                                    <span class="glyphicon glyphicon-edit"></span>
                                 </button>
                              </span>
                           </div>
                           <p class="help-block">Dejar en blanco para asignar una referencia automática.</p>
                        </div>
                     </div>
                     <div class="col-sm-8">
                        <div class="form-group">
                           Descripción:
                           <textarea name="descripcion" rows="1" class="form-control"></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-4">
                        <div class="form-group">
                           Código de barras:
                           <div class="input-group">
                              <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-barcode"></span>
                              </span>
                              <input class="form-control" type="text" name="codbarras" maxlength="18" autocomplete="off"/>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                           <a href="<?php echo $fsc->familia->url();?>">Familia</a>:
                           <select name="codfamilia" class="form-control">
                              <option value="">Ninguna</option>
                              <option value="">------</option>
                              <?php $loop_var1=$fsc->familia->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                              <option value="<?php echo $value1->codfamilia;?>"><?php echo $value1->nivel;?><?php echo $value1->descripcion;?></option>
                              <?php } ?>

                           </select>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                           <a href="<?php echo $fsc->fabricante->url();?>">Fabricante</a>:
                           <select name="codfabricante" class="form-control">
                              <option value="">Ninguno</option>
                              <option value="">------</option>
                              <?php $loop_var1=$fsc->fabricante->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                              <option value="<?php echo $value1->codfabricante;?>"><?php echo $value1->nombre;?></option>
                              <?php } ?>

                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-4">
                        <div class="form-group">
                           <a href="<?php echo $fsc->impuesto->url();?>"><?php  echo FS_IVA;?></a>:
                           <select name="codimpuesto" class="form-control">
                              <?php $loop_var1=$fsc->impuesto->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>

                              <option value="<?php echo $value1->codimpuesto;?>"<?php if( $value1->is_default() ){ ?> selected=""<?php } ?>><?php echo $value1->descripcion;?></option>
                              <?php } ?>

                           </select>
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                           Precio de venta:
                           <input type="text" name="pvp" value="0" class="form-control" autocomplete="off"/>
                        </div>
                     </div>
                     <div class="col-sm-4 text-right">
                        <br/>
                        <button class="btn btn-sm btn-primary" type="submit" onclick="new_articulo();return false;">
                           <span class="glyphicon glyphicon-floppy-disk"></span>&nbsp; Guardar y seleccionar
                        </button>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12">
                        <label class="checkbox-inline">
                           <input type="checkbox" name="secompra" value="TRUE" checked=""/> Se compra
                        </label> &nbsp;
                        <label class="checkbox-inline">
                           <input type="checkbox" name="sevende" value="TRUE" checked=""/> Se vende
                        </label> &nbsp;
                        <label class="checkbox-inline">
                           <input type="checkbox" name="nostock" value="TRUE"/> No controlar stock
                        </label> &nbsp;
                        <label class="checkbox-inline">
                           <input type="checkbox" name="publico" value="TRUE"/>
                           <span class="glyphicon glyphicon-globe"></span> Público
                        </label>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>