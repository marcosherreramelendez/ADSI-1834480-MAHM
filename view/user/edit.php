<div class="container">
    <div class="text-center">
      <h1 class="h1"><a style="background: #war"><i><font face="Algerian"><?=$button?></i></a></h1>
    </div>
    <hr>
    <form class="user"  method="post" action="index.php?c=<?=database::encryptor('encrypt', 'user')?>&a=<?=database::encryptor('encrypt', 'crud')?>">
      <div class="form-row">
      <div class="form-group col-md-6">
        <label>Nombre</label>
        <input type="text" id="name" name="name" class="form-control"  value="<?=$name?>" placeholder="Nombre Del Usuario" > 
      </div>
      <div class="form-group col-md-6">
        <label>Correo</label>
        <input type="email" id="email" name="email" class="form-control" value="<?=$email?>"  placeholder="Email Del Usuario" >
      </div>
    <div class="form-group col-md-12">
      <label>Tipo De Usuarios</label>
      <select name="level" id="level" class="form-control">
        <option <?=$select1?> value="1">Super Usuarios</option>
        <option <?=$select2?> value="2">Administrador</option>        
      </select>
    </div>
    </div>
      <hr>
        <div class="container text-center">
        <input type="hidden" name="id" value="<?=$id?>">
        <button type="submit" class="btn btn-primary">
            <?=$button?>
        </button>
        </div>
    </form>
</div>