<?php /* Smarty version 2.6.28, created on 2015-02-02 11:50:24
         compiled from install.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'install.tpl', 39, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

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
   
<?php if (( ((is_array($_tmp=@$this->_tpl_vars['success'])) ? $this->_run_mod_handler('default', true, $_tmp, false) : smarty_modifier_default($_tmp, false)) )): ?>
    	<p class="alert alert-success text-center" role="alert">База данных успешно восстановлена из дампа.</br>
            <a class="alert-link" href="index.php">Перейти на главную страницу сайта.</a></p>
<?php endif; ?>

</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
