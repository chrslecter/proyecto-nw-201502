<h2>Listado de Aportaciones</h2>
<<a href="index.php?page=aportacionesm&mode=ins">Agregar aportaciones</a>
<table style="margin:2em; width:90%" border="1">
    <tr>
        <th>
            Codigo
        </th>
        <th>
            Descripcion
        </th>
        <th>
            Cantidad
        </th>


    </tr>



    {{foreach aportaciones}}
    <tr>
        <td>
            {{aportacionesCod}}
        </td>

        <td>
            {{aportacionesDes}}
        </td>

        <td>
            {{aportacionesCant}}
        </td>


        <td>
        <a href="index.php?page=aportacionesm&mode=upd&aportacionesCod={{aportacionesCod}}">Actualizar</a> |
        <a href="index.php?page=aportacionesm&mode=dlt&aportacionesCod={{aportacionesCod}}">Eliminar</a>
      </td>
    </tr>
    {{endfor aportaciones}}


</table>
