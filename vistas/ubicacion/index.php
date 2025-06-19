<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>Data Table</h1>
            <ul class="breadcrumb side">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Tables</li>
              <li class="active"><a href="#">Data Table</a></li>
            </ul>
          </div>
          <div><a class="btn btn-primary btn-flat" href="?c=ubicacion&a=FormCrear"><i class="fa fa-lg fa-plus"></i></a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>latitud</th>
                      <th>longitud</th>
                      <th>direccion</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php foreach($this->modelo->Listar() as $r):?>
                    <tr>

                      <td><?=$r->id_ubicacion?></td>
                      <td><?=$r->latitud?></td>
                      <td><?=$r->longitud?></td>
                      <td><?=$r->direccion_textual?></td>
                      
                      <td>
                          <a class="btn btn-info btn-flat" href="?c=ubicacion&a=FormCrear&id=<?=$r->id_ubicacion?>"><i class="fa fa-lg fa-refresh"></i></a>

                          <a class="btn btn-warning btn-flat" href="?c=ubicacion&a=Borrar&id=<?=$r->id_ubicacion?>"><i class="fa fa-lg fa-trash"></i></a>
                    
                    </td>
                    </tr>
                <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>