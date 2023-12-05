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
            // TODO: Load SOOQR UUID from Article Vendor

            // TODO: Load SOOQR UUID from Article Manufacturer

            // TODO: Load SOOQR UUID from Article Main Category

            // TODO: Load SOOQR UUID from Article

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