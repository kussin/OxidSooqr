[{$smarty.block.parent}]

[{assign var="oConf" value=$oViewConf->getConfig()}]

[{assign var="sSooqrId" value=$oConf->getConfigParam('sKussinSooqrClientId')}]
[{assign var="bResize" value=$oConf->getConfigParam('bKussinSooqrResizeFunction')}]
[{assign var="sPosition" value=$oConf->getConfigParam('sKussinSooqrPosition')}]
[{assign var="sPositionOptions" value=$oConf->getConfigParam('sKussinPositionOptions')}]
[{assign var="sLocale" value=$oConf->getConfigParam('sKussinSooqrLocaleCode')}]
[{assign var="sExcludePlaceholders" value=$oConf->getConfigParam('sKussinSooqrExcludePlaceholders')}]

[{if $sSooqrId}]
    <script type="text/javascript">
        [{capture assign="sJsInline"}]
        var _wssq = _wssq || [];
        var setResizeFunction = [{if $bResize}]true[{else}]false[{/if}];
        var sooqrAccount = '[{$sSooqrId}]';

        _wssq.push(['_load', { 'suggest' : { 'account' : 'SQ-' + sooqrAccount, 'version' : 4, fieldId : 'searchParam'}}]);
        _wssq.push(['suggest._setPosition', '[{$sPosition}]', [{$sPositionOptions}]]);
        _wssq.push(['suggest._setLocale', '[{$sLocale}]']);
        _wssq.push(['suggest._excludePlaceholders', '[{$sExcludePlaceholders}]']);
        _wssq.push(['suggest._bindEvent', 'open', function() {
            if(!setResizeFunction) {$jQ( window ).resize(function() {if($jQ('.sooqrSearchContainer-' + sooqrAccount).is(':visible'))
                    {websight.sooqr.instances['SQ-' + sooqrAccount].positionContainer(null, null, true);}});setResizeFunction = true;}
        }]);

        (function() {
            var ws = document.createElement('script'); ws.type = 'text/javascript'; ws.async = true;
            ws.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'static.sooqr.com/sooqr.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ws, s);
        })();
        [{/capture}]
    </script>
    [{oxscript add=$sJsInline}]
[{/if}]