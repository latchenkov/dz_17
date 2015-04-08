<?php /* Smarty version 2.6.28, created on 2015-01-26 14:53:12
         compiled from table_row.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'table_row.tpl', 2, false),array('modifier', 'string_format', 'table_row.tpl', 5, false),)), $this); ?>
<tr>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['ad']->getDate())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d:%m:%Y %T") : smarty_modifier_date_format($_tmp, "%d:%m:%Y %T")); ?>
</td>
    <td><?php echo $this->_tpl_vars['ad']->getTitle(); ?>
</td>
    <td><a class="btn btn-info btn-xs " title="Показать объявление" href="?show=<?php echo $this->_tpl_vars['ad']->getId(); ?>
#form"><strong>?</strong></a></td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['ad']->getPrice())) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
 руб.</td>
    <td><?php echo $this->_tpl_vars['ad']->getSeller_name(); ?>
</td>
    <td align="center"><a class="btn btn-danger btn-xs " title="Удалить объявление" href="?delete=<?php echo $this->_tpl_vars['ad']->getId(); ?>
"><strong>X</strong></a></td>
</tr>
               