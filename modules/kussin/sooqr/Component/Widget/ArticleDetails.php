<?php

namespace Kussin\Sooqr\Component\Widget;

use OxidEsales\Eshop\Application\Model\Article;
use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Registry;

class ArticleDetails extends ArticleDetails_parent
{
    const MODULE_ID = 'kussin/sooqr';

    protected $_oArticle = NULL;
    protected $_iLang = NULL;

    private $_sSooqrUuid = NULL;

    private function _getArticle() {

        if ($this->_oArticle == NULL) {
            // CONFIG
            $myConfig = Registry::getConfig();

            $sArticleId = $myConfig->getRequestParameter('anid');
            $this->_iLang = Registry::getLang()->getTplLanguage();

            // LOAD ARTICLE
            $this->_oArticle = oxNew(Article::class);
            $this->_oArticle->loadInLang($this->_iLang, $sArticleId);

            // LOAD PARENT
            if ($this->_oArticle->oxarticles__oxparentid->value) {
                $oParent = oxNew(Article::class);
                $oParent->loadInLang($this->_iLang, $this->_oArticle->oxarticles__oxparentid->value);

                // REPLACE ARTICLE
                $this->_oArticle = $oParent;
            }
        }

        return $this->_oArticle;
    }
    public function getSooqrUuid() {
        $sSooqrUuid = $this->_getSooqrUuid();

        // LOAD ARTICLE
        $oArticle = $this->_getArticle();

        if ($oArticle != NULL) {
            // Load SOOQR UUID from Article Vendor
            $sSooqrVendorUuid = trim($oArticle->getVendor()->oxvendor__kussinsooqruuid->value);
            if (
                ($sSooqrVendorUuid != NULL)
                && ($sSooqrVendorUuid != '')
            ) {
                $sSooqrUuid = $sSooqrVendorUuid;
            }

            // Load SOOQR UUID from Article Manufacturer
            $sSooqrManufacturerUuid = trim($oArticle->getManufacturer()->oxmanufacturers__kussinsooqruuid->value);
            if (
                ($sSooqrManufacturerUuid != NULL)
                && ($sSooqrManufacturerUuid != '')
            ) {
                $sSooqrUuid = $sSooqrManufacturerUuid;
            }

            // Load SOOQR UUID from Article Main Category
            $sSooqrCategoryUuid = trim($oArticle->getCategory()->oxcategories__kussinsooqruuid->value);
            if (
                ($sSooqrCategoryUuid != NULL)
                && ($sSooqrCategoryUuid != '')
            ) {
                $sSooqrUuid = $sSooqrCategoryUuid;
            }

            // Load SOOQR UUID from Article
            $sSooqrArticleUuid = trim($oArticle->oxarticles__kussinsooqruuid->value);
            if (
                ($sSooqrArticleUuid != NULL)
                && ($sSooqrArticleUuid != '')
            ) {
                $sSooqrUuid = $sSooqrArticleUuid;
            }

        }

        return $sSooqrUuid;
    }

    private function _getSooqrUuid() {
        if ($this->_sSooqrUuid == NULL) {
            $oConfig = Registry::getConfig();

            $oDb = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC);
            $sQuery = "SELECT oxvartype, " . $oConfig->getDecodeValueQuery() . " AS oxvarvalue FROM oxconfig WHERE oxmodule = 'module:" . self::MODULE_ID . "' AND oxvarname = 'sKussinSooqrRecommendationsContainerUuid'";

            $oResult = $oDb->select($sQuery, []);

            if ($oResult != false && $oResult->count() > 0) {
                $this->_sSooqrUuid = $oConfig->decodeValue($oResult->fields['oxvartype'], $oResult->fields['oxvarvalue']);
            }
        }

        return $this->_sSooqrUuid ?? 'ERROR_UNDEFINED_SOOQR_UUID';
    }
}