<h2>{{rolTitle}}</h2>
<a href="index.php?page=roles">Listado de Roles</a>
<form action="index.php?page=rolesm&mode={{rolMode}}" method="post">
  <div>
    <label class="col4" for="rolid">Código</label>
    <input class="col8" type="text" disabled="disabled" id="rolid" name="rolid" value="{{rolid}}"/>
    <input type="hidden" id="rolid" name="rolid" value="{{rolid}}"/>
  </div>
  <div>
    <label class="col4" for="roldsc">Rol</label>
    <input class="col8" type="text" id="roldsc" name="roldsc" value="{{roldsc}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="rolest">Estado</label>
    <select class="col8" id="rolest" name="rolest" {{disabled}}>
      <option value="ACT" {{actSelected}}>Activo</option>
      <option value="INA" {{inaSelected}}>Inactivo</option>
    </select>
  <div class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{rolMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </div>
</form>
