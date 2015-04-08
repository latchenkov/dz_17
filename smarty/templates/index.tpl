
{include file='header.tpl'}

<div class="container-fluid" >
<div id="informer" class="alert alert-warning alert-dismissible"  role="alert">
    <button type="button" class="close_alert" onclick="$('#informer').fadeOut();return false;"><span aria-hidden="true">&times;</span></button>
        <div id="informer_text" ></div>
</div>

<div class="col-sm-4 col-sm-offset-1 " style="padding: 30px;">
<form id="form" class="form-horizontal"  method="post" >
    <input type="hidden" class="clear_form" name="id" value="">
    <input type="hidden" class="clear_form" name="date" value="">
	<div class="form-group">
            <div class="col-sm-offset-5 col-sm-7">
                <div class="radio">
                    <label>
                        {html_radios class="set_form" name="type" options=$radio_id selected=$type|default:'private' separator="</br>"}
                    </label>
                </div>
            </div>
        </div>            
        <div class="form-group">
            <label for="inputSeller_name" class="col-sm-5 control-label">Ваше имя</label>
                <div class="col-sm-7">
                    <input type="text" name="seller_name" class="form-control clear_form" id="inputSeller_name" placeholder="Ваше имя" maxlength="40" value="{$seller_name|default:''}"  required >
                </div>
        </div>
        <div class="form-group">
            <label for="inputEmail" class="col-sm-5 control-label">Электронная почта</label>
                <div class="col-sm-7">
                    <input type="email" name="email" class="form-control clear_form" id="inputEmail" placeholder="Ваш e-mail" value="{$email|default:''}"  required >
                </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-5 col-sm-7">
                <div class="checkbox">
                    <label>
                        <input class="set_form" type="checkbox" {$allow_mails|default:''|replace:1:'checked=""'|replace:0:''} value="1" name="allow_mails" ><small>&nbsp;&nbsp;Я не хочу получать вопросы по объявлению по e-mail</small>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPhone" class="col-sm-5 control-label">Номер телефона</label>
                <div class="col-sm-7">
                    <input type="tel" name="phone" class="form-control clear_form" id="inputPhone" placeholder="Ваш телефон" value="{$phone|default:''}"  required >
                </div>
        </div>
        <div class="form-group">
            <label for="inputLocation" class="col-sm-5 control-label">Город</label>
                <div class="col-sm-7">
                   <select class="form-control set_form" title="Выберите Ваш город" name="location_id" required  > 
                        <option value="">-- Выберите город --</option>
                        <option disabled="disabled">-- Города --</option>
                            {html_options options=$location selected=$location_id|default:$location_sel}
                    </select> 
                </div>
        </div>
        <div class="form-group">
            <label for="inputCategory" class="col-sm-5 control-label">Категория</label>
                <div class="col-sm-7">
                   <select class="form-control set_form" title="Выберите категорию объявления" name="category_id"  required>
                        <option value="">-- Выберите категорию --</option>
                            {foreach from=$label item=item key=key}
                                <optgroup label="{$item}">
                                    {html_options options=$category.$key selected=$category_id|default:''}
                                </optgroup>
                            {/foreach}    
                    </select> 
                </div>
        </div>
        <div class="form-group">
            <label for="inputTitle" class="col-sm-5 control-label">Название объявления</label>
                <div class="col-sm-7">
                    <input type="text" name="title" class="form-control clear_form" id="inputTitle" placeholder="Название объявления" value="{$title|default:''}"  required >
                </div>
        </div>
        <div class="form-group">
            <label for="inputDesc" class="col-sm-5 control-label">Описание объявления</label>
                <div class="col-sm-7">
                    <textarea name="description" class="form-control clear_form" rows="5" id="inputDesc" placeholder="Текст объявления" required>{$description|default:''}</textarea>
                </div>
        </div>
        <div class="form-group">
            <label for="inputPrice" class="col-sm-5 control-label">Цена</label>
                <div class="col-sm-7">
                    <div class="input-group">
                    <input type="text" name="price" class="form-control clear_form" id="inputPrice" placeholder="Ведите цену" value="{$price|default:0}" >
                        <div class="input-group-addon">руб.</div>
                    </div>
                </div>
        </div>
                        
        <div class="form-group">
            <div class="col-sm-5">
                <button id="submit" type="submit" class="btn btn-success" style="width: 180px"><strong>Добавить объявление</strong></button>
            </div>
            <div class="col-sm-offset-2 col-sm-5">
                <button id="resetForm" type="button" class="btn btn-warning" style="width: 150px"><strong>Очистить форму</strong></button>
            </div>
        </div>
</form>
</div>
     <div class="col-sm-6 " >
        {include file='table.tpl'}
            
    </div>
</div>

{include file='footer.tpl'}