<?php

declare(strict_types=1);

namespace Kussin\Sooqr\Core;

use OxidEsales\Eshop\Core\DatabaseProvider;

final class ModuleEvents
{
    public static function onActivate(): void
    {
        self::_addMissingConfigurationFields();
    }

    private static function _addMissingConfigurationFields(): void
    {
        self::_updateOxvendor();
        self::_updateOxmanufacturers();
        self::_updateOxcategories();
        self::_updateOxarticles();
    }

    private static function _addNewColumn($sTable, $aColumns): void
    {
        foreach ($aColumns as $aColumn) {
            $sName = $aColumn['name'];
            $sSettings = $aColumn['settings'];

            $sQuery = "SHOW COLUMNS FROM `$sTable` LIKE '$sName';";
            $oResult = DatabaseProvider::getDb()->getAll($sQuery);

            if ($oResult == FALSE) {
                $sQuery = "ALTER TABLE `$sTable` ADD COLUMN `$sName` $sSettings;";
                DatabaseProvider::getDb()->execute($sQuery);
            }
        }
    }

    private static function _updateOxvendor(): void
    {
        self::_addNewColumn(
            'oxvendor',
            [
                array(
                    'name' => 'KUSSINSOOQRUUID',
                    'settings' => 'VARCHAR(50) NULL DEFAULT NULL COMMENT \'KUSSIN Sooqr UUID\' COLLATE \'utf8_general_ci\'',
                )
            ]
        );
    }

    private static function _updateOxmanufacturers(): void
    {
        self::_addNewColumn(
            'oxmanufacturers',
            [
                array(
                    'name' => 'KUSSINSOOQRUUID',
                    'settings' => 'VARCHAR(50) NULL DEFAULT NULL COMMENT \'KUSSIN Sooqr UUID\' COLLATE \'utf8_general_ci\'',
                )
            ]
        );
    }

    private static function _updateOxcategories(): void
    {
        self::_addNewColumn(
            'oxcategories',
            [
                array(
                    'name' => 'KUSSINSOOQRUUID',
                    'settings' => 'VARCHAR(50) NULL DEFAULT NULL COMMENT \'KUSSIN Sooqr UUID\' COLLATE \'utf8_general_ci\'',
                )
            ]
        );
    }

    private static function _updateOxarticles(): void
    {
        self::_addNewColumn(
            'oxarticles',
            [
                array(
                    'name' => 'KUSSINSOOQRUUID',
                    'settings' => 'VARCHAR(50) NULL DEFAULT NULL COMMENT \'KUSSIN Sooqr UUID\' COLLATE \'utf8_general_ci\'',
                )
            ]
        );
    }

}
