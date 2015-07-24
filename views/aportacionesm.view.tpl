<h2>{{aportacionesTitle}}</h2>
<a href="index.php?page=aportaciones">aportaciones</a>
<form action="index.php?page=aportacionesm&mode={{aportacionesMode}}" method="post">
  <div>
    <label class="col4" for="aportacionesCod">codigo</label>
    <input class="col8" type="text" id="aportacionesCod" name="aportacionesCod" value="{{aportacionesCod}}" {{disabled}}/>
  </div>

  <div>
    <label class="col4" for="aportacionesDes">Descripcion</label>
    <input class="col8" type="text" id="aportacionesDes" name="aportacionesDes" value="{{aportacionesDes}}" {{disabled}}/>
  </div>

  <div>
    <label class="col4" for="aportacionesCant">cantidad</label>
    <input class="col8" type="text" id="aportacionesCant" name="aportacionesCant" value="{{aportacionesCant}}" {{disabled}}/>
  </div>

  <div class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{aportacionesMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </div>
</form>
