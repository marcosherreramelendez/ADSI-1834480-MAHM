      <!-- DataTales Example -->
      <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary">Registro De Usuarios</h5>
              <a href="index.php?c=<?=database::encryptor('encrypt', 'user')?>&a=<?=database::encryptor('encrypt', 'edit')?>" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-user-plus"></i>
                    </span>
                    <span class="text">Crear Usuarios</span>
                  </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th>Rol</th>
                      <th>Activo</th>
                      <th>Ultima Session</th>
                      <th><i class="fa fa-cogs"></i></th>
                      <th><i class="fa fa-cogs"></i></th>
                      <th><i class="fa fa-cogs"></i></th>
                      <th><i class="fa fa-cogs"></i></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th>Rol</th>
                      <th>Activo</th>
                      <th>Ultima Session</th>
                      <th><i class="fa fa-cogs"></i></th>
                      <th><i class="fa fa-cogs"></i></th>
                      <th><i class="fa fa-cogs"></i></th>
                      <th><i class="fa fa-cogs"></i></th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                  $num = 0;
                 foreach ($this->model->index() as $row):
                    $num++;
                      ?>
                    <tr>
                      <td><?=$row->id?></td>
                      <td><?=$row->name?></td>
                      <td><?=$row->email?></td>
                      <td><?=$row->level?></td>
                      <td><?=$row->active?></td>
                      <td><?=$row->lastAccess?></td>
                      <td>
                          <a href="index.php?c=<?=database::encryptor('encrypt', 'user')?>&a=<?=database::encryptor('encrypt', 'edit')?>&id=<?=$row->id?>" class="btn btn-success btn-circle .btn-sm">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg>
                          </a>
                      </td>
                      <td>
                      <a href="index.php?c=<?=database::encryptor('encrypt', 'user')?>&a=<?=database::encryptor('encrypt', 'delete')?>&id=<?=$row->id?>" class="btn btn-danger btn-circle .btn-sm" data-toggle="modal" data-target="#logoutModal<?=$num?>">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                    </svg>
                          </a>
                          <!-- Logout Modal-->
                          <div class="modal fade" id="logoutModal<?=$num?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title text-danger text-center" id="exampleModalLabel">
                                          <i class="fa fa-exclamation-triangle"></i>&nbsp;&nbsp;
                                            Eliminar Usuario?</h5>
                                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">×</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">Realmente desea eliminar el usuario?.</div>
                                      <div class="modal-footer">
                                          <button class="btn btn-success" type="button" data-dismiss="modal">
                                          <i class="">
                                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-square-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm9.854 4.854a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                                          </svg>
                                          </i>&nbsp;&nbsp;
                                          Cancelar
                                          </button>
                                          <a class="btn btn-danger" href="index.php?c=<?=database::encryptor('encrypt', 'user')?>&a=<?=database::encryptor('encrypt', 'delete')?>&id=<?=$row->id?>">
                                          <i class="fa fa-trash"></i>&nbsp;&nbsp;
                                          Eliminar
                                          </a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </td>
                      <td>
                        <a href="index.php?c=<?=database::encryptor('encrypt', 'user')?>>&a=<?=database::encryptor('encrypt', 'upload')?>&id=<?=database::encryptor('encrypt', $row->id)?>" class="btn btn-primary">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cloud-arrow-up-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 5.146l-2-2a.5.5 0 0 0-.708 0l-2 2a.5.5 0 1 0 .708.708L7.5 6.707V10.5a.5.5 0 0 0 1 0V6.707l1.146 1.147a.5.5 0 0 0 .708-.708z"/>
                        </svg>
                        </a>  
                      </td>
                      <td>
                      <a href= "index.php?c=<?=Database::encryptor('encrypt','user')?>&a=<?=Database::encryptor('encrypt','viewDoc')?>&id=<?=Database::encryptor('encrypt',$row->id)?>" class="btn btn-warning">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-bar-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M11.354 5.854a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L8 3.207l2.646 2.647a.5.5 0 0 0 .708 0z"/>
                          <path fill-rule="evenodd" d="M8 10a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-1 0v6.5a.5.5 0 0 0 .5.5zm-4.8 1.6c0-.22.18-.4.4-.4h8.8a.4.4 0 0 1 0 .8H3.6a.4.4 0 0 1-.4-.4z"/>
                        </svg>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                  <?php endforeach; ?>
            </table>
              </div>
            </div>
          </div>

