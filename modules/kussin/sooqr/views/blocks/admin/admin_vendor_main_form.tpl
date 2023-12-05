[{$smarty.block.parent}]

<tr>
    <td class="edittext">
        [{oxmultilang ident="KUSSIN_SOOQR_CONTAINER_UUID"}]&nbsp;
    </td>
    <td class="edittext">
        <input type="text" class="editinput" size="50" maxlength="[{$edit->oxvendor__kussinsooqruuid->fldmax_length}]" name="editval[oxvendor__kussinsooqruuid]" value="[{$edit->oxvendor__kussinsooqruuid->value}]">
        [{oxinputhelp ident="HELP_KUSSIN_SOOQR_CONTAINER_UUID"}]
    </td>
</tr>