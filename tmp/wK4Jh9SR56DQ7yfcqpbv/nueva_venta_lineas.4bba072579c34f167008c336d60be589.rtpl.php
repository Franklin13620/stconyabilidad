<?php if(!class_exists('raintpl')){exit;}?><div class="table-responsive">
    <table class="table table-condensed" style="margin-bottom: 0px;">
        <thead>
            <tr>
                <th class="text-left" width="180">Referencia</th>
                <th class="text-left">Descripción</th>
                <th class="text-right" width="90">Cantidad</th>
                <th width="50"></th>
                <th class="text-right" width="110">Precio</th>
                <th class="text-right" width="90">Dto. %</th>
                <th class="text-right dtosl" width="90">Dto. 2 %</th>
                <th class="text-right dtosl" width="90">Dto. 3 %</th>
                <th class="text-right dtosl" width="90">Dto. 4 %</th>
                <th class="text-right" width="130">Neto</th>
                <th class="text-right" width="115"><?php  echo FS_IVA;?></th>
                <th class="text-right recargo" width="115">RE %</th>
                <th class="text-right irpf" width="115"><?php  echo FS_IRPF;?> %</th>
                <th class="text-right" width="140">Total</th>
            </tr>
        </thead>
        <tbody id="lineas_doc"></tbody>
        <tfoot>
            <tr class="info">
                <td>
                    <input id="i_new_line" class="form-control" type="text" placeholder="Buscar para añadir..." autocomplete="off"/>
                </td>
                <td>
                    <a href="#" class="btn btn-sm btn-default" title="Añadir sin buscar" onclick="return add_linea_libre()">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </a>
                </td>
                <td colspan="12"></td>
            </tr>
        </tfoot>
    </table>
    <table class="table table-condensed">
        <tfoot>
            <tr class="info">
                <th class="text-right">Subtotal</th>
                <th class="text-right">Dto. %</th>
                <th class="dtost text-right">Dto. 2 %</th>
                <th class="dtost text-right">Dto. 3 %</th>
                <th class="dtost text-right">Dto. 4 %</th>
                <th class="dtost text-right">Dto. 5 %</th>
                <th class="text-right">Neto</th>
                <th class="text-right"><?php  echo FS_IVA;?></th>
                <th class="recargo text-right">Recargo</th>
                <th class="irpf text-right"><?php  echo FS_IRPF;?></th>
                <th class="text-right">Total</th>
            </tr>
            <tr class="info">
                <td>
                    <div id="anetosindto" class="form-control text-right" onkeyup="recalcular()" onclick="this.select()"><?php echo $fsc->show_numero(0);?></div>
                </td>
                <td>
                    <input id="adtopor1" name="adtopor1" class="form-control text-right" onkeyup="recalcular()" onclick="this.select()" value="<?php echo $fsc->show_numero(0);?>"/>
                </td>
                <td class="dtost">
                    <input id="adtopor2" name="adtopor2" class="form-control text-right" onkeyup="recalcular()" onclick="this.select()" value="<?php echo $fsc->show_numero(0);?>"/>
                </td>
                <td class="dtost">
                    <input id="adtopor3" name="adtopor3" class="form-control text-right" onkeyup="recalcular()" onclick="this.select()" value="<?php echo $fsc->show_numero(0);?>"/>
                </td>
                <td class="dtost">
                    <input id="adtopor4" name="adtopor4" class="form-control text-right" onkeyup="recalcular()" onclick="this.select()" value="<?php echo $fsc->show_numero(0);?>"/>
                </td>
                <td class="dtost">
                    <input id="adtopor5" name="adtopor5" class="form-control text-right" onkeyup="recalcular()" onclick="this.select()" value="<?php echo $fsc->show_numero(0);?>"/>
                </td>
                <td>
                    <div id="aneto" class="form-control text-right"><?php echo $fsc->show_numero(0);?></div>
                </td>
                <td>
                    <div id="aiva" class="form-control text-right"><?php echo $fsc->show_numero(0);?></div>
                </td>
                <td class="recargo">
                    <div id="are" class="form-control text-right"><?php echo $fsc->show_numero(0);?></div>
                </td>
                <td class="irpf">
                    <div id="airpf" class="form-control text-right"><?php echo $fsc->show_numero(0);?></div>
                </td>
                <td>
                    <input type="text" name="atotal" id="atotal" class="form-control text-right" value="0" onchange="recalcular()" autocomplete="off"/>
                </td>
            </tr>
        </tfoot>
    </table>
</div>