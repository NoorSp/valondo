<?php

namespace Shopware\Themes\ThemeValondo;

use Shopware\Components\Form as Form;

class Theme extends \Shopware\Components\Theme
{
    protected $extend = 'ThemeMars';

    protected $name = <<<'SHOPWARE_EOD'
Theme Mars mit Änderungen
SHOPWARE_EOD;

    protected $description = <<<'SHOPWARE_EOD'

SHOPWARE_EOD;

    protected $author = <<<'SHOPWARE_EOD'

SHOPWARE_EOD;

    protected $license = <<<'SHOPWARE_EOD'

SHOPWARE_EOD;

	protected $css = array(
        'src/css/owl.theme.default.min.css',
        'src/css/owl.carousel.css',
        'src/css/new-custom.css',
	);

	protected $javascript = [
        'src/js/main.js',
	    'src/js/owl.carousel.min.js',
	    'src/js/script.js',
	];

    public function createConfig(Form\Container\TabContainer $container)
    {
    }
}
