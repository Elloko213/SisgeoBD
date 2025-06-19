<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i> Ubicacion</h1>
            <p>Ingresa los datos para registrar una ubicacion nueva</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Ubicacion</li>
              <li><a href="#"><?=$titulo?> Ubicacion</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-lg-6">
                  <div class="well bs-component">
                    <form class="form-horizontal" method="POST" action="?c=ubicacion&a=Guardar">
                      <fieldset>
                        <legend><?=$titulo?>  Ubicacion</legend>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Id_ubicacion">ID</label>
                          <div class="col-lg-10">
                         <input class="form-control" name="Id_ubicacion" type="number" value="<?=$u->getId_ubicacion()?>">
                        </div>
                        </div>

                        <div class="form-group">
                         <label class="col-lg-2 control-label" for="Latitud">Latitud</label>
                         <div class="col-lg-10">
                          <input required class="form-control" name="Latitud" type="number" placeholder="Latitud" value="<?=$u->getLatitud()?>">
                        </div>

                        </div>


                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Longitud">Longitud</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Longitud" type="number" placeholder="Longitud" value="<?=$u->getLongitud()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="Direccion">Direccion</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="Direccion" type="text" placeholder="Direccion" value="<?=$u->getDireccion_textual()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                            <button href="?c=ubicacion" class="btn btn-default" >Cancelar</button>
                            <button class="btn btn-primary" type="submit">Enviar</button>
                          </div>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>