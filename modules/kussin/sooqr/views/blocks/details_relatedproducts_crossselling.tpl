[{$smarty.block.parent}]

[{assign var="oConf" value=$oViewConf->getConfig()}]

[{assign var="sSooqrId" value=$oConf->getConfigParam('sKussinSooqrClientId')}]
[{assign var="blEnabled" value=$oConf->getConfigParam('blKussinSooqrRecommendationsEnabled')}]
[{assign var="blSubHeading" value=$oConf->getConfigParam('blKussinSooqrRecommendationsSubheadingEnabled')}]
[{assign var="sProductId" value=$oDetailsProduct->oxarticles__oxartnum->value}]
[{assign var="sContainerUuid" value=$oConf->getConfigParam('sKussinSooqrRecommendationsContainerUuid')}]

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

        <div class="list-container kussin-sooqr-related-products-slider" id="kussin-sooqr-recommendations-container"></div>
            <script type="text/javascript">
                (function() {
                    //Create the ins tag
                    var ws = document.createElement('ins');
                    //Set variable for the product ID that matches the ID set in the MySooqr basic fields
                    var sqrProductID = '[{$sProductId}]';
                    //Set uuid of the recommender container
                    ws.setAttribute('data-sqr-container-uuid','[{$sContainerUuid}]');
                    //Set the product ID
                    ws.setAttribute('data-sqr-product-id', sqrProductID)
                    //Set class
                    ws.setAttribute('class','sqr-recommender');
                    //Place the recommender in the related-products-slider container
                    var s = document.getElementsByClassName('kussin-sooqr-related-products-slider')[0]; s.parentNode.insertBefore(ws, s);
                })();
            </script>
    </div>
[{/if}]