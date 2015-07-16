<h2>Listado de Categorias</h2>
<a href>Agregar Categoría</a>
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
            <a href="index.php?page=categoria&mode=UPD&catcod={{catcod}}">Actualizar</a> |
            <a href>Eliminar</a>
        </td>
    </tr>
    {{endfor roles}}
</table>
