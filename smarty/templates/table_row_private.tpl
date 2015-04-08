<tr data-id="{$ad->getId()}">
    <td>{$ad->getDate()|date_format:"%d:%m:%Y %T"}</td>
    <td>{$ad->getTitle()}</td>
    <td><a class="show btn btn-info btn-xs " title="Показать объявление" ><strong>?</strong></a></td>
    <td>{$ad->getPrice()|string_format:"%.2f"} руб.</td>
    <td>{$ad->getSeller_name()}</td>
    <td align="center"><a class="delete btn btn-danger btn-xs " title="Удалить объявление" ><strong>X</strong></a></td>
</tr>
               