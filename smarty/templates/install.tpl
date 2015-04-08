{include file='header.tpl'}

<div class="container" style="width:600px; margin-top: 150px;" >
<form class="form-horizontal"  method="post" >
    
    <div class="form-group">
    <label class="col-sm-3 control-label">Server name:</label>
        <div class="col-sm-6">
            <input class="form-control" type="text" maxlength="40" value="" name="db_host" required  >
        </div>
    </div>
    <div class="form-group">
    <label class="col-sm-3 control-label">User name:</label>
        <div class="col-sm-6">
            <input class="form-control" type="text" maxlength="40" value="" name="db_user" required >
        </div>
    </div>
    <div class="form-group">
    <label class="col-sm-3 control-label">Password:</label>
        <div class="col-sm-6">
            <input class="form-control" type="text" maxlength="40" value="" name="db_password" >
        </div>
    </div>
    <div class="form-group">
    <label class="col-sm-3 control-label">Database:</label>
        <div class="col-sm-6">
            <input class="form-control" type="text" maxlength="40" value="" name="db_name" required >
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <input class="btn btn-primary" type="submit" value="Install" name="submit" >
        </div>
    </div>
    
</form>
   
{* Вывод уведомления об успехе  *}
{if ($success|default:false)}
    	<p class="alert alert-success text-center" role="alert">База данных успешно восстановлена из дампа.</br>
            <a class="alert-link" href="index.php">Перейти на главную страницу сайта.</a></p>
{/if}

</div>

{include file='footer.tpl'}

