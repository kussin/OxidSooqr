# Kussin | Sooqr Connector for OXID eShop

Kussin | Sooqr Connector for OXID eShop Kussin | Sooqr Connector for OXID eShop replaces OXID eShop search bar 
with a search bar from [Sooqr](https://www.sooqr.com/).

**NOTE:** It also installs [Kussin | OXID 6 FACT Finder Export Queue](https://github.com/kussin/OxidFactFinderExportQueue) for Sooqr XML exports.

**The following configuration options are available:**

1. `account` - Sooqr ID
2. `setResizeFunction` - Suggest language code
3. `_setPosition` - Suggest Position (e.g. `screen-middle`)
4. `_setPositionOptions` - Suggest Position-Options (e.g. `{top:50, left: 20}`)
5. `_setLocale` - Suggest language code
6. `_excludePlaceholders` - Suggest exclude placeholders (e.g. `Search..`)

TODO: Will follow soon

## Requirement

1. OXID eSales CE/PE/EE v6.2.5 or newer
2. PHP 7.4 or newer

## Installation Guide

### Initial Installation

To install the module, please execute the following commands in OXID eShop root directory:

   ```bash
   composer config repositories.kussin_sooqr vcs https://github.com/kussin/OxidSooqr.git
   composer require kussin/sooqr --no-update
   composer clearcache
   composer update --no-interaction
   vendor/bin/oe-console oe:module:install-configuration source/modules/kussin/sooqr/
   vendor/bin/oe-console oe:module:apply-configuration
   ```

**NOTE:** If you are using VCS like GIT for your project, you should add the following path to your `.gitignore` file:
`/source/modules/kussin/`

## User Guide

[User Guide](USER_GUIDE.md)

## Bugtracker and Feature Requests

Please use the [Github Issues](https://github.com/kussin/OxidSooqr/issues) for bug reports and feature requests.

## Support

Kussin | eCommerce und Online-Marketing GmbH<br>
Fahltskamp 3<br>
25421 Pinneberg<br>
Germany

Fon: +49 (4101) 85868 - 0<br>
Email: info@kussin.de

## Licence

[End-User Software License Agreement](LICENSE.md)

## Copyright

&copy; 2006-2023 Kussin | eCommerce und Online-Marketing GmbH