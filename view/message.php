<?php
if (isset($_REQUEST['m'])) {
    $msg = Database::encryptor( 'decrypt', $_REQUEST['m']);
    $err = Database::encryptor( 'decrypt', $_REQUEST['e']);
    if ($err == 0){
        $alert = 'alert-success';
    }   else
    {
        $alert = 'alert-danger';
    }
    
    ?> 
    <div class="alert <?=$alert?>" role="alert">
                <i class="fa fa-exclamation text-center"></i>&nbsp;&nbsp;
        <strong><?=$msg?>.</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>    
    </div>
<?php
}
