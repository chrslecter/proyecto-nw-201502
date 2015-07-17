<h2>Listado de Categorias</h2>
<a href="index.php?page=rolesm&mode=ins">Agregar Categoría</a>
<table style="margin:2em; width:90%">
    <tr>
        <th>
            Cod.
        </th>
        <th>
            roles
        </th>
        <th>
            Estado
        </th>
        <th>

        </th>
    </tr>
    {{foreach roles}}
    <tr>
        <td>
            {{rolcod}}
        </td>
        <td>
            <a href>{{roldsc}}</a>
        </td>
        <td>
            {{rolest}}
        </td>
        <td>
            <a href="index.php?page=rolesm&mode=upd&rolcod={{rolcod}}">Actualizar</a> |
            <a href="index.php?page=rolesm&mode=dlt&rolcod={{rolcod}}">Eliminar</a>
        </td>
    </tr>
    {{endfor roles}}
</table>
