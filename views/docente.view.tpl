<h2>Listado de Docente</h2>
<<a href="index.php?page=docentem&mode=ins">Agregar docente</a>
<table style="margin:2em; width:90%">
    <tr>
        <th>
            Cod.
        </th>
        <th>
            Nombre
        </th>
        <th>
            Direccion
        </th>
        <th>
            Cod.
        </th>
        <th>
            Fecha Nacimiento
        </th>
        <th>
            Nombramiento
        </th>
        <th>
            sexo
        </th>
    </tr>



    {{foreach docente}}
    <tr>
        <td>
            {{doceId}}
        </td>

        <td>
            {{docNom}}
        </td>

        <td>
            {{docDir}}
        </td>

        <td>
            {{docNac}}
        </td>

        <td>
            {{docNombramiento}}
        </td>

        <td>
            {{sexo_sexoId}}
        </td>


        <td>
            <!-- <a href="index.php?page=rolesm&mode=upd&rolcod={{rolcod}}">Actualizar</a> |
            <a href="index.php?page=rolesm&mode=dlt&rolcod={{rolcod}}">Eliminar</a> -->
            <a href="index.php?page=docente&mode=upd&doceId={{doceId}}">Actualizar</a> |
            <a href="index.php?page=docente&mode=dlt&doceId={{doceId}}">Eliminar</a>
        </td>
    </tr>
    {{endfor docente}}


</table>
