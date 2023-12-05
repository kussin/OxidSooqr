<?php
/**
 * Metadata version
 */
$sMetadataVersion = '2.0';

use Kussin\Sooqr\Core\ModuleEvents;
use OxidEsales\Eshop\Application\Component\Widget\ArticleDetails;
use OxidEsales\Eshop\Application\Controller\SearchController;

/**
 * Module information
 */
$aModule = array(
    'id'           => 'kussin/sooqr',
    'title'        => 'Kussin | Sooqr Connector for OXID eShop',
    'description'  => 'Sooqr Connector for OXID eShop',
    'thumbnail'    => 'module.png',
    'version'      => '1.1.0',
    'author'       => 'Daniel Kussin',
    'url'          => 'https://www.kussin.de',
    'email'        => 'daniel.kussin@kussin.de',

    'extend' => array(
        ArticleDetails::class => Kussin\Sooqr\Component\Widget\ArticleDetails::class,
        SearchController::class => Kussin\Sooqr\Controller\SearchController::class,
    ),

    'events' => array(
        'onActivate' => ModuleEvents::class . '::onActivate',
    ),

    'blocks' => array(
        array(
            'template' => 'article_main.tpl',
            'block' => 'admin_article_main_form',
            'file' => 'views/blocks/admin/admin_article_main_form.tpl',
        ),
        array(
            'template' => 'include/category_main_form.tpl',
            'block' => 'admin_category_main_form',
            'file' => 'views/blocks/admin/admin_category_main_form.tpl',
        ),
        array(
            'template' => 'manufacturer_main.tpl',
            'block' => 'admin_manufacturer_main_form',
            'file' => 'views/blocks/admin/admin_manufacturer_main_form.tpl',
        ),
        array(
            'template' => 'vendor_main.tpl',
            'block' => 'admin_vendor_main_form',
            'file' => 'views/blocks/admin/admin_vendor_main_form.tpl',
        ),
        array(
            'template' => 'layout/base.tpl',
            'block' => 'base_js',
            'file' => '/views/blocks/base_js.tpl',
        ),
        array(
            'template' => 'widget/header/search.tpl',
            'block' => 'widget_header_search_form',
            'file' => '/views/blocks/widget_header_search_form.tpl',
        ),
        array(
            'template' => 'page/details/inc/related_products.tpl',
            'block' => 'details_relatedproducts_crossselling',
            'file' => '/views/blocks/details_relatedproducts_crossselling.tpl',
        ),
    ),

    'settings' => array(
        array(
            'group' => 'sKussinSooqrSettings',
            'name' => 'sKussinSooqrClientId',
            'type' => 'str',
            'value' => '123456-1',
        ),
        array(
            'group' => 'sKussinSooqrSettings',
            'name' => 'bKussinSooqrResizeFunction',
            'type' => 'bool',
            'value' => 0,
        ),
        array(
            'group' => 'sKussinSooqrSettings',
            'name' => 'sKussinSooqrPosition',
            'type' => 'str',
            'value' => 'screen-middle',
        ),
        array(
            'group' => 'sKussinSooqrSettings',
            'name' => 'sKussinPositionOptions',
            'type' => 'str',
            'value' => '{top:0}',
        ),
        array(
            'group' => 'sKussinSooqrSettings',
            'name' => 'sKussinSooqrLocaleCode',
            'type' => 'str',
            'value' => 'de_DE',
        ),
        array(
            'group' => 'sKussinSooqrSettings',
            'name' => 'sKussinSooqrExcludePlaceholders',
            'type' => 'str',
            'value' => 'Suche..',
        ),

        array(
            'group' => 'sKussinSooqrRecommendationsSettings',
            'name' => 'blKussinSooqrRecommendationsEnabled',
            'type' => 'bool',
            'value' => 0,
        ),
        array(
            'group' => 'sKussinSooqrRecommendationsSettings',
            'name' => 'blKussinSooqrRecommendationsSubheadingEnabled',
            'type' => 'bool',
            'value' => 0,
        ),
        array(
            'group' => 'sKussinSooqrRecommendationsSettings',
            'name' => 'sKussinSooqrRecommendationsContainerUuid',
            'type' => 'str',
            'value' => 'ed4898cc-be9c-465c-84b9-5181d2664048',
        ),
    )
);