[{$smarty.block.parent}]

[{assign var="oConf" value=$oViewConf->getConfig()}]

[{assign var="sSooqrId" value=$oConf->getConfigParam('sKussinSooqrClientId')}]
[{assign var="blEnabled" value=$oConf->getConfigParam('blKussinSooqrRecommendationsEnabled')}]
[{assign var="blSubHeading" value=$oConf->getConfigParam('blKussinSooqrRecommendationsSubheadingEnabled')}]
[{assign var="sProductId" value=$oDetailsProduct->oxarticles__oxartnum->value}]
[{assign var="sContainerUuid" value=$oView->getSooqrUuid()}]

[{if $sSooqrId && $blEnabled && $sContainerUuid && $sProductId}]
    <div class="boxwrapper" id="kussin-sooqr-recommendations-wrapper">
        <div class="page-header">
            <h2>
                [{oxmultilang ident="KUSSIN_SOOQR_RECOMMENDATIONS"}]

            </h2>

            [{if $blSubHeading}]
                <small class="subhead">[{oxmultilang ident="KUSSIN_SOOQR_RECOMMENDATIONS_SUBHEADING"}]</small>
            [{/if}]
        </div>

        <div class="list-container" id="kussin-sooqr-recommendations-container">
            <ins class="sqr-recommender" data-sqr-container-uuid="[{$sContainerUuid}]"></ins>
            <script async src="https://static.sooqr.com/recommendations/sooqr-recommender.js"></script>
        </div>
    </div>
[{/if}]