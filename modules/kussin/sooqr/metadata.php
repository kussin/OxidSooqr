<?php
/**
 * Metadata version
 */
$sMetadataVersion = '2.0';

use OxidEsales\Eshop\Application\Controller\SearchController;

/**
 * Module information
 */
$aModule = array(
    'id'           => 'kussin/sooqr',
    'title'        => 'Kussin | Sooqr Connector for OXID eShop',
    'description'  => 'Sooqr Connector for OXID eShop',
    'thumbnail'    => 'module.png',
    'version'      => '1.0.0.1',
    'author'       => 'Daniel Kussin',
    'url'          => 'https://www.kussin.de',
    'email'        => 'daniel.kussin@kussin.de',

    'extend' => array(
        SearchController::class => Kussin\Sooqr\Controller\SearchController::class,
    ),

    'blocks' => array(
        array(
            'template' => 'layout/base.tpl',
            'block' => 'base_js',
            'file' => '/views/blocks/base_js.tpl'
        ),
        array(
            'template' => 'widget/header/search.tpl',
            'block' => 'widget_header_search_form',
            'file' => '/views/blocks/widget_header_search_form.tpl'
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
    )
);