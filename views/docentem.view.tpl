<h2>{{doceTitle}}</h2>
<a href="index.php?page=docente">Listado de docentes</a>
<form action="index.php?page=docentem&mode={{doceMode}}" method="post">
  <div>
    <label class="col4" for="doceId">Indentidad</label>
    <input class="col8" type="text" id="doceId" name="doceId" value="{{doceId}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="docNom">Nombre</label>
    <input class="col8" type="text" id="docNom" name="docNom" value="{{docNom}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="docDir">Direcion</label>
    <input class="col8" type="text" id="docDir" name="docDir" value="{{docDir}}" {{disabled}}/>
  </div>

  <div>
    <label class="col4" for="docNac">Nacimiento</label>
    <input class="col8" type="text" id="docNac" name="docNac" value="{{docNac}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="docNombramiento">Nombremiento</label>
    <input class="col8" type="text" id="docNombramiento" name="docNombramiento" value="{{docNombramiento}}" {{disabled}}/>
  </div>
  <div>
    <label class="col4" for="sexo_sexoId">Sexo</label>
    <select class="col8" id="sexo_sexoId" name="sexo_sexoId" {{disabled}}>
      <option value="1" {{mSelected}}>masculino</option>
      <option value="2" {{finaSelected}}>femenino</option>
    </select>
  <div class="right col12">
    <input type="hidden" id="btnacc" name="btnacc" value="{{doceMode}}"/>
    <input type="button" name="btnGuardar" value="Confirmar" onclick="document.forms[0].submit();"/>
  </div>
</form>
