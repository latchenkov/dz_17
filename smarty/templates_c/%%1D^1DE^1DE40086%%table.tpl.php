<?php /* Smarty version 2.6.28, created on 2015-04-07 14:57:32
         compiled from table.tpl */ ?>
<h2 class="sub-header" >Все объявления</h2>
    <div class="table-responsive" style="height: 600px; overflow:auto; ">
        <table id="main" class="table">
           <thead>
                <tr>
                    <th>Дата публикации</th>
                    <th>Название</th>
                    <th></th>
                    <th>Цена</th>
                    <th>Имя автора</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tbody">
                   <?php echo $this->_tpl_vars['ads_rows']; ?>

            </tbody>
        </table>
            
    </div>