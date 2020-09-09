<?php

namespace Shopware\Themes\ThemeMars;

use Doctrine\Common\Collections\ArrayCollection;
use Shopware\Components\Form as Form;
use Shopware\Components\Theme\ConfigSet;

class Theme extends \Shopware\Components\Theme
{
	protected $extend = 'Responsive';

	/**
	 * Defines the human readable theme name
	 * which displayed in the backend
	 * @var string
	 */
	protected $name = 'Theme Mars';

	/**
	 * Allows to define a description text
	 * for the theme
	 * @var null
	 */
	protected $description = 'Theme Mars';

	/**
	 * Name of the theme author.
	 * @var null
	 */
	protected $author = 'Coolbax';

	/**
	 * License of the theme source code.
	 *
	 * @var null
	 */
	protected $license = 'Coolbax';

	/**
	 * Javascript files which will be used in the theme
	 *
	 * @var array
	 */
	protected $javascript = array(
		'src/js/mars.js',
		'src/js/banner_zoom.js',
		'src/js/breadcrumb_modified.js',
		'src/js/filter_modified.js',
		'src/js/sidebar_widget.js',
		'src/js/sticky_menu.js'
	);

	private $fieldSetDefaults = [
		'layout' => 'column',
		'height' => 170,
		'flex' => 0,
		'defaults' => ['columnWidth' => 0.5, 'labelWidth' => 180, 'margin' => '3 16 3 0']
	];

	private function getLabelAttribute($snippetName, $labelType = 'boxLabel')
	{
		return ['attributes' => [$labelType => $snippetName]];
	}

	/**
	 * @param Form\Container\TabContainer $container
	 */
	public function createConfig(Form\Container\TabContainer $container)
	{
		// Create the tab
		$tab = $this->createTab(
			'theme_mars',
			'Theme Mars'
		);

		$container->addTab($tab);

		$tab->addElement($this->createBottomTabPanel());
	}

	private function createBottomTabPanel()
	{
		$tabPanel = $this->createTabPanel(
			'bottom_tab_panel2',
			[
				'attributes' => [
					'plain' => true
				]
			]
		);

		$tabPanel->addTab($this->createGeneralTab());
		$tabPanel->addTab($this->createColorTab());
		$tabPanel->addTab($this->createHeaderTab());
		$tabPanel->addTab($this->createCategoryTab());
		$tabPanel->addTab($this->createDetailTab());
		$tabPanel->addTab($this->createFooterTab());
		$tabPanel->addTab($this->createCheckoutTab());

		return $tabPanel;
	}

	private function createGeneralTab()
	{
		$tab = $this->createTab(
			'mars_general_tab',
			'Allgemein',
			[
				'attributes' => [
					'layout' => 'anchor',
					'autoScroll' => true,
					'padding' => '0',
					'defaults' => ['anchor' => '100%']
				]
			]
		);

		$tab->addElement($this->createFieldSetGeneralFont());
		$tab->addElement($this->createFieldSetGeneralNotification());
		$tab->addElement($this->createFieldSetGeneralSidebarWidget());
		$tab->addElement($this->createFieldSetGeneralFooterWidget());
		$tab->addElement($this->createFieldSetGeneralVerification());
		$tab->addElement($this->createFieldSetGeneralPrivacy());

		return $tab;
	}

	private function createColorTab()
	{
		$tab = $this->createTab(
			'mars_color_tab',
			'Farben',
			[
				'attributes' => [
					'layout' => 'anchor',
					'autoScroll' => true,
					'padding' => '0',
					'defaults' => ['anchor' => '100%']
				]
			]
		);

		$tab->addElement($this->createFieldSetColorBackground());
		$tab->addElement($this->createFieldSetColorTopBar());
		$tab->addElement($this->createFieldSetColorHeader());
		$tab->addElement($this->createFieldSetColorMainNavigation());
		$tab->addElement($this->createFieldSetColorStickyNavigation());
		$tab->addElement($this->createFieldSetColorSidebarNavigation());
		$tab->addElement($this->createFieldSetColorFilter());
		$tab->addElement($this->createFieldSetColorTabs());
		$tab->addElement($this->createFieldSetColorButton());
		$tab->addElement($this->createFieldSetColorBadge());
		$tab->addElement($this->createFieldSetColorCheckout());
		$tab->addElement($this->createFieldSetColorFooter());

		return $tab;
	}

	private function createHeaderTab()
	{
		$tab = $this->createTab(
			'mars_header_tab',
			'Header',
			[
				'attributes' => [
					'layout' => 'anchor',
					'autoScroll' => true,
					'padding' => '0',
					'defaults' => ['anchor' => '100%']
				]
			]
		);

		$tab->addElement($this->createFieldSetHeaderTopBar());
		$tab->addElement($this->createFieldSetHeaderLogo());
		$tab->addElement($this->createFieldSetHeaderSticky());
		$tab->addElement($this->createFieldSetHeaderBreadcrumb());
		$tab->addElement($this->createFieldSetHeaderBacktotop());

		return $tab;
	}

	private function createCategoryTab()
	{
		$tab = $this->createTab(
			'mars_category_tab',
			'Kategorie',
			[
				'attributes' => [
					'layout' => 'anchor',
					'autoScroll' => true,
					'padding' => '0',
					'defaults' => ['anchor' => '100%']
				]
			]
		);

		$tab->addElement($this->createFieldSetCategoryMain());
		$tab->addElement($this->createFieldSetCategorySidebar());
		$tab->addElement($this->createFieldSetCategoryFilter());
		$tab->addElement($this->createFieldSetCategoryPreviewImageChange());

		return $tab;
	}

	private function createDetailTab()
	{
		$tab = $this->createTab(
			'mars_detail_tab',
			'Detail',
			[
				'attributes' => [
					'layout' => 'anchor',
					'autoScroll' => true,
					'padding' => '0',
					'defaults' => ['anchor' => '100%']
				]
			]
		);

		$tab->addElement($this->createFieldSetDetailVariantInfo());
		$tab->addElement($this->createFieldSetDetailVote());

		return $tab;
	}

	private function createFooterTab()
	{
		$tab = $this->createTab(
			'mars_footer_tab',
			'Footer',
			[
				'attributes' => [
					'layout' => 'anchor',
					'autoScroll' => true,
					'padding' => '0',
					'defaults' => ['anchor' => '100%']
				]
			]
		);

		$tab->addElement($this->createFieldSetFooterTemplate());
		$tab->addElement($this->createFieldSetFooterPaymentAndShipping());
		$tab->addElement($this->createFieldSetFooterPayment());
		$tab->addElement($this->createFieldSetFooterShipping());

		return $tab;
	}

	private function createCheckoutTab()
	{
		$tab = $this->createTab(
			'mars_checkout_tab',
			'Checkout',
			[
				'attributes' => [
					'layout' => 'anchor',
					'autoScroll' => true,
					'padding' => '0',
					'defaults' => ['anchor' => '100%']
				]
			]
		);

		$tab->addElement($this->createFieldSetCheckoutBasket());
		$tab->addElement($this->createFieldSetCheckoutConfigurator());

		return $tab;
	}

	private function createFieldSetGeneralFont()
	{
		$fieldSet = $this->createFieldSet(
			'mars_general_font',
			'Schriftart',
			[
				'attributes' => [
					'layout' => 'anchor',
					'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
				]
			]
		);

		$fieldSet->addElement(
		   $this->createTextField(
			  'cbax_general_font_note',
			  '',
			  '',
			  [
				 'attributes' => [
					'xtype' => 'container',
					'html' => 'Sie haben hier die Möglichkeit zwei verschiedene Schriftarten zu nutzen. Die primäre Schriftart wird für Überschriften genutzt. Mit der sekundäre Schriftart ändern Sie alle anderen Texte, wie z. B. Beschreibungstexte und Menüpunkte.',
					'style' => 'padding: 0px 0px 20px 0px;'
				 ]
			  ]
		   )
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'mars-general-font-family-primary',
				'Primäre Schriftart',
				'Open Sans',
				[
					['value' => 'Arima Madurai', 'text' => 'Arima Madurai'],
					['value' => 'Cormorant Infant', 'text' => 'Cormorant Infant'],
					['value' => 'Dancing Script', 'text' => 'Dancing Script'],
					['value' => 'Frank Ruhl Libre', 'text' => 'Frank Ruhl Libre'],
					['value' => 'IBM Plex Mono', 'text' => 'IBM Plex Mono'],
					['value' => 'Kalam', 'text' => 'Kalam'],
					['value' => 'Lemonada', 'text' => 'Lemonada'],
					['value' => 'Lobster Two', 'text' => 'Lobster Two'],
					['value' => 'Maitree', 'text' => 'Maitree'],
					['value' => 'Orbitron', 'text' => 'Orbitron'],
					['value' => 'Open Sans', 'text' => 'Open Sans (Shopware Standard)'],
					['value' => 'Quicksand', 'text' => 'Quicksand'],
					['value' => 'Source Code Pro', 'text' => 'Source Code Pro'],
					['value' => 'Teko', 'text' => 'Teko'],
					['value' => 'Tillana', 'text' => 'Tillana'],
					['value' => 'Yantramanav', 'text' => 'Yantramanav']
				],
				$this->getLabelAttribute(
					'Wählen Sie hier Ihre Primäre Schriftart für die Headlines usw.',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'mars-general-font-family-secondary',
				'Sekundäre Schriftart',
				'Open Sans',
				[
					['value' => 'Arima Madurai', 'text' => 'Arima Madurai'],
					['value' => 'Cormorant Infant', 'text' => 'Cormorant Infant'],
					['value' => 'Dancing Script', 'text' => 'Dancing Script'],
					['value' => 'Frank Ruhl Libre', 'text' => 'Frank Ruhl Libre'],
					['value' => 'IBM Plex Mono', 'text' => 'IBM Plex Mono'],
					['value' => 'Kalam', 'text' => 'Kalam'],
					['value' => 'Lemonada', 'text' => 'Lemonada'],
					['value' => 'Lobster Two', 'text' => 'Lobster Two'],
					['value' => 'Maitree', 'text' => 'Maitree'],
					['value' => 'Orbitron', 'text' => 'Orbitron'],
					['value' => 'Open Sans', 'text' => 'Open Sans (Shopware Standard)'],
					['value' => 'Quicksand', 'text' => 'Quicksand'],
					['value' => 'Source Code Pro', 'text' => 'Source Code Pro'],
					['value' => 'Teko', 'text' => 'Teko'],
					['value' => 'Tillana', 'text' => 'Tillana'],
					['value' => 'Yantramanav', 'text' => 'Yantramanav']
				],
				$this->getLabelAttribute(
					'Wählen Sie hier Ihre Sekundäre Schriftart für normalen Text',
					'helpText'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetGeneralNotification()
	{
		$fieldSet = $this->createFieldSet(
			'mars_general_notification',
			'Globaler Benachrichtigungstext',
			[
				'attributes' => [
					'layout' => 'anchor',
					'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
				]
			]
		);

		$fieldSet->addElement(
			$this->createTextField(
				'cbax_notification_note',
				'',
				'',
				[
					'attributes' => [
						'xtype' => 'container',
						'html' => 'Am oberen oder unteren Bildschirmrand wird ein globaler Text für Ankündigungen (z.B. Betriebsurlaub oder Verkaufsaktionen) angezeigt.',
						'style' => 'padding: 0px 0px 20px 0px;'
					]
				]
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_notification_active',
				'Plugin aktiv',
				false,
				$this->getLabelAttribute(
					'Wenn aktiv, dann wird die Meldung angezeigt'
				)
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_notification_active_smartphone',
				'Auch auf Smartphone anzeigen',
				false,
				$this->getLabelAttribute(
					'Wenn aktiv, dann wird der Benachrichtigungstext auch auf dem Smartphone angezeigt'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_notification_display',
				'Anzeigen auf',
				array('index'),
				[
					['value' => 'index', 'text' => 'Startseite'],
					['value' => 'listing', 'text' => 'Listing'],
					['value' => 'search', 'text' => 'Suche'],
					['value' => 'detail', 'text' => 'Artikel'],
					['value' => 'custom', 'text' => 'Shopseiten'],
					['value' => 'campaign', 'text' => 'Landingpages'],
					['value' => 'forms', 'text' => 'Formulare'],
					['value' => 'note', 'text' => 'Merkzettel'],
					['value' => 'newsletter', 'text' => 'Newsletter'],
					['value' => 'blog', 'text' => 'Blog'],
					['value' => 'checkout', 'text' => 'Checkout']
				],
				['attributes' => ['multiSelect' => true, 'editable' => false, 'helpText' => 'Auf welchen Seiten soll der Text angezeigt werden (Mehrfachauswahl möglich)']]
			)
		);
		$fieldSet->addElement(
			$this->createDateField(
				'cbax_notification_start_date',
				'Startdatum',
				''
			)
		);
		$fieldSet->addElement(
			$this->createDateField(
				'cbax_notification_end_date',
				'Enddatum',
				''
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_notification_position',
				'Position',
				'above',
				[
					['value' => 'above', 'text' => 'Oberer Bildschirmrand'],
					['value' => 'below', 'text' => 'Unterer Bildschirmrand']
				],
				$this->getLabelAttribute(
					'Wählen Sie die Position des Textes',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-notification-bg',
				'Hintergrundfarbe',
				'@brand-primary'
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-notification-color',
				'Schriftfarbe',
				'#ffffff'
			)
		);
		$fieldSet->addElement(
			$this->createTextAreaField(
				'cbax_notification_text',
				'Benachrichtigungstext',
				'Wir befinden uns zur Zeit im Urlaub!',
				['attributes' => ['xtype' => 'textarea', 'lessCompatible' => false]]
			)
		);
		$fieldSet->addElement(
			$this->createTextField(
				'cbax_notification_link',
				'Link',
				'',
				['attributes' => ['lessCompatible' => false, 'helpText' => 'Geben Sie hier einen Link zu z. B. einer Infoseite an']]
			)
		);
		$fieldSet->addElement(
			$this->createTextField(
				'cbax_notification_link_text',
				'Link Text',
				'Hier klicken',
				$this->getLabelAttribute(
					'Text des Buttons, auf welchen die Kunden klicken müssen, um den Link aufzurufen. Der Link funktioniert nur, wenn das Feld "Link" ausgefüllt ist',
					'helpText'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetGeneralSidebarWidget()
	{
		$fieldSet = $this->createFieldSet(
			'mars_general_sidebar_widget',
			'Sidebar Widget',
			[
				'attributes' => [
					'layout' => 'anchor',
					'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
				]
			]
		);

		$fieldSet->addElement(
			$this->createTextField(
				'cbax_sidebar_widget_note',
				'',
				'',
				[
					'attributes' => [
						'xtype' => 'container',
						'html' => 'Am linken oder rechten Bildschirmrand wird eine Box für z. B. Informationen oder Werbeaktionen angeheftet. Die Box bleibt beim Scrollen immer an der gleichen Stelle.',
						'style' => 'padding: 0px 0px 20px 0px;'
					]
				]
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_sidebar_widget_active',
				'Widget aktiv',
				false,
				$this->getLabelAttribute(
					'Wenn aktiv, dann wird das Widget am seitlichen Rand des Bildschirms angezeigt'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_sidebar_widget_display',
				'Anzeigen auf',
				array('index'),
				[
					['value' => 'index', 'text' => 'Startseite'],
					['value' => 'listing', 'text' => 'Listing'],
					['value' => 'search', 'text' => 'Suche'],
					['value' => 'detail', 'text' => 'Artikel'],
					['value' => 'custom', 'text' => 'Shopseiten'],
					['value' => 'campaign', 'text' => 'Landingpages'],
					['value' => 'forms', 'text' => 'Formulare'],
					['value' => 'note', 'text' => 'Merkzettel'],
					['value' => 'newsletter', 'text' => 'Newsletter'],
					['value' => 'blog', 'text' => 'Blog'],
					['value' => 'checkout', 'text' => 'Checkout']
				],
				['attributes' => ['multiSelect' => true, 'editable' => false, 'helpText' => 'Auf welchen Seiten soll der Text angezeigt werden (Mehrfachauswahl möglich)']]
			)
		);
		$fieldSet->addElement(
			$this->createDateField(
				'cbax_sidebar_widget_start_date',
				'Startdatum',
				''
			)
		);
		$fieldSet->addElement(
			$this->createDateField(
				'cbax_sidebar_widget_end_date',
				'Enddatum',
				''
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_sidebar_widget_position',
				'Position',
				'left',
				[
					['value' => 'left', 'text' => 'Linker Bildschirmrand'],
					['value' => 'right', 'text' => 'Rechter Bildschirmrand']
				],
				$this->getLabelAttribute(
					'Wählen Sie die Position der Box',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createNumberField(
				'mars-sidebar-widget-distance',
				'Abstand nach oben (in Prozent)',
				'45',
				$this->getLabelAttribute(
					'Wie groß soll der Abstand zum oberen Bildschirmrand sein (Angabe in Prozent)',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createTextField(
				'cbax_sidebar_widget_headline',
				'Box Headline',
				'Ihre Vorteile'
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-sidebar-widget-bg',
				'Hintergrundfarbe',
				'#000000'
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'mars-sidebar-widget-opacity',
				'Deckkraft',
				'0.7',
				[
					['value' => '1', 'text' => '100%'],
					['value' => '0.9', 'text' => '90%'],
					['value' => '0.8', 'text' => '80%'],
					['value' => '0.7', 'text' => '70%'],
					['value' => '0.6', 'text' => '60%'],
					['value' => '0.5', 'text' => '50%']
				]
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-sidebar-widget-color',
				'Schriftfarbe',
				'#ffffff'
			)
		);
		$fieldSet->addElement(
			$this->createTextAreaField(
				'cbax_sidebar_widget_content',
				'Box Inhalt',
				'<div><p><strong>Ihre Vorteile</strong></p>
				 <ul class="usp-list">
				 <li>Tolle Sets / Bundles</li>
				 <li>Farbkonfigurator</li>
				 <li>Schnelle Lieferung</li>
				 <li>Kostenloser Versand</li>
				 <li>30 Tage Rückgaberecht</li>
				 <li>Markenqualität</li>
				 <li>Made in Germany</li>
				 </ul></div>',
				['attributes' => ['xtype' => 'tinymce', 'lessCompatible' => false]]
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_sidebar_widget_icon',
				'Icon',
				'icon--percent',
				[
					['value' => 'icon--percent2', 'text' => 'percent2'],
					['value' => 'icon--percent', 'text' => 'percent'],
					['value' => 'icon--coupon', 'text' => 'coupon'],
					['value' => 'icon--truck', 'text' => 'truck'],
					['value' => 'icon--logout', 'text' => 'logout'],
					['value' => 'icon--grid', 'text' => 'grid'],
					['value' => 'icon--filter', 'text' => 'filter'],
					['value' => 'icon--clock', 'text' => 'clock'],
					['value' => 'icon--arrow-up', 'text' => 'arrow-up'],
					['value' => 'icon--arrow-right', 'text' => 'arrow-right'],
					['value' => 'icon--arrow-left', 'text' => 'arrow-left'],
					['value' => 'icon--arrow-down', 'text' => 'arrow-down'],
					['value' => 'icon--star', 'text' => 'star'],
					['value' => 'icon--star-half', 'text' => 'star-half'],
					['value' => 'icon--star-empty', 'text' => 'star-empty'],
					['value' => 'icon--shopware', 'text' => 'shopware'],
					['value' => 'icon--service', 'text' => 'service'],
					['value' => 'icon--search', 'text' => 'search'],
					['value' => 'icon--numbered', 'text' => 'numbered'],
					['value' => 'icon--menu', 'text' => 'menu'],
					['value' => 'icon--mail', 'text' => 'mail'],
					['value' => 'icon--list', 'text' => 'list'],
					['value' => 'icon--layout', 'text' => 'layout'],
					['value' => 'icon--heart', 'text' => 'heart'],
					['value' => 'icon--cross', 'text' => 'cross'],
					['value' => 'icon--compare', 'text' => 'compare'],
					['value' => 'icon--check', 'text' => 'check'],
					['value' => 'icon--basket', 'text' => 'basket'],
					['value' => 'icon--account', 'text' => 'account'],
					['value' => 'icon--chain', 'text' => 'chain'],
					['value' => 'icon--delicious', 'text' => 'delicious'],
					['value' => 'icon--delicious2', 'text' => 'delicious2'],
					['value' => 'icon--digg', 'text' => 'digg'],
					['value' => 'icon--phone', 'text' => 'phone'],
					['value' => 'icon--mobile', 'text' => 'mobile'],
					['value' => 'icon--mouse', 'text' => 'mouse'],
					['value' => 'icon--directions', 'text' => 'directions'],
					['value' => 'icon--paperplane', 'text' => 'paperplane'],
					['value' => 'icon--pencil', 'text' => 'pencil'],
					['value' => 'icon--paperclip', 'text' => 'paperclip'],
					['value' => 'icon--drawer', 'text' => 'drawer'],
					['value' => 'icon--user-add', 'text' => 'user-add'],
					['value' => 'icon--users', 'text' => 'users'],
					['value' => 'icon--vcard', 'text' => 'vcard'],
					['value' => 'icon--export', 'text' => 'export'],
					['value' => 'icon--location', 'text' => 'location'],
					['value' => 'icon--map', 'text' => 'map'],
					['value' => 'icon--share', 'text' => 'share'],
					['value' => 'icon--house', 'text' => 'house'],
					['value' => 'icon--flashlight', 'text' => 'flashlight'],
					['value' => 'icon--printer', 'text' => 'printer'],
					['value' => 'icon--link', 'text' => 'link'],
					['value' => 'icon--cog', 'text' => 'cog'],
					['value' => 'icon--tools', 'text' => 'tools'],
					['value' => 'icon--tag', 'text' => 'tag'],
					['value' => 'icon--camera', 'text' => 'camera'],
					['value' => 'icon--music2', 'text' => 'music2'],
					['value' => 'icon--graduation', 'text' => 'graduation'],
					['value' => 'icon--airplane', 'text' => 'airplane'],
					['value' => 'icon--calendar', 'text' => 'calendar'],
					['value' => 'icon--clock2', 'text' => 'clock2'],
					['value' => 'icon--key', 'text' => 'key'],
					['value' => 'icon--sun2', 'text' => 'sun2'],
					['value' => 'icon--adjust', 'text' => 'adjust'],
					['value' => 'icon--code', 'text' => 'code'],
					['value' => 'icon--rss', 'text' => 'rss'],
					['value' => 'icon--signal', 'text' => 'signal'],
					['value' => 'icon--pie', 'text' => 'pie'],
					['value' => 'icon--bars', 'text' => 'bars'],
					['value' => 'icon--graph', 'text' => 'graph'],
					['value' => 'icon--login', 'text' => 'login'],
					['value' => 'icon--question', 'text' => 'question'],
					['value' => 'icon--info', 'text' => 'info'],
					['value' => 'icon--info2', 'text' => 'info2'],
					['value' => 'icon--blocked', 'text' => 'blocked'],
					['value' => 'icon--help', 'text' => 'help'],
					['value' => 'icon--list2', 'text' => 'list2'],
					['value' => 'icon--pictures', 'text' => 'pictures'],
					['value' => 'icon--video', 'text' => 'video'],
					['value' => 'icon--upload', 'text' => 'upload'],
					['value' => 'icon--bookmark', 'text' => 'bookmark'],
					['value' => 'icon--install', 'text' => 'install'],
					['value' => 'icon--download', 'text' => 'download'],
					['value' => 'icon--book2', 'text' => 'book2'],
					['value' => 'icon--play', 'text' => 'play'],
					['value' => 'icon--pause', 'text' => 'pause'],
					['value' => 'icon--record', 'text' => 'record'],
					['value' => 'icon--stop', 'text' => 'stop'],
					['value' => 'icon--next', 'text' => 'next'],
					['value' => 'icon--previous', 'text' => 'previous'],
					['value' => 'icon--first', 'text' => 'first'],
					['value' => 'icon--last', 'text' => 'last'],
					['value' => 'icon--flow-tree', 'text' => 'flow-tree'],
					['value' => 'icon--flickr', 'text' => 'flickr'],
					['value' => 'icon--flickr2', 'text' => 'flickr2'],
					['value' => 'icon--vimeo', 'text' => 'vimeo'],
					['value' => 'icon--vimeo2', 'text' => 'vimeo2'],
					['value' => 'icon--twitter', 'text' => 'twitter'],
					['value' => 'icon--twitter2', 'text' => 'twitter2'],
					['value' => 'icon--facebook', 'text' => 'facebook'],
					['value' => 'icon--facebook2', 'text' => 'facebook2'],
					['value' => 'icon--facebook3', 'text' => 'facebook3'],
					['value' => 'icon--googleplus', 'text' => 'googleplus'],
					['value' => 'icon--googleplus2', 'text' => 'googleplus2'],
					['value' => 'icon--pinterest', 'text' => 'pinterest'],
					['value' => 'icon--pinterest2', 'text' => 'pinterest2'],
					['value' => 'icon--tumblr', 'text' => 'tumblr'],
					['value' => 'icon--tumblr2', 'text' => 'tumblr2'],
					['value' => 'icon--linkedin', 'text' => 'linkedin'],
					['value' => 'icon--linkedin2', 'text' => 'linkedin2'],
					['value' => 'icon--spotify', 'text' => 'spotify'],
					['value' => 'icon--spotify2', 'text' => 'spotify2'],
					['value' => 'icon--instagram', 'text' => 'instagram'],
					['value' => 'icon--dropbox', 'text' => 'dropbox'],
					['value' => 'icon--evernote', 'text' => 'evernote'],
					['value' => 'icon--skype', 'text' => 'skype'],
					['value' => 'icon--skype2', 'text' => 'skype2'],
					['value' => 'icon--flattr', 'text' => 'flattr'],
					['value' => 'icon--renren', 'text' => 'renren'],
					['value' => 'icon--paypal', 'text' => 'paypal'],
					['value' => 'icon--soundcloud', 'text' => 'soundcloud'],
					['value' => 'icon--mixi', 'text' => 'mixi'],
					['value' => 'icon--behance', 'text' => 'behance'],
					['value' => 'icon--circles', 'text' => 'circles'],
					['value' => 'icon--feed', 'text' => 'feed'],
					['value' => 'icon--feed2', 'text' => 'feed2'],
					['value' => 'icon--smashing', 'text' => 'smashing'],
				],
				$this->getLabelAttribute(
					'Das Icon wird über der "Box Headline" angezeigt',
					'helpText'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetGeneralFooterWidget()
	{
		$fieldSet = $this->createFieldSet(
			'mars_general_footer_widget',
			'Footer Info Widget',
			[
				'attributes' => [
					'layout' => 'anchor',
					'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
				]
			]
		);

		$fieldSet->addElement(
			$this->createTextField(
				'cbax_footer_widget_note',
				'',
				'',
				[
					'attributes' => [
						'xtype' => 'container',
						'html' => 'Im unteren Bildschirmrand kann eine Box mit z. B. Ihrer Service Hotline angeheftet werden. Die Box bleibt beim Scrollen immer an der gleichen Stelle. ',
						'style' => 'padding: 0px 0px 20px 0px;'
					]
				]
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_footer_widget_active',
				'Widget aktiv',
				false,
				$this->getLabelAttribute(
					'Wenn aktiv, dann wird das Widget am unteren Rand des Bildschirms angezeigt'
				)
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_footer_widget_active_smartphone',
				'Auch auf Smartphone anzeigen',
				false,
				$this->getLabelAttribute(
					'Wenn aktiv, dann wird das Widget auch auf dem Smartphone angezeigt'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_footer_widget_display',
				'Anzeigen auf',
				array('index', 'listing', 'search', 'detail', 'custom', 'campaign', 'forms', 'note', 'newsletter', 'blog'),
				[
					['value' => 'index', 'text' => 'Startseite'],
					['value' => 'listing', 'text' => 'Listing'],
					['value' => 'search', 'text' => 'Suche'],
					['value' => 'detail', 'text' => 'Artikel'],
					['value' => 'custom', 'text' => 'Shopseiten'],
					['value' => 'campaign', 'text' => 'Landingpages'],
					['value' => 'forms', 'text' => 'Formulare'],
					['value' => 'note', 'text' => 'Merkzettel'],
					['value' => 'newsletter', 'text' => 'Newsletter'],
					['value' => 'blog', 'text' => 'Blog'],
					['value' => 'checkout', 'text' => 'Checkout']
				],
				['attributes' => ['multiSelect' => true, 'editable' => false, 'helpText' => 'Auf welchen Seiten soll der Text angezeigt werden (Mehrfachauswahl möglich)']]
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_footer_widget_position',
				'Position',
				'right',
				[
					['value' => 'left', 'text' => 'Linker unterer Bildschirmrand'],
					['value' => 'right', 'text' => 'Rechter unterer Bildschirmrand']
				],
				$this->getLabelAttribute(
					'Wählen Sie die Position der Box',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createNumberField(
				'mars-footer-widget-distance',
				'Abstand zum Rand (in Prozent)',
				'10',
				$this->getLabelAttribute(
					'Wie groß soll der Abstand zum rechten bzw. linken Bildschirmrand sein (Angabe in Prozent)',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createTextField(
				'cbax_footer_widget_headline',
				'Headline',
				'Service & Beratung'
			)
		);
		$fieldSet->addElement(
			$this->createTextField(
				'cbax_footer_widget_text',
				'Text',
				'0180 - 000000'
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-footer-widget-bg',
				'Hintergrundfarbe',
				'#000000'
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'mars-footer-widget-opacity',
				'Deckkraft',
				'0.7',
				[
					['value' => '1', 'text' => '100%'],
					['value' => '0.9', 'text' => '90%'],
					['value' => '0.8', 'text' => '80%'],
					['value' => '0.7', 'text' => '70%'],
					['value' => '0.6', 'text' => '60%'],
					['value' => '0.5', 'text' => '50%']
				]
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-footer-widget-color',
				'Schriftfarbe',
				'#ffffff'
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_footer_widget_icon',
				'Icon',
				'icon--mail',
				[
					['value' => 'icon--house', 'text' => 'house'],
					['value' => 'icon--mail', 'text' => 'mail'],
					['value' => 'icon--phone', 'text' => 'phone'],
					['value' => 'icon--mobile', 'text' => 'mobile'],
					['value' => 'icon--clock', 'text' => 'clock'],
					['value' => 'icon--star', 'text' => 'star'],
					['value' => 'icon--star-half', 'text' => 'star-half'],
					['value' => 'icon--star-empty', 'text' => 'star-empty'],
					['value' => 'icon--service', 'text' => 'service'],
					['value' => 'icon--check', 'text' => 'check'],
					['value' => 'icon--account', 'text' => 'account'],
				],
				$this->getLabelAttribute(
					'Wird vor der Headline und dem Text angezeigt',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createTextField(
				'cbax_footer_widget_link',
				'Link für Icon',
				'',
				['attributes' => ['lessCompatible' => false, 'helpText' => 'Wird hier eine URL eingetragen, ist das Icon mit dieser Seite verlinkt']]
			)
		);

		return $fieldSet;
	}

	private function createFieldSetGeneralVerification()
	{
		$fieldSet = $this->createFieldSet(
			'mars_general_verification',
			'Webmaster-Tools HTML-Tag Code',
			[
				'attributes' => [
					'layout' => 'anchor',
					'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
				]
			]
		);

		$fieldSet->addElement(
			$this->createTextField(
				'cbax_verification_google',
				'Verification Key Google',
				'',
				$this->getLabelAttribute(
					'Google Webmaster-Tools HTML-Tag Code',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createTextField(
				'cbax_verification_bing',
				'Verification Key Bing',
				'',
				$this->getLabelAttribute(
					'Bing Webmaster-Tools HTML-Tag Code',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createTextField(
				'cbax_verification_alexa',
				'Verification Key Alexa',
				'',
				$this->getLabelAttribute(
					'Alexa Webmaster-Tools HTML-Tag Code',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createTextField(
				'cbax_verification_pinterest',
				'Verification Key Pinterest',
				'',
				$this->getLabelAttribute(
					'Pinterest Webmaster-Tools HTML-Tag Code',
					'helpText'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetGeneralPrivacy()
	{
		$fieldSet = $this->createFieldSet(
			'mars_general_privacy',
			'DSGVO Datenschutz Erweiterungen',
			[
				'attributes' => [
					'layout' => 'anchor',
					'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
				]
			]
		);

		$fieldSet->addElement(
			$this->createTextField(
				'cbax_privacy_note',
				'',
				'',
				[
					'attributes' => [
						'xtype' => 'container',
						'html' => 'An allen Stellen die personenbezogene Daten verarbeiten, sollten Sie einen Hinweis auf die Datenschutzbestimmungen platzieren - DSGVO. Übersetzungen und Anpassungen des Textes können über den Textbaustein "PrivacyEnhancement" vorgenommen werden.',
						'style' => 'padding: 0px 0px 20px 0px;'
					]
				]
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_privacy_forms',
				'Formulare',
				'',
				[
					['value' => '', 'text' => 'Hinweis nicht anzeigen'],
					['value' => 'withCheckbox', 'text' => 'Hinweis mit Checkbox anzeigen'],
					['value' => 'withoutCheckbox', 'text' => 'Hinweis ohne Checkbox anzeigen']

				],
				$this->getLabelAttribute(
					'Hinweis in den Formularen anzeigen',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_privacy_register',
				'Registrierung',
				'',
				[
					['value' => '', 'text' => 'Hinweis nicht anzeigen'],
					['value' => 'withCheckbox', 'text' => 'Hinweis mit Checkbox anzeigen'],
					['value' => 'withoutCheckbox', 'text' => 'Hinweis ohne Checkbox anzeigen']

				],
				$this->getLabelAttribute(
					'Hinweis in der Registrierung anzeigen',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_privacy_newsletter',
				'Newsletter',
				'',
				[
					['value' => '', 'text' => 'Hinweis nicht anzeigen'],
					['value' => 'withCheckbox', 'text' => 'Hinweis mit Checkbox anzeigen'],
					['value' => 'withoutCheckbox', 'text' => 'Hinweis ohne Checkbox anzeigen']

				],
				$this->getLabelAttribute(
					'Hinweis in dem Newsletter anzeigen',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_privacy_newsletter_fotter',
				'Newsletter Footer',
				'',
				[
					['value' => '', 'text' => 'Hinweis nicht anzeigen'],
					['value' => 'withCheckbox', 'text' => 'Hinweis mit Checkbox anzeigen'],
					['value' => 'withoutCheckbox', 'text' => 'Hinweis ohne Checkbox anzeigen']

				],
				$this->getLabelAttribute(
					'Hinweis in dem Newsletter im Footer anzeigen',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_privacy_blog',
				'Blog Kommentare',
				'',
				[
					['value' => '', 'text' => 'Hinweis nicht anzeigen'],
					['value' => 'withCheckbox', 'text' => 'Hinweis mit Checkbox anzeigen'],
					['value' => 'withoutCheckbox', 'text' => 'Hinweis ohne Checkbox anzeigen']

				],
				$this->getLabelAttribute(
					'Hinweis in den Blog Kommentare anzeigen',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_privacy_article_vote',
				'Artikel Bewertungen',
				'',
				[
					['value' => '', 'text' => 'Hinweis nicht anzeigen'],
					['value' => 'withCheckbox', 'text' => 'Hinweis mit Checkbox anzeigen'],
					['value' => 'withoutCheckbox', 'text' => 'Hinweis ohne Checkbox anzeigen']

				],
				$this->getLabelAttribute(
					'Hinweis in den Artikel Bewertungen anzeigen',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_privacy_article_notification',
				'Artikel Benachrichtigungen',
				'',
				[
					['value' => '', 'text' => 'Hinweis nicht anzeigen'],
					['value' => 'withCheckbox', 'text' => 'Hinweis mit Checkbox anzeigen'],
					['value' => 'withoutCheckbox', 'text' => 'Hinweis ohne Checkbox anzeigen']

				],
				$this->getLabelAttribute(
					'Hinweis in den Artikel Benachrichtigungen anzeigen',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_privacy_article_recommendation',
				'Artikel Empfehlungen',
				'',
				[
					['value' => '', 'text' => 'Hinweis nicht anzeigen'],
					['value' => 'withCheckbox', 'text' => 'Hinweis mit Checkbox anzeigen'],
					['value' => 'withoutCheckbox', 'text' => 'Hinweis ohne Checkbox anzeigen']

				],
				$this->getLabelAttribute(
					'Hinweis in den Artikel Empfehlungen anzeigen',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_privacy_modal_show',
				'Link im modalen Fenster',
				true,
				$this->getLabelAttribute(
					'Wenn aktiv, dann wird der Link in einem modalen Fenster angezeigt'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetColorBackground()
	{
		$fieldSet = $this->createFieldSet(
			'mars_color_background',
			'Hintergrund',
			[
				'attributes' => [
					'layout' => 'anchor',
					'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
				]
			]
		);

		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-background-bg',
				'Hintergrundfarbe',
				'#f5f5f5'
			)
		);
		$fieldSet->addElement(
			$this->createMediaField(
				'mars_background_image',
				'Hintergrundbild',
				'',
				['attributes' => ['lessCompatible' => false]]
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'mars-background-position',
				'Position',
				'center top',
				[
					['value' => 'left top', 'text' => 'links oben'],
					['value' => 'left center', 'text' => 'links mitte'],
					['value' => 'left bottom', 'text' => 'links unten'],
					['value' => 'center top', 'text' => 'mitte oben'],
					['value' => 'center center', 'text' => 'mitte mitte'],
					['value' => 'center bottom', 'text' => 'mitte unten'],
					['value' => 'right top', 'text' => 'right oben'],
					['value' => 'right center', 'text' => 'right mitte'],
					['value' => 'right bottom', 'text' => 'right unten']

				],
				$this->getLabelAttribute(
					'Legen Sie hier die Position des Hintergrundbildes fest',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'mars-background-repeat',
				'Wiederholung',
				'no-repeat',
				[
					['value' => 'no-repeat', 'text' => 'Keine Wiederholung'],
					['value' => 'repeat', 'text' => 'Horizontal und Vertikal'],
					['value' => 'repeat-x', 'text' => 'Horizontal'],
					['value' => 'repeat-y', 'text' => 'Vertikal']
				],
				$this->getLabelAttribute(
					'Legt fest, ob ein Hintergrundbild über die gesamte Breite oder/und Höhe eines Elements wiederholt wird.',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'mars-background-attachment',
				'Fixieren',
				'fixed',
				[
					['value' => 'fixed', 'text' => 'Fixieren'],
					['value' => 'scroll', 'text' => 'Scrollen']
				],
				$this->getLabelAttribute(
					'Soll das Hintergrundbild fixiert werden oder mitscrollen?',
					'helpText'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetColorTopBar()
	{
		$attributes = array_merge($this->fieldSetDefaults, ['height' => 90]);
		$fieldSet = $this->createFieldSet(
			'mars_color_top_bar',
			'Top Bar',
			['attributes' => $attributes]
		);

		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-top-bar-bg',
				'Hintergrundfarbe',
				'#292a29',
				$this->getLabelAttribute(
					'Variable: @mars-top-bar-bg',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-top-bar-color',
				'Schriftfarbe',
				'#cfcfcf',
				$this->getLabelAttribute(
					'Variable: @mars-top-bar-color',
					'helpText'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetColorHeader()
	{
		$attributes = array_merge($this->fieldSetDefaults, ['height' => 90]);
		$fieldSet = $this->createFieldSet(
			'mars_color_header',
			'Header',
			['attributes' => $attributes]
		);

		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-header-bg',
				'Hintergrundfarbe',
				'#ffffff',
				$this->getLabelAttribute(
					'Variable: @mars-header-bg',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-header-color',
				'Schriftfarbe',
				'#616161',
				$this->getLabelAttribute(
					'Variable: @mars-header-color',
					'helpText'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetColorMainNavigation()
	{
		$attributes = array_merge($this->fieldSetDefaults, ['height' => 160]);
		$fieldSet = $this->createFieldSet(
			'mars_color_main_navigation',
			'Main Navigation',
			['attributes' => $attributes]
		);

		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-navigation-bg',
				'Hintergrundfarbe',
				'#ffffff',
				$this->getLabelAttribute(
					'Variable: @mars-navigation-bg',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-navigation-color',
				'Schriftfarbe',
				'#666666',
				$this->getLabelAttribute(
					'Variable: @mars-navigation-color',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-navigation-hover-bg',
				'Hintergrundfarbe hover',
				'#ffffff',
				$this->getLabelAttribute(
					'Variable: @mars-navigation-hover-bg',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-navigation-hover-color',
				'Schriftfarbe hover',
				'#3a353e',
				$this->getLabelAttribute(
					'Variable: @mars-navigation-hover-color',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-navigation-active-bg',
				'Hintergrundfarbe aktiv',
				'@brand-primary',
				$this->getLabelAttribute(
					'Variable: @mars-navigation-active-bg',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-navigation-active-color',
				'Schriftfarbe aktiv',
				'#ffffff',
				$this->getLabelAttribute(
					'Variable: @mars-navigation-active-color',
					'helpText'
				)
			)
		);

		return $fieldSet;
	}
	
	private function createFieldSetColorStickyNavigation()
    {
        $attributes = array_merge($this->fieldSetDefaults, ['height' => 90]);
        $fieldSet = $this->createFieldSet(
            'mars_color_sticky_navigation',
			'Sticky Navigation',
            ['attributes' => $attributes]
        );

        $fieldSet->addElement(
            $this->createColorPickerField(
                'mars-sticky-navigation-bg',
                'Hintergrundfarbe',
                'linear-gradient(to bottom,#fff 0%,#f8f8fa 100%)',
				$this->getLabelAttribute(
                    'Variable: @mars-sticky-navigation-bg',
                    'helpText'
                )
            )
        );
		$fieldSet->addElement(
            $this->createColorPickerField(
                'mars-sticky-navigation-color',
                'Schriftfarbe',
                '#5c5c5c',
				$this->getLabelAttribute(
                    'Variable: @mars-sticky-navigation-color',
                    'helpText'
                )
            )
        );

        return $fieldSet;
    }
	
	private function createFieldSetColorSidebarNavigation()
	{
		$attributes = array_merge($this->fieldSetDefaults, ['height' => 125]);
		$fieldSet = $this->createFieldSet(
			'mars_color_sidebar_navigation',
			'Sidebar Navigation',
			['attributes' => $attributes]
		);

		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-sidebar-navigation-bg',
				'Hintergrundfarbe',
				'#ffffff',
				$this->getLabelAttribute(
					'Variable: @mars-sidebar-navigation-bg',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-sidebar-navigation-color',
				'Schriftfarbe',
				'#616161',
				$this->getLabelAttribute(
					'Variable: @mars-sidebar-navigation-color',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-sidebar-navigation-hover-color',
				'Schriftfarbe hover',
				'@brand-primary',
				$this->getLabelAttribute(
					'Variable: @mars-sidebar-navigation-hover-color',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-sidebar-navigation-active-color',
				'Schriftfarbe aktiv',
				'@brand-primary',
				$this->getLabelAttribute(
					'Variable: @mars-sidebar-navigation-active-color',
					'helpText'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetColorFilter()
	{
		$attributes = array_merge($this->fieldSetDefaults, ['height' => 90]);
		$fieldSet = $this->createFieldSet(
			'mars_color_filter',
			'Filter und Sortierung',
			['attributes' => $attributes]
		);

		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-filter-bg',
				'Hintergrundfarbe',
				'#ffffff',
				$this->getLabelAttribute(
					'Variable: @mars-filter-bg',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-filter-color',
				'Schriftfarbe',
				'#616161',
				$this->getLabelAttribute(
					'Variable: @mars-filter-color',
					'helpText'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetColorTabs()
	{
		$attributes = array_merge($this->fieldSetDefaults, ['height' => 160]);
		$fieldSet = $this->createFieldSet(
			'mars_color_tabs',
			'Tabs',
			['attributes' => $attributes]
		);

		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-tabs-bg',
				'Hintergrundfarbe',
				'transparent',
				$this->getLabelAttribute(
					'Variable: @mars-tabs-bg',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-tabs-color',
				'Schriftfarbe',
				'#616161',
				$this->getLabelAttribute(
					'Variable: @mars-tabs-color',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-tabs-hover-bg',
				'Hintergrundfarbe hover',
				'#ffffff',
				$this->getLabelAttribute(
					'Variable: @mars-tabs-hover-bg',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-tabs-hover-color',
				'Schriftfarbe hover',
				'@brand-primary',
				$this->getLabelAttribute(
					'Variable: @mars-tabs-hover-color',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-tabs-active-bg',
				'Hintergrundfarbe aktiv',
				'#ffffff',
				$this->getLabelAttribute(
					'Variable: @mars-tabs-active-bg',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-tabs-active-color',
				'Schriftfarbe aktiv',
				'#616161',
				$this->getLabelAttribute(
					'Variable: @mars-tabs-active-color',
					'helpText'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetColorButton()
	{
		$attributes = array_merge($this->fieldSetDefaults, ['height' => 125]);
		$fieldSet = $this->createFieldSet(
			'mars_color_button',
			'Primary Button',
			['attributes' => $attributes]
		);

		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-btn-primary-top-bg',
				'Hintergrundfarbe oben',
				'@brand-primary',
				$this->getLabelAttribute(
					'Variable: @mars-btn-primary-top-bg',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-btn-primary-bottom-bg',
				'Hintergrundfarbe unten',
				'darken(@mars-btn-primary-top-bg, 10%)',
				$this->getLabelAttribute(
					'Variable: @mars-btn-primary-bottom-bg',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-btn-primary-hover-bg',
				'Hintergrundfarbe hover',
				'@mars-btn-primary-bottom-bg',
				$this->getLabelAttribute(
					'Variable: @mars-btn-primary-hover-bg',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-btn-primary-text-color',
				'Schriftfarbe',
				'#ffffff',
				$this->getLabelAttribute(
					'Variable: @mars-btn-primary-text-color',
					'helpText'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetColorBadge()
	{
		$attributes = array_merge($this->fieldSetDefaults, ['height' => 125]);
		$fieldSet = $this->createFieldSet(
			'mars_color_badge',
			'Badges & Hinweise',
			['attributes' => $attributes]
		);

		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-badge-shipping-bg',
				'Versand Hintergrundfarbe',
				'#663300',
				$this->getLabelAttribute(
					'Variable: @mars-badge-shipping-bg',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-badge-shipping-color',
				'Versand Schriftfarbe',
				'#ffffff',
				$this->getLabelAttribute(
					'Variable: @mars-badge-shipping-color',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-price-discount-color',
				'Preis Discount Schriftfarbe',
				'#990000',
				$this->getLabelAttribute(
					'Variable: @mars-price-discount-color',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_pseudoprice',
				'Badge Discount Anzeige',
				'percent',
				[
					['value' => 'percent', 'text' => 'Prozentuale Ersparnis anzeigen'],
					['value' => 'absolute', 'text' => 'Absolute Ersparnis anzeigen'],
					['value' => 'false', 'text' => 'Shopware Standard']
				]
			)
		);

		return $fieldSet;
	}

	private function createFieldSetColorCheckout()
	{
		$attributes = array_merge($this->fieldSetDefaults, ['height' => 160]);
		$fieldSet = $this->createFieldSet(
			'mars_color_checkout',
			'Checkout',
			['attributes' => $attributes]
		);

		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-step-container-bg',
				'Step Hintergrundfarbe',
				'#fdfdff',
				$this->getLabelAttribute(
					'Variable: @mars-step-container-bg',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-step-container-color',
				'Step Schriftfarbe',
				'#616161',
				$this->getLabelAttribute(
					'Variable: @mars-step-container-color',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-step-icon-bg',
				'Step Icon Hintergrundfarbe',
				'#616161',
				$this->getLabelAttribute(
					'Variable: @mars-step-icon-bg',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-step-icon-color',
				'Step Icon Schriftfarbe',
				'#ffffff',
				$this->getLabelAttribute(
					'Variable: @mars-step-icon-color',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-basket-footer-bg',
				'Basket Footer Hintergrundfarbe',
				'#eeeeee',
				$this->getLabelAttribute(
					'Variable: @mars-basket-footer-bg',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-basket-footer-color',
				'Basket Footer Schriftfarbe',
				'#616161',
				$this->getLabelAttribute(
					'Variable: @mars-basket-footer-color',
					'helpText'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetColorFooter()
	{
		$attributes = array_merge($this->fieldSetDefaults, ['height' => 195]);
		$fieldSet = $this->createFieldSet(
			'mars_color_footer',
			'Footer',
			['attributes' => $attributes]
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-footer-info-bg',
				'Icons Hintergrundfarbe',
				'#292a29',
				$this->getLabelAttribute(
					'Variable: @mars-footer-info-bg',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-footer-info-color',
				'Icons Schriftfarbe',
				'#616161',
				$this->getLabelAttribute(
					'Variable: @mars-footer-info-color',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-footer-main-bg',
				'Inhalt Hintergrundfarbe',
				'#ffffff',
				$this->getLabelAttribute(
					'Variable: @mars-footer-main-bg',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-footer-main-color',
				'Inhalt Schriftfarbe',
				'#616161',
				$this->getLabelAttribute(
					'Variable: @mars-footer-main-color',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-footer-bottom-bg',
				'Hinweise Hintergrundfarbe',
				'darken(@mars-background-bg, 3%)',
				$this->getLabelAttribute(
					'Variable: @mars-footer-bottom-bg',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-footer-bottom-color',
				'Hinweise Schriftfarbe',
				'#616161',
				$this->getLabelAttribute(
					'Variable: @mars-footer-bottom-color',
					'helpText'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetHeaderTopBar()
	{
		$fieldSet = $this->createFieldSet(
			'mars_header_top_bar',
			'Top Bar',
			[
				'attributes' => [
					'layout' => 'anchor',
					'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
				]
			]
		);

		$fieldSet->addElement(
			$this->createTextField(
				'cbax_top_bar_note',
				'',
				'',
				[
					'attributes' => [
						'xtype' => 'container',
						'html' => 'Zeigen Sie, über Ihrem Header oder Footer, Ihre drei wichtigsten Vorteile prominent an. Über die Textbausteine: "description1", "description2" und "description3" können Sie die Vorteile jederzeit anpassen.',
						'style' => 'padding: 0px 0px 20px 0px;'
					]
				]
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_top_bar_active',
				'Top Bar aktiv',
				true,
				$this->getLabelAttribute(
					'Wenn aktiv, dann wird die Top Bar angezeigt'
				)
			)
		);
		$fieldSet->addElement(
			$this->createNumberField(
				'mars-top-bar-height',
				'Höhe',
				'25',
				$this->getLabelAttribute(
					'Die Höhe der Top Bar',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createNumberField(
				'mars-top-bar-font-size',
				'Schriftgröße',
				'14',
				$this->getLabelAttribute(
					'Die Höhe des Logo auf dem Smartphone in Pixel. Die Breite wird automatisch gesetzt',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_icon_top_bar1',
				'Icon 1',
				'icon--check',
				[
					['value' => 0, 'text' => 'Nein'],
					['value' => 'icon--percent2', 'text' => 'percent2'],
					['value' => 'icon--percent', 'text' => 'percent'],
					['value' => 'icon--coupon', 'text' => 'coupon'],
					['value' => 'icon--truck', 'text' => 'truck'],
					['value' => 'icon--logout', 'text' => 'logout'],
					['value' => 'icon--grid', 'text' => 'grid'],
					['value' => 'icon--filter', 'text' => 'filter'],
					['value' => 'icon--clock', 'text' => 'clock'],
					['value' => 'icon--arrow-up', 'text' => 'arrow-up'],
					['value' => 'icon--arrow-right', 'text' => 'arrow-right'],
					['value' => 'icon--arrow-left', 'text' => 'arrow-left'],
					['value' => 'icon--arrow-down', 'text' => 'arrow-down'],
					['value' => 'icon--star', 'text' => 'star'],
					['value' => 'icon--star-half', 'text' => 'star-half'],
					['value' => 'icon--star-empty', 'text' => 'star-empty'],
					['value' => 'icon--shopware', 'text' => 'shopware'],
					['value' => 'icon--service', 'text' => 'service'],
					['value' => 'icon--search', 'text' => 'search'],
					['value' => 'icon--numbered', 'text' => 'numbered'],
					['value' => 'icon--menu', 'text' => 'menu'],
					['value' => 'icon--mail', 'text' => 'mail'],
					['value' => 'icon--list', 'text' => 'list'],
					['value' => 'icon--layout', 'text' => 'layout'],
					['value' => 'icon--heart', 'text' => 'heart'],
					['value' => 'icon--cross', 'text' => 'cross'],
					['value' => 'icon--compare', 'text' => 'compare'],
					['value' => 'icon--check', 'text' => 'check'],
					['value' => 'icon--basket', 'text' => 'basket'],
					['value' => 'icon--account', 'text' => 'account'],
					['value' => 'icon--chain', 'text' => 'chain'],
					['value' => 'icon--delicious', 'text' => 'delicious'],
					['value' => 'icon--delicious2', 'text' => 'delicious2'],
					['value' => 'icon--digg', 'text' => 'digg'],
					['value' => 'icon--phone', 'text' => 'phone'],
					['value' => 'icon--mobile', 'text' => 'mobile'],
					['value' => 'icon--mouse', 'text' => 'mouse'],
					['value' => 'icon--directions', 'text' => 'directions'],
					['value' => 'icon--paperplane', 'text' => 'paperplane'],
					['value' => 'icon--pencil', 'text' => 'pencil'],
					['value' => 'icon--paperclip', 'text' => 'paperclip'],
					['value' => 'icon--drawer', 'text' => 'drawer'],
					['value' => 'icon--user-add', 'text' => 'user-add'],
					['value' => 'icon--users', 'text' => 'users'],
					['value' => 'icon--vcard', 'text' => 'vcard'],
					['value' => 'icon--export', 'text' => 'export'],
					['value' => 'icon--location', 'text' => 'location'],
					['value' => 'icon--map', 'text' => 'map'],
					['value' => 'icon--share', 'text' => 'share'],
					['value' => 'icon--house', 'text' => 'house'],
					['value' => 'icon--flashlight', 'text' => 'flashlight'],
					['value' => 'icon--printer', 'text' => 'printer'],
					['value' => 'icon--link', 'text' => 'link'],
					['value' => 'icon--cog', 'text' => 'cog'],
					['value' => 'icon--tools', 'text' => 'tools'],
					['value' => 'icon--tag', 'text' => 'tag'],
					['value' => 'icon--camera', 'text' => 'camera'],
					['value' => 'icon--music2', 'text' => 'music2'],
					['value' => 'icon--graduation', 'text' => 'graduation'],
					['value' => 'icon--airplane', 'text' => 'airplane'],
					['value' => 'icon--calendar', 'text' => 'calendar'],
					['value' => 'icon--clock2', 'text' => 'clock2'],
					['value' => 'icon--key', 'text' => 'key'],
					['value' => 'icon--sun2', 'text' => 'sun2'],
					['value' => 'icon--adjust', 'text' => 'adjust'],
					['value' => 'icon--code', 'text' => 'code'],
					['value' => 'icon--rss', 'text' => 'rss'],
					['value' => 'icon--signal', 'text' => 'signal'],
					['value' => 'icon--pie', 'text' => 'pie'],
					['value' => 'icon--bars', 'text' => 'bars'],
					['value' => 'icon--graph', 'text' => 'graph'],
					['value' => 'icon--login', 'text' => 'login'],
					['value' => 'icon--question', 'text' => 'question'],
					['value' => 'icon--info', 'text' => 'info'],
					['value' => 'icon--info2', 'text' => 'info2'],
					['value' => 'icon--blocked', 'text' => 'blocked'],
					['value' => 'icon--help', 'text' => 'help'],
					['value' => 'icon--list2', 'text' => 'list2'],
					['value' => 'icon--pictures', 'text' => 'pictures'],
					['value' => 'icon--video', 'text' => 'video'],
					['value' => 'icon--upload', 'text' => 'upload'],
					['value' => 'icon--bookmark', 'text' => 'bookmark'],
					['value' => 'icon--install', 'text' => 'install'],
					['value' => 'icon--download', 'text' => 'download'],
					['value' => 'icon--book2', 'text' => 'book2'],
					['value' => 'icon--play', 'text' => 'play'],
					['value' => 'icon--pause', 'text' => 'pause'],
					['value' => 'icon--record', 'text' => 'record'],
					['value' => 'icon--stop', 'text' => 'stop'],
					['value' => 'icon--next', 'text' => 'next'],
					['value' => 'icon--previous', 'text' => 'previous'],
					['value' => 'icon--first', 'text' => 'first'],
					['value' => 'icon--last', 'text' => 'last'],
					['value' => 'icon--flow-tree', 'text' => 'flow-tree'],
					['value' => 'icon--flickr', 'text' => 'flickr'],
					['value' => 'icon--flickr2', 'text' => 'flickr2'],
					['value' => 'icon--vimeo', 'text' => 'vimeo'],
					['value' => 'icon--vimeo2', 'text' => 'vimeo2'],
					['value' => 'icon--twitter', 'text' => 'twitter'],
					['value' => 'icon--twitter2', 'text' => 'twitter2'],
					['value' => 'icon--facebook', 'text' => 'facebook'],
					['value' => 'icon--facebook2', 'text' => 'facebook2'],
					['value' => 'icon--facebook3', 'text' => 'facebook3'],
					['value' => 'icon--googleplus', 'text' => 'googleplus'],
					['value' => 'icon--googleplus2', 'text' => 'googleplus2'],
					['value' => 'icon--pinterest', 'text' => 'pinterest'],
					['value' => 'icon--pinterest2', 'text' => 'pinterest2'],
					['value' => 'icon--tumblr', 'text' => 'tumblr'],
					['value' => 'icon--tumblr2', 'text' => 'tumblr2'],
					['value' => 'icon--linkedin', 'text' => 'linkedin'],
					['value' => 'icon--linkedin2', 'text' => 'linkedin2'],
					['value' => 'icon--spotify', 'text' => 'spotify'],
					['value' => 'icon--spotify2', 'text' => 'spotify2'],
					['value' => 'icon--instagram', 'text' => 'instagram'],
					['value' => 'icon--dropbox', 'text' => 'dropbox'],
					['value' => 'icon--evernote', 'text' => 'evernote'],
					['value' => 'icon--skype', 'text' => 'skype'],
					['value' => 'icon--skype2', 'text' => 'skype2'],
					['value' => 'icon--flattr', 'text' => 'flattr'],
					['value' => 'icon--renren', 'text' => 'renren'],
					['value' => 'icon--paypal', 'text' => 'paypal'],
					['value' => 'icon--soundcloud', 'text' => 'soundcloud'],
					['value' => 'icon--mixi', 'text' => 'mixi'],
					['value' => 'icon--behance', 'text' => 'behance'],
					['value' => 'icon--circles', 'text' => 'circles'],
					['value' => 'icon--feed', 'text' => 'feed'],
					['value' => 'icon--feed2', 'text' => 'feed2'],
					['value' => 'icon--smashing', 'text' => 'smashing'],
				],
				$this->getLabelAttribute(
					'Wählen Sie ein Icon, welches vor dem Text angezeigt ',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_icon_top_bar2',
				'Icon 2',
				'icon--check',
				[
					['value' => 0, 'text' => 'Nein'],
					['value' => 'icon--percent2', 'text' => 'percent2'],
					['value' => 'icon--percent', 'text' => 'percent'],
					['value' => 'icon--coupon', 'text' => 'coupon'],
					['value' => 'icon--truck', 'text' => 'truck'],
					['value' => 'icon--logout', 'text' => 'logout'],
					['value' => 'icon--grid', 'text' => 'grid'],
					['value' => 'icon--filter', 'text' => 'filter'],
					['value' => 'icon--clock', 'text' => 'clock'],
					['value' => 'icon--arrow-up', 'text' => 'arrow-up'],
					['value' => 'icon--arrow-right', 'text' => 'arrow-right'],
					['value' => 'icon--arrow-left', 'text' => 'arrow-left'],
					['value' => 'icon--arrow-down', 'text' => 'arrow-down'],
					['value' => 'icon--star', 'text' => 'star'],
					['value' => 'icon--star-half', 'text' => 'star-half'],
					['value' => 'icon--star-empty', 'text' => 'star-empty'],
					['value' => 'icon--shopware', 'text' => 'shopware'],
					['value' => 'icon--service', 'text' => 'service'],
					['value' => 'icon--search', 'text' => 'search'],
					['value' => 'icon--numbered', 'text' => 'numbered'],
					['value' => 'icon--menu', 'text' => 'menu'],
					['value' => 'icon--mail', 'text' => 'mail'],
					['value' => 'icon--list', 'text' => 'list'],
					['value' => 'icon--layout', 'text' => 'layout'],
					['value' => 'icon--heart', 'text' => 'heart'],
					['value' => 'icon--cross', 'text' => 'cross'],
					['value' => 'icon--compare', 'text' => 'compare'],
					['value' => 'icon--check', 'text' => 'check'],
					['value' => 'icon--basket', 'text' => 'basket'],
					['value' => 'icon--account', 'text' => 'account'],
					['value' => 'icon--chain', 'text' => 'chain'],
					['value' => 'icon--delicious', 'text' => 'delicious'],
					['value' => 'icon--delicious2', 'text' => 'delicious2'],
					['value' => 'icon--digg', 'text' => 'digg'],
					['value' => 'icon--phone', 'text' => 'phone'],
					['value' => 'icon--mobile', 'text' => 'mobile'],
					['value' => 'icon--mouse', 'text' => 'mouse'],
					['value' => 'icon--directions', 'text' => 'directions'],
					['value' => 'icon--paperplane', 'text' => 'paperplane'],
					['value' => 'icon--pencil', 'text' => 'pencil'],
					['value' => 'icon--paperclip', 'text' => 'paperclip'],
					['value' => 'icon--drawer', 'text' => 'drawer'],
					['value' => 'icon--user-add', 'text' => 'user-add'],
					['value' => 'icon--users', 'text' => 'users'],
					['value' => 'icon--vcard', 'text' => 'vcard'],
					['value' => 'icon--export', 'text' => 'export'],
					['value' => 'icon--location', 'text' => 'location'],
					['value' => 'icon--map', 'text' => 'map'],
					['value' => 'icon--share', 'text' => 'share'],
					['value' => 'icon--house', 'text' => 'house'],
					['value' => 'icon--flashlight', 'text' => 'flashlight'],
					['value' => 'icon--printer', 'text' => 'printer'],
					['value' => 'icon--link', 'text' => 'link'],
					['value' => 'icon--cog', 'text' => 'cog'],
					['value' => 'icon--tools', 'text' => 'tools'],
					['value' => 'icon--tag', 'text' => 'tag'],
					['value' => 'icon--camera', 'text' => 'camera'],
					['value' => 'icon--music2', 'text' => 'music2'],
					['value' => 'icon--graduation', 'text' => 'graduation'],
					['value' => 'icon--airplane', 'text' => 'airplane'],
					['value' => 'icon--calendar', 'text' => 'calendar'],
					['value' => 'icon--clock2', 'text' => 'clock2'],
					['value' => 'icon--key', 'text' => 'key'],
					['value' => 'icon--sun2', 'text' => 'sun2'],
					['value' => 'icon--adjust', 'text' => 'adjust'],
					['value' => 'icon--code', 'text' => 'code'],
					['value' => 'icon--rss', 'text' => 'rss'],
					['value' => 'icon--signal', 'text' => 'signal'],
					['value' => 'icon--pie', 'text' => 'pie'],
					['value' => 'icon--bars', 'text' => 'bars'],
					['value' => 'icon--graph', 'text' => 'graph'],
					['value' => 'icon--login', 'text' => 'login'],
					['value' => 'icon--question', 'text' => 'question'],
					['value' => 'icon--info', 'text' => 'info'],
					['value' => 'icon--info2', 'text' => 'info2'],
					['value' => 'icon--blocked', 'text' => 'blocked'],
					['value' => 'icon--help', 'text' => 'help'],
					['value' => 'icon--list2', 'text' => 'list2'],
					['value' => 'icon--pictures', 'text' => 'pictures'],
					['value' => 'icon--video', 'text' => 'video'],
					['value' => 'icon--upload', 'text' => 'upload'],
					['value' => 'icon--bookmark', 'text' => 'bookmark'],
					['value' => 'icon--install', 'text' => 'install'],
					['value' => 'icon--download', 'text' => 'download'],
					['value' => 'icon--book2', 'text' => 'book2'],
					['value' => 'icon--play', 'text' => 'play'],
					['value' => 'icon--pause', 'text' => 'pause'],
					['value' => 'icon--record', 'text' => 'record'],
					['value' => 'icon--stop', 'text' => 'stop'],
					['value' => 'icon--next', 'text' => 'next'],
					['value' => 'icon--previous', 'text' => 'previous'],
					['value' => 'icon--first', 'text' => 'first'],
					['value' => 'icon--last', 'text' => 'last'],
					['value' => 'icon--flow-tree', 'text' => 'flow-tree'],
					['value' => 'icon--flickr', 'text' => 'flickr'],
					['value' => 'icon--flickr2', 'text' => 'flickr2'],
					['value' => 'icon--vimeo', 'text' => 'vimeo'],
					['value' => 'icon--vimeo2', 'text' => 'vimeo2'],
					['value' => 'icon--twitter', 'text' => 'twitter'],
					['value' => 'icon--twitter2', 'text' => 'twitter2'],
					['value' => 'icon--facebook', 'text' => 'facebook'],
					['value' => 'icon--facebook2', 'text' => 'facebook2'],
					['value' => 'icon--facebook3', 'text' => 'facebook3'],
					['value' => 'icon--googleplus', 'text' => 'googleplus'],
					['value' => 'icon--googleplus2', 'text' => 'googleplus2'],
					['value' => 'icon--pinterest', 'text' => 'pinterest'],
					['value' => 'icon--pinterest2', 'text' => 'pinterest2'],
					['value' => 'icon--tumblr', 'text' => 'tumblr'],
					['value' => 'icon--tumblr2', 'text' => 'tumblr2'],
					['value' => 'icon--linkedin', 'text' => 'linkedin'],
					['value' => 'icon--linkedin2', 'text' => 'linkedin2'],
					['value' => 'icon--spotify', 'text' => 'spotify'],
					['value' => 'icon--spotify2', 'text' => 'spotify2'],
					['value' => 'icon--instagram', 'text' => 'instagram'],
					['value' => 'icon--dropbox', 'text' => 'dropbox'],
					['value' => 'icon--evernote', 'text' => 'evernote'],
					['value' => 'icon--skype', 'text' => 'skype'],
					['value' => 'icon--skype2', 'text' => 'skype2'],
					['value' => 'icon--flattr', 'text' => 'flattr'],
					['value' => 'icon--renren', 'text' => 'renren'],
					['value' => 'icon--paypal', 'text' => 'paypal'],
					['value' => 'icon--soundcloud', 'text' => 'soundcloud'],
					['value' => 'icon--mixi', 'text' => 'mixi'],
					['value' => 'icon--behance', 'text' => 'behance'],
					['value' => 'icon--circles', 'text' => 'circles'],
					['value' => 'icon--feed', 'text' => 'feed'],
					['value' => 'icon--feed2', 'text' => 'feed2'],
					['value' => 'icon--smashing', 'text' => 'smashing'],
				],
				$this->getLabelAttribute(
					'Wählen Sie ein Icon, welches vor dem Text angezeigt ',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_icon_top_bar3',
				'Icon 3',
				'icon--check',
				[
					['value' => 0, 'text' => 'Nein'],
					['value' => 'icon--percent2', 'text' => 'percent2'],
					['value' => 'icon--percent', 'text' => 'percent'],
					['value' => 'icon--coupon', 'text' => 'coupon'],
					['value' => 'icon--truck', 'text' => 'truck'],
					['value' => 'icon--logout', 'text' => 'logout'],
					['value' => 'icon--grid', 'text' => 'grid'],
					['value' => 'icon--filter', 'text' => 'filter'],
					['value' => 'icon--clock', 'text' => 'clock'],
					['value' => 'icon--arrow-up', 'text' => 'arrow-up'],
					['value' => 'icon--arrow-right', 'text' => 'arrow-right'],
					['value' => 'icon--arrow-left', 'text' => 'arrow-left'],
					['value' => 'icon--arrow-down', 'text' => 'arrow-down'],
					['value' => 'icon--star', 'text' => 'star'],
					['value' => 'icon--star-half', 'text' => 'star-half'],
					['value' => 'icon--star-empty', 'text' => 'star-empty'],
					['value' => 'icon--shopware', 'text' => 'shopware'],
					['value' => 'icon--service', 'text' => 'service'],
					['value' => 'icon--search', 'text' => 'search'],
					['value' => 'icon--numbered', 'text' => 'numbered'],
					['value' => 'icon--menu', 'text' => 'menu'],
					['value' => 'icon--mail', 'text' => 'mail'],
					['value' => 'icon--list', 'text' => 'list'],
					['value' => 'icon--layout', 'text' => 'layout'],
					['value' => 'icon--heart', 'text' => 'heart'],
					['value' => 'icon--cross', 'text' => 'cross'],
					['value' => 'icon--compare', 'text' => 'compare'],
					['value' => 'icon--check', 'text' => 'check'],
					['value' => 'icon--basket', 'text' => 'basket'],
					['value' => 'icon--account', 'text' => 'account'],
					['value' => 'icon--chain', 'text' => 'chain'],
					['value' => 'icon--delicious', 'text' => 'delicious'],
					['value' => 'icon--delicious2', 'text' => 'delicious2'],
					['value' => 'icon--digg', 'text' => 'digg'],
					['value' => 'icon--phone', 'text' => 'phone'],
					['value' => 'icon--mobile', 'text' => 'mobile'],
					['value' => 'icon--mouse', 'text' => 'mouse'],
					['value' => 'icon--directions', 'text' => 'directions'],
					['value' => 'icon--paperplane', 'text' => 'paperplane'],
					['value' => 'icon--pencil', 'text' => 'pencil'],
					['value' => 'icon--paperclip', 'text' => 'paperclip'],
					['value' => 'icon--drawer', 'text' => 'drawer'],
					['value' => 'icon--user-add', 'text' => 'user-add'],
					['value' => 'icon--users', 'text' => 'users'],
					['value' => 'icon--vcard', 'text' => 'vcard'],
					['value' => 'icon--export', 'text' => 'export'],
					['value' => 'icon--location', 'text' => 'location'],
					['value' => 'icon--map', 'text' => 'map'],
					['value' => 'icon--share', 'text' => 'share'],
					['value' => 'icon--house', 'text' => 'house'],
					['value' => 'icon--flashlight', 'text' => 'flashlight'],
					['value' => 'icon--printer', 'text' => 'printer'],
					['value' => 'icon--link', 'text' => 'link'],
					['value' => 'icon--cog', 'text' => 'cog'],
					['value' => 'icon--tools', 'text' => 'tools'],
					['value' => 'icon--tag', 'text' => 'tag'],
					['value' => 'icon--camera', 'text' => 'camera'],
					['value' => 'icon--music2', 'text' => 'music2'],
					['value' => 'icon--graduation', 'text' => 'graduation'],
					['value' => 'icon--airplane', 'text' => 'airplane'],
					['value' => 'icon--calendar', 'text' => 'calendar'],
					['value' => 'icon--clock2', 'text' => 'clock2'],
					['value' => 'icon--key', 'text' => 'key'],
					['value' => 'icon--sun2', 'text' => 'sun2'],
					['value' => 'icon--adjust', 'text' => 'adjust'],
					['value' => 'icon--code', 'text' => 'code'],
					['value' => 'icon--rss', 'text' => 'rss'],
					['value' => 'icon--signal', 'text' => 'signal'],
					['value' => 'icon--pie', 'text' => 'pie'],
					['value' => 'icon--bars', 'text' => 'bars'],
					['value' => 'icon--graph', 'text' => 'graph'],
					['value' => 'icon--login', 'text' => 'login'],
					['value' => 'icon--question', 'text' => 'question'],
					['value' => 'icon--info', 'text' => 'info'],
					['value' => 'icon--info2', 'text' => 'info2'],
					['value' => 'icon--blocked', 'text' => 'blocked'],
					['value' => 'icon--help', 'text' => 'help'],
					['value' => 'icon--list2', 'text' => 'list2'],
					['value' => 'icon--pictures', 'text' => 'pictures'],
					['value' => 'icon--video', 'text' => 'video'],
					['value' => 'icon--upload', 'text' => 'upload'],
					['value' => 'icon--bookmark', 'text' => 'bookmark'],
					['value' => 'icon--install', 'text' => 'install'],
					['value' => 'icon--download', 'text' => 'download'],
					['value' => 'icon--book2', 'text' => 'book2'],
					['value' => 'icon--play', 'text' => 'play'],
					['value' => 'icon--pause', 'text' => 'pause'],
					['value' => 'icon--record', 'text' => 'record'],
					['value' => 'icon--stop', 'text' => 'stop'],
					['value' => 'icon--next', 'text' => 'next'],
					['value' => 'icon--previous', 'text' => 'previous'],
					['value' => 'icon--first', 'text' => 'first'],
					['value' => 'icon--last', 'text' => 'last'],
					['value' => 'icon--flow-tree', 'text' => 'flow-tree'],
					['value' => 'icon--flickr', 'text' => 'flickr'],
					['value' => 'icon--flickr2', 'text' => 'flickr2'],
					['value' => 'icon--vimeo', 'text' => 'vimeo'],
					['value' => 'icon--vimeo2', 'text' => 'vimeo2'],
					['value' => 'icon--twitter', 'text' => 'twitter'],
					['value' => 'icon--twitter2', 'text' => 'twitter2'],
					['value' => 'icon--facebook', 'text' => 'facebook'],
					['value' => 'icon--facebook2', 'text' => 'facebook2'],
					['value' => 'icon--facebook3', 'text' => 'facebook3'],
					['value' => 'icon--googleplus', 'text' => 'googleplus'],
					['value' => 'icon--googleplus2', 'text' => 'googleplus2'],
					['value' => 'icon--pinterest', 'text' => 'pinterest'],
					['value' => 'icon--pinterest2', 'text' => 'pinterest2'],
					['value' => 'icon--tumblr', 'text' => 'tumblr'],
					['value' => 'icon--tumblr2', 'text' => 'tumblr2'],
					['value' => 'icon--linkedin', 'text' => 'linkedin'],
					['value' => 'icon--linkedin2', 'text' => 'linkedin2'],
					['value' => 'icon--spotify', 'text' => 'spotify'],
					['value' => 'icon--spotify2', 'text' => 'spotify2'],
					['value' => 'icon--instagram', 'text' => 'instagram'],
					['value' => 'icon--dropbox', 'text' => 'dropbox'],
					['value' => 'icon--evernote', 'text' => 'evernote'],
					['value' => 'icon--skype', 'text' => 'skype'],
					['value' => 'icon--skype2', 'text' => 'skype2'],
					['value' => 'icon--flattr', 'text' => 'flattr'],
					['value' => 'icon--renren', 'text' => 'renren'],
					['value' => 'icon--paypal', 'text' => 'paypal'],
					['value' => 'icon--soundcloud', 'text' => 'soundcloud'],
					['value' => 'icon--mixi', 'text' => 'mixi'],
					['value' => 'icon--behance', 'text' => 'behance'],
					['value' => 'icon--circles', 'text' => 'circles'],
					['value' => 'icon--feed', 'text' => 'feed'],
					['value' => 'icon--feed2', 'text' => 'feed2'],
					['value' => 'icon--smashing', 'text' => 'smashing'],
				],
				$this->getLabelAttribute(
					'Wählen Sie ein Icon, welches vor dem Text angezeigt ',
					'helpText'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetHeaderLogo()
	{
		$fieldSet = $this->createFieldSet(
			'mars_header_logo',
			'Logo Größe',
			[
				'attributes' => [
					'layout' => 'anchor',
					'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
				]
			]
		);

		$fieldSet->addElement(
			$this->createNumberField(
				'mars-logo-size-smartphone',
				'Höhe auf dem Smartphone',
				'35',
				$this->getLabelAttribute(
					'Die Höhe des Logo auf dem Smartphone in Pixel. Die Breite wird automatisch gesetzt',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createNumberField(
				'mars-logo-size-tablet',
				'Höhe auf dem Tablet',
				'50',
				$this->getLabelAttribute(
					'Die Höhe des Logo auf dem Tablet in Pixel. Die Breite wird automatisch gesetzt',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createNumberField(
				'mars-logo-size-desktop',
				'Höhe auf dem Desktop',
				'50',
				$this->getLabelAttribute(
					'Die Höhe des Logo auf dem Desktop in Pixel. Die Breite wird automatisch gesetzt',
					'helpText'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetHeaderSticky()
	{
		$fieldSet = $this->createFieldSet(
			'mars_header_sticky',
			'Sticky Menü',
			[
				'attributes' => [
					'layout' => 'anchor',
					'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
				]
			]
		);

		$fieldSet->addElement(
			$this->createTextField(
				'cbax_sticky_note',
				'',
				'',
				[
					'attributes' => [
						'xtype' => 'container',
						'html' => 'Minimierter Header der beim Scrollen am oberen Bildschirmrand fixiert wird und sich erst wieder ausblendet, wenn der Header im sichtbaren Bereich erscheint.',
						'style' => 'padding: 0px 0px 20px 0px;'
					]
				]
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_sticky_active',
				'Plugin aktiv',
				true
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_sticky_typ',
				'Sticky Menü anzeigen als',
				'search_and_menu',
				[
					['value' => 'menu', 'text' => 'Navigationsleiste'],
					['value' => 'search', 'text' => 'Suchleiste'],
					['value' => 'search_and_menu', 'text' => 'Suchleiste und Navigationsleiste per Button'],
					['value' => 'search_and_menu_auto', 'text' => 'Suchleiste und Navigationsleiste per Automatik'],
					['value' => 'false', 'text' => 'Keine Anzeige']
				],
				$this->getLabelAttribute(
					'Soll die Navigationsleiste und/oder die Suchleiste an den Browser angeheftet werden',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_sticky_tablet',
				'Auch auf Tablet anzeigen',
				true,
				$this->getLabelAttribute(
					'Soll das Sticky Menü auch auf einem Tablet angezeigt werden'
				)
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_sticky_phone',
				'Auch auf Smartphone anzeigen',
				true,
				$this->getLabelAttribute(
					'Soll das Sticky Menü auch auf einem Smartphone angezeigt werden'
				)
			)
		);
		$fieldSet->addElement(
			$this->createNumberField(
				'cbax_sticky_delay',
				'Verzögerung beim Einblenden',
				'400',
				$this->getLabelAttribute(
					'Wie schnell soll die Suche eingeblendet werden (Angabe in Millisekunden)',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
            $this->createMediaField(
                'cbax_sticky_logo',
                'Logo',
                '',
                ['attributes' => ['lessCompatible' => false, 'supportText' => 'Wenn kein Logo zugewiesen wird, dann wird das Mobile Logo angezeigt']]
            )
        );

		return $fieldSet;
	}

	private function createFieldSetHeaderBreadcrumb()
	{
		$fieldSet = $this->createFieldSet(
			'mars_header_breadcrumb',
			'Breadcrumb Erweitert',
			[
				'attributes' => [
					'layout' => 'anchor',
					'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
				]
			]
		);

		$fieldSet->addElement(
			$this->createTextField(
				'cbax_breadcrumb_note',
				'',
				'',
				[
					'attributes' => [
						'xtype' => 'container',
						'html' => 'Mittels eines Mouseover, auf eine Kategorie im Breadcrumb und einer kurzen Verweildauer, werden die jeweiligen Unterkategorien in einem Layer eingeblendet.',
						'style' => 'padding: 0px 0px 20px 0px;'
					]
				]
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_breadcrumb_active',
				'Plugin aktiv',
				true
			)
		);
		$fieldSet->addElement(
			$this->createNumberField(
				'cbax_breadcrumb_delay',
				'Verzögerung beim Einblenden',
				'400',
				$this->getLabelAttribute(
					'Wie lange soll gewartet werden, bis die Breadcrumb Unterkategorien eingeblendet wird (Angabe in Millisekunden)',
					'helpText'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetHeaderBacktotop()
	{
		$fieldSet = $this->createFieldSet(
			'mars_header_backtotop',
			'Scroll To Top Button',
			[
				'attributes' => [
					'layout' => 'anchor',
					'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
				]
			]
		);

		$fieldSet->addElement(
			$this->createTextField(
				'cbax_backtotop_note',
				'',
				'',
				[
					'attributes' => [
						'xtype' => 'container',
						'html' => 'Mittels Knopfdruck, können Ihre Kunden wieder an den Anfang der Seite gelangen. Der Button wird im unteren rechten oder linken Bildschirmrand eingeblendet.',
						'style' => 'padding: 0px 0px 20px 0px;'
					]
				]
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_backtotop_active',
				'Plugin aktiv',
				true
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_backtotop_position',
				'Position',
				'right',
				[
					['value' => 'left', 'text' => 'Linker Bildschirmrand'],
					['value' => 'right', 'text' => 'Rechter Bildschirmrand']
				],
				$this->getLabelAttribute(
					'Wählen Sie die Position des Button',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createNumberField(
				'mars-backtotop-distance-side',
				'Abstand zum seitlichen Rand',
				'15',
				$this->getLabelAttribute(
					'Der Abstand zum seitlichen Rand in Pixel',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createNumberField(
				'mars-backtotop-distance-bottom',
				'Abstand nach unten',
				'50',
				$this->getLabelAttribute(
					'Der Abstand zum unteren Rand in Pixel',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_backtotop_button',
				'Scroll To Top Button',
				'normal',
				[
					['value' => 'normal', 'text' => 'Normaler Button'],
					['value' => 'is--primary', 'text' => 'Primärer Button'],
					['value' => 'is--secondary', 'text' => 'Sekundärer Button']
				],
				$this->getLabelAttribute(
					'Welchen Style soll der Button haben',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createNumberField(
				'cbax_backtotop_delay',
				'Scroll Geschwindigkeit',
				'400',
				$this->getLabelAttribute(
					'Mit welcher Geschwindigkeit soll nach oben gescrollt werden (Angabe in Millisekunden)',
					'helpText'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetCategoryMain()
	{
		$fieldSet = $this->createFieldSet(
			'mars_category_main',
			'Allgemeine Einstellungen',
			[
				'attributes' => [
					'layout' => 'anchor',
					'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
				]
			]
		);

		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_show_banner_above',
				'Kategorie Banner',
				false,
				$this->getLabelAttribute(
					'Die Banner werden im Listing über dem Content (unter dem Breadcrumb) angezeigt'
				)
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_show_category_text_below',
				'Kategorie Texte',
				false,
				$this->getLabelAttribute(
					'Kategorie Texte unterhalb des Listing anzeigen'
				)
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_hide_sidebar_main_category',
				'Sidebar Navigation',
				true,
				$this->getLabelAttribute(
					'Nur die gewählte Hauptkategorie + Unterkategorien im linken Kategoriebaum anzeigen'
				)
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_show_delivery_listing',
				'Lieferstatus',
				true,
				$this->getLabelAttribute(
					'Lieferstatus im Listing und in der Suche anzeigen'
				)
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_show_shippingfree_listing',
				'Versandkostenfrei',
				true,
				$this->getLabelAttribute(
					'Versandkostenfrei im Listing und in der Suche anzeigen'
				)
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_show_shippingfree_slider',
				'Versandkostenfrei',
				false,
				$this->getLabelAttribute(
					'Versandkostenfrei auch in den Slidern anzeigen'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetCategorySidebar()
	{
		$fieldSet = $this->createFieldSet(
			'mars_category_sidebar',
			'Promotion Boxen in Sidebar',
			[
				'attributes' => [
					'layout' => 'anchor',
					'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
				]
			]
		);

		$fieldSet->addElement(
			$this->createTextField(
				'cbax_sidebar_note_above',
				'',
				'',
				[
					'attributes' => [
						'xtype' => 'container',
						'html' => 'Sie haben die Möglichkeit über und unter der Sidebar Boxen mit z. B. Informationen oder Banner erscheinen zu lassen. Diese Informationen können auf allen Kategorie Seiten, Formularen und/oder Shopseiten angezeigt werden.<br /><br />Einstellungen für die obere Promotionbox:',
						'style' => 'padding: 0px 0px 20px 0px;'
					]
				]
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_sidebar_active_above',
				'Box oben aktiv',
				false,
				$this->getLabelAttribute(
					'Wenn aktiv, dann wird der Inhalt der Box oberhalb der Sidebar angezeigt'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_sidebar_display_above',
				'Anzeigen auf',
				array('listing', 'custom'),
				[
					['value' => 'listing', 'text' => 'Listing'],
					['value' => 'custom', 'text' => 'Shopseiten'],
					['value' => 'forms', 'text' => 'Formulare']
				],
				['attributes' => ['multiSelect' => true, 'editable' => false, 'helpText' => 'Mehrfachauswahl möglich']]
			)
		);
		$fieldSet->addElement(
			$this->createDateField(
				'cbax_sidebar_start_date_above',
				'Startdatum oben',
				''
			)
		);
		$fieldSet->addElement(
			$this->createDateField(
				'cbax_sidebar_end_date_above',
				'Enddatum oben',
				''
			)
		);
		$fieldSet->addElement(
			$this->createTextAreaField(
				'cbax_sidebar_content_above',
				'Box Inhalt oben',
				'',
				['attributes' => ['xtype' => 'tinymce', 'lessCompatible' => false]]
			)
		);
		$fieldSet->addElement(
			$this->createTextField(
				'cbax_sidebar_note_below',
				'',
				'',
				[
					'attributes' => [
						'xtype' => 'container',
						'html' => 'Einstellungen für die untere Promotionbox:',
						'style' => 'padding: 20px 0px 20px 0px;'
					]
				]
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_sidebar_active_below',
				'Box unten aktiv',
				false,
				$this->getLabelAttribute(
					'Wenn aktiv, dann wird der Inhalt der Box unterhalb der Sidebar angezeigt'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_sidebar_display_below',
				'Anzeigen auf',
				array('listing', 'custom'),
				[
					['value' => 'listing', 'text' => 'Listing'],
					['value' => 'custom', 'text' => 'Shopseiten'],
					['value' => 'forms', 'text' => 'Formulare']
				],
				['attributes' => ['multiSelect' => true, 'editable' => false, 'helpText' => 'Mehrfachauswahl möglich']]
			)
		);
		$fieldSet->addElement(
			$this->createDateField(
				'cbax_sidebar_start_date_below',
				'Startdatum unten',
				''
			)
		);
		$fieldSet->addElement(
			$this->createDateField(
				'cbax_sidebar_end_date_below',
				'Enddatum unten',
				''
			)
		);
		$fieldSet->addElement(
			$this->createTextAreaField(
				'cbax_sidebar_content_below',
				'Box Inhalt unten',
				'<div class="panel">
				 <h2 class="panel--title">Service Hotline</h2>
				 <div class="panel--body">
				 <div class="sidebar--text-primary is--phone"><span class="icon--phone">&nbsp;</span>0180 - 11 22 33</div>
				 Mo. - Fr.: 10:00-17:00 Uhr,<br> Sa.: 10:00-14:00 Uhr<br /><br />
				 <a href="mailto:info@demoshop.de">info@demoshop.de</a>
				 </div>
				 </div>',
				['attributes' => ['xtype' => 'tinymce', 'lessCompatible' => false]]
			)
		);

		return $fieldSet;
	}

	private function createFieldSetCategoryFilter()
	{
		$fieldSet = $this->createFieldSet(
			'mars_category_filter',
			'Filter in Sidebar',
			[
				'attributes' => [
					'layout' => 'anchor',
					'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
				]
			]
		);

		$fieldSet->addElement(
			$this->createTextField(
				'cbax_filter_note',
				'',
				'',
				[
					'attributes' => [
						'xtype' => 'container',
						'html' => 'Lassen Sie Ihre Filter prominent in der Sidebar erscheinen.',
						'style' => 'padding: 0px 0px 20px 0px;'
					]
				]
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_filter_active',
				'Plugin aktiv',
				true,
				$this->getLabelAttribute(
					'Wenn aktiv, dann werden die Filter in der Sidebar angezeigt'
				)
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_filter_active_search',
				'Filter in der Suche anzeigen',
				true,
				$this->getLabelAttribute(
					'Wenn aktiv, dann werden die Filter auch in der Suche in der Sidebar angezeigt'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_filter_position',
				'Filter Position',
				'after',
				[
					['value' => 'before', 'text' => 'Vor den Kategorien'],
					['value' => 'after', 'text' => 'Nach den Kategorien']
				],
				$this->getLabelAttribute(
					'An welcher Stelle sollen die Filter eingeblendet werden',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_filter_permanent_open',
				'Filter immer offen',
				false,
				$this->getLabelAttribute(
					'Wenn aktiv, werden alle Filter offen angezeigt',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createNumberField(
				'cbax_filter_panel_counter',
				'Die ersten x Filter öffnen',
				'5',
				$this->getLabelAttribute(
					'Nur die ersten x Filter öffnen. Die anderen bleiben geschlossen',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_filter_auto_submit',
				'Filter direkt absenden',
				true
			)
		);

		return $fieldSet;
	}

	private function createFieldSetCategoryPreviewImageChange()
	{
		$fieldSet = $this->createFieldSet(
			'mars_category_previewimagechange',
			'Artikelbild wechseln / zoomen',
			[
				'attributes' => [
					'layout' => 'anchor',
					'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
				]
			]
		);

		$fieldSet->addElement(
			$this->createTextField(
				'cbax_previewimagechange_note',
				'',
				'',
				[
					'attributes' => [
						'xtype' => 'container',
						'html' => 'Bei Mouseover können Sie die Artikelbilder per Animation hervorheben lassen. Sie haben hierfür zwei Möglichkeiten( 1. Variante:  Bildzoom = Vergrößerung des Bildes / 2. Variante: Bildwechsel = Einblendung des zweiten Artikelbildes)',
						'style' => 'padding: 0px 0px 20px 0px;'
					]
				]
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_previewimagechange_active',
				'Plugin aktiv',
				true,
				$this->getLabelAttribute(
					'Wenn aktiv, dann werden die Bilder im Listing und/oder den Einkaufswelten bei Mouseover automatisch gewechselt oder gezoomt'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_previewimagechange_effect',
				'Effekt',
				'zoom',
				[
					['value' => 'change', 'text' => 'Bildwechsel'],
					['value' => 'zoom', 'text' => 'Bildzoom']
				],
				$this->getLabelAttribute(
					'Welche Animation soll genutzt werden',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_previewimagechange_show',
				'Aktiv für',
				'both',
				[
					['value' => 'listing', 'text' => 'Listing'],
					['value' => 'emotion', 'text' => 'Einkaufswelten'],
					['value' => 'both', 'text' => 'Listing und Einkaufswelten']
				],
				$this->getLabelAttribute(
					'Auf welche Seiten soll der Effekt angezeigt werden',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_previewimagechange_duration',
				'Dauer des Übergangs',
				'.4s',
				[
					['value' => '0s', 'text' => 'sofort'],
					['value' => '.2s', 'text' => '200 ms'],
					['value' => '.4s', 'text' => '400 ms'],
					['value' => '.6s', 'text' => '600 ms'],
					['value' => '.8s', 'text' => '800 ms'],
					['value' => '1s', 'text' => '1 s']
				],
				$this->getLabelAttribute(
					'Wie lange soll der Übergang dauern',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_previewimagechange_function',
				'Geschwindigkeitskurve',
				'ease-in-out',
				[
					['value' => 'ease', 'text' => 'ease'],
					['value' => 'linear', 'text' => 'linear'],
					['value' => 'ease-in', 'text' => 'ease-in'],
					['value' => 'ease-out', 'text' => 'ease-out'],
					['value' => 'ease-in-out', 'text' => 'ease-in-out']
				],
				$this->getLabelAttribute(
					'Bestimmen Sie die Geschwindigkeitskurve des Übergangs ',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createNumberField(
				'cbax_previewimagchange_zoom',
				'Zoomfaktor',
				'115',
				[
					'attributes' => [
						'helpText' => 'Um wie viel Prozent soll das Artikelbild vergrößert werden (Nur bei Bildzoom)',
						'minValue' => '100',
						'maxValue' => '150'
					]
				]
			)
		);

		return $fieldSet;
	}

	private function createFieldSetDetailVariantInfo()
	{
		$fieldSet = $this->createFieldSet(
			'mars_detail_variant_info',
			'Infobox - Bitte wählen Sie eine Variante aus',
			[
				'attributes' => [
					'layout' => 'anchor',
					'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
				]
			]
		);

		$fieldSet->addElement(
			$this->createTextField(
				'cbax_variant_info_note',
				'',
				'',
				[
					'attributes' => [
						'xtype' => 'container',
						'html' => 'Lassen Sie eine Meldung bei Variantenartikel anzeigen, bei dem Kunden erst eine Variante wählen müssen. Über den Textbaustein "DetailBuyVariantInfo" können Sie den Hinweistext verändern.',
						'style' => 'padding: 0px 0px 20px 0px;'
					]
				]
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_variant_info_active',
				'Infobox aktiv',
				true,
				$this->getLabelAttribute(
					'Wenn aktiv, dann wird die Meldung angezeigt'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_variant_info_styling',
				'Box Styling',
				'is--warning',
				[
					['value' => 'is--warning', 'text' => 'warning (yellow)'],
					['value' => 'is--error', 'text' => 'error (red)'],
					['value' => 'is--success', 'text' => 'success (green)'],
					['value' => 'is--info', 'text' => 'info (blue)']
				],
				$this->getLabelAttribute(
					'Welche Farbe soll das Feld haben (Auswahl Shopware Standardmeldungen)',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_variant_info_icon',
				'Icon',
				'icon--info',
				[
					['value' => 'icon--percent2', 'text' => 'percent2'],
					['value' => 'icon--percent', 'text' => 'percent'],
					['value' => 'icon--coupon', 'text' => 'coupon'],
					['value' => 'icon--truck', 'text' => 'truck'],
					['value' => 'icon--logout', 'text' => 'logout'],
					['value' => 'icon--grid', 'text' => 'grid'],
					['value' => 'icon--filter', 'text' => 'filter'],
					['value' => 'icon--clock', 'text' => 'clock'],
					['value' => 'icon--arrow-up', 'text' => 'arrow-up'],
					['value' => 'icon--arrow-right', 'text' => 'arrow-right'],
					['value' => 'icon--arrow-left', 'text' => 'arrow-left'],
					['value' => 'icon--arrow-down', 'text' => 'arrow-down'],
					['value' => 'icon--star', 'text' => 'star'],
					['value' => 'icon--star-half', 'text' => 'star-half'],
					['value' => 'icon--star-empty', 'text' => 'star-empty'],
					['value' => 'icon--shopware', 'text' => 'shopware'],
					['value' => 'icon--service', 'text' => 'service'],
					['value' => 'icon--search', 'text' => 'search'],
					['value' => 'icon--numbered', 'text' => 'numbered'],
					['value' => 'icon--menu', 'text' => 'menu'],
					['value' => 'icon--mail', 'text' => 'mail'],
					['value' => 'icon--list', 'text' => 'list'],
					['value' => 'icon--layout', 'text' => 'layout'],
					['value' => 'icon--heart', 'text' => 'heart'],
					['value' => 'icon--cross', 'text' => 'cross'],
					['value' => 'icon--compare', 'text' => 'compare'],
					['value' => 'icon--check', 'text' => 'check'],
					['value' => 'icon--basket', 'text' => 'basket'],
					['value' => 'icon--account', 'text' => 'account'],
					['value' => 'icon--chain', 'text' => 'chain'],
					['value' => 'icon--delicious', 'text' => 'delicious'],
					['value' => 'icon--delicious2', 'text' => 'delicious2'],
					['value' => 'icon--digg', 'text' => 'digg'],
					['value' => 'icon--phone', 'text' => 'phone'],
					['value' => 'icon--mobile', 'text' => 'mobile'],
					['value' => 'icon--mouse', 'text' => 'mouse'],
					['value' => 'icon--directions', 'text' => 'directions'],
					['value' => 'icon--paperplane', 'text' => 'paperplane'],
					['value' => 'icon--pencil', 'text' => 'pencil'],
					['value' => 'icon--paperclip', 'text' => 'paperclip'],
					['value' => 'icon--drawer', 'text' => 'drawer'],
					['value' => 'icon--user-add', 'text' => 'user-add'],
					['value' => 'icon--users', 'text' => 'users'],
					['value' => 'icon--vcard', 'text' => 'vcard'],
					['value' => 'icon--export', 'text' => 'export'],
					['value' => 'icon--location', 'text' => 'location'],
					['value' => 'icon--map', 'text' => 'map'],
					['value' => 'icon--share', 'text' => 'share'],
					['value' => 'icon--house', 'text' => 'house'],
					['value' => 'icon--flashlight', 'text' => 'flashlight'],
					['value' => 'icon--printer', 'text' => 'printer'],
					['value' => 'icon--link', 'text' => 'link'],
					['value' => 'icon--cog', 'text' => 'cog'],
					['value' => 'icon--tools', 'text' => 'tools'],
					['value' => 'icon--tag', 'text' => 'tag'],
					['value' => 'icon--camera', 'text' => 'camera'],
					['value' => 'icon--music2', 'text' => 'music2'],
					['value' => 'icon--graduation', 'text' => 'graduation'],
					['value' => 'icon--airplane', 'text' => 'airplane'],
					['value' => 'icon--calendar', 'text' => 'calendar'],
					['value' => 'icon--clock2', 'text' => 'clock2'],
					['value' => 'icon--key', 'text' => 'key'],
					['value' => 'icon--sun2', 'text' => 'sun2'],
					['value' => 'icon--adjust', 'text' => 'adjust'],
					['value' => 'icon--code', 'text' => 'code'],
					['value' => 'icon--rss', 'text' => 'rss'],
					['value' => 'icon--signal', 'text' => 'signal'],
					['value' => 'icon--pie', 'text' => 'pie'],
					['value' => 'icon--bars', 'text' => 'bars'],
					['value' => 'icon--graph', 'text' => 'graph'],
					['value' => 'icon--login', 'text' => 'login'],
					['value' => 'icon--question', 'text' => 'question'],
					['value' => 'icon--info', 'text' => 'info'],
					['value' => 'icon--info2', 'text' => 'info2'],
					['value' => 'icon--blocked', 'text' => 'blocked'],
					['value' => 'icon--help', 'text' => 'help'],
					['value' => 'icon--list2', 'text' => 'list2'],
					['value' => 'icon--pictures', 'text' => 'pictures'],
					['value' => 'icon--video', 'text' => 'video'],
					['value' => 'icon--upload', 'text' => 'upload'],
					['value' => 'icon--bookmark', 'text' => 'bookmark'],
					['value' => 'icon--install', 'text' => 'install'],
					['value' => 'icon--download', 'text' => 'download'],
					['value' => 'icon--book2', 'text' => 'book2'],
					['value' => 'icon--play', 'text' => 'play'],
					['value' => 'icon--pause', 'text' => 'pause'],
					['value' => 'icon--record', 'text' => 'record'],
					['value' => 'icon--stop', 'text' => 'stop'],
					['value' => 'icon--next', 'text' => 'next'],
					['value' => 'icon--previous', 'text' => 'previous'],
					['value' => 'icon--first', 'text' => 'first'],
					['value' => 'icon--last', 'text' => 'last'],
					['value' => 'icon--flow-tree', 'text' => 'flow-tree'],
					['value' => 'icon--flickr', 'text' => 'flickr'],
					['value' => 'icon--flickr2', 'text' => 'flickr2'],
					['value' => 'icon--vimeo', 'text' => 'vimeo'],
					['value' => 'icon--vimeo2', 'text' => 'vimeo2'],
					['value' => 'icon--twitter', 'text' => 'twitter'],
					['value' => 'icon--twitter2', 'text' => 'twitter2'],
					['value' => 'icon--facebook', 'text' => 'facebook'],
					['value' => 'icon--facebook2', 'text' => 'facebook2'],
					['value' => 'icon--facebook3', 'text' => 'facebook3'],
					['value' => 'icon--googleplus', 'text' => 'googleplus'],
					['value' => 'icon--googleplus2', 'text' => 'googleplus2'],
					['value' => 'icon--pinterest', 'text' => 'pinterest'],
					['value' => 'icon--pinterest2', 'text' => 'pinterest2'],
					['value' => 'icon--tumblr', 'text' => 'tumblr'],
					['value' => 'icon--tumblr2', 'text' => 'tumblr2'],
					['value' => 'icon--linkedin', 'text' => 'linkedin'],
					['value' => 'icon--linkedin2', 'text' => 'linkedin2'],
					['value' => 'icon--spotify', 'text' => 'spotify'],
					['value' => 'icon--spotify2', 'text' => 'spotify2'],
					['value' => 'icon--instagram', 'text' => 'instagram'],
					['value' => 'icon--dropbox', 'text' => 'dropbox'],
					['value' => 'icon--evernote', 'text' => 'evernote'],
					['value' => 'icon--skype', 'text' => 'skype'],
					['value' => 'icon--skype2', 'text' => 'skype2'],
					['value' => 'icon--flattr', 'text' => 'flattr'],
					['value' => 'icon--renren', 'text' => 'renren'],
					['value' => 'icon--paypal', 'text' => 'paypal'],
					['value' => 'icon--soundcloud', 'text' => 'soundcloud'],
					['value' => 'icon--mixi', 'text' => 'mixi'],
					['value' => 'icon--behance', 'text' => 'behance'],
					['value' => 'icon--circles', 'text' => 'circles'],
					['value' => 'icon--feed', 'text' => 'feed'],
					['value' => 'icon--feed2', 'text' => 'feed2'],
					['value' => 'icon--smashing', 'text' => 'smashing'],
				],
				$this->getLabelAttribute(
					'Welches Icon soll vor dem Text angezeigt werden',
					'helpText'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetDetailVote()
	{
		$fieldSet = $this->createFieldSet(
			'mars_detail_vote',
			'Bewertungen in der Beschreibung',
			[
				'attributes' => [
					'layout' => 'anchor',
					'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
				]
			]
		);

		$fieldSet->addElement(
			$this->createTextField(
				'cbax_vote_note',
				'',
				'',
				[
					'attributes' => [
						'xtype' => 'container',
						'html' => 'Präsentieren Sie Ihre Kundenbewertungen, auf der rechten Seite, neben der Artikelbeschreibung.',
						'style' => 'padding: 0px 0px 20px 0px;'
					]
				]
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_vote_active',
				'Bewertungen aktiv',
				true,
				$this->getLabelAttribute(
					'Wenn aktiv, dann werden x Bewertungen auch neben der Beschreibung angezeigt'
				)
			)
		);
		$fieldSet->addElement(
			$this->createNumberField(
				'cbax_vote_counter',
				'Anzahl Bewertungen',
				'3',
				$this->getLabelAttribute(
					'Wie viele Bewertungen sollen maximal angezeigt werden',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createColorPickerField(
				'mars-vote-background-color',
				'Hintergrundfarbe',
				'#f5f5f5',
				$this->getLabelAttribute(
					'Welchen Hintergrundfarbe soll die einzelne Box haben',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_vote_button',
				'Anzeige Button',
				'normal',
				[
					['value' => 'normal', 'text' => 'Normaler Button'],
					['value' => 'is--primary', 'text' => 'Primärer Button'],
					['value' => 'is--secondary', 'text' => 'Sekundärer Button']
				],
				$this->getLabelAttribute(
					'Welchen Style soll der Button haben',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_vote_no_styling',
				'Kein Styling hinzufügen',
				false,
				$this->getLabelAttribute(
					'Definiert, dass kein weiteres Layout-Styling hinzugefügt wird.'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetFooterTemplate()
	{
		$fieldSet = $this->createFieldSet(
			'mars_footer_template',
			'Footer Template',
			[
				'attributes' => [
					'layout' => 'anchor',
					'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
				]
			]
		);

		$fieldSet->addElement(
			$this->createTextField(
				'cbax_footer_template_note',
				'',
				'',
				[
					'attributes' => [
						'xtype' => 'container',
						'html' => 'Erweitern Sie Ihren Footer auf bis zu vier Zeilen. Für jede Zeile, die Sie nutzen möchten, wählen Sie ein Template aus. Jedes Template darf nur einmal gewählt werden. Über die Textbausteine können Sie die Spalten mit Inhalt füllen.',
						'style' => 'padding: 0px 0px 20px 0px;'
					]
				]
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_footer_template_one',
				'Zeile 1',
				'footer-navigation',
				[
					['value' => 'footer-navigation', 'text' => 'Shopware Standard'],
					['value' => 'footer-navigation-two', 'text' => 'Template 4 Boxen (25%, 25%, 25%, 25%)'],
					['value' => 'footer-navigation-three', 'text' => 'Template 3 Boxen (50%, 25%, 25%)'],
					['value' => 'footer-navigation-four', 'text' => 'Template 3 Boxen (25%, 25%, 50%)'],
					['value' => 'footer-navigation-five', 'text' => 'Template 3 Boxen (25%, 50%, 25%)'],
					['value' => 'footer-navigation-six', 'text' => 'Template 2 Boxen (50%, 50%)'],
					['value' => 'footer-navigation-seven', 'text' => 'Template 2 Boxen (75%, 25%)'],
					['value' => 'footer-navigation-eight', 'text' => 'Template 2 Boxen (25%, 75%)'],
					['value' => 'footer-navigation-nine', 'text' => 'Template 1 Box (100%)']
				]
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_footer_template_two',
				'Zeile 2',
				'',
				[
					['value' => '', 'text' => 'Nein'],
					['value' => 'footer-navigation', 'text' => 'Shopware Standard'],
					['value' => 'footer-navigation-two', 'text' => 'Template 4 Boxen (25%, 25%, 25%, 25%)'],
					['value' => 'footer-navigation-three', 'text' => 'Template 3 Boxen (50%, 25%, 25%)'],
					['value' => 'footer-navigation-four', 'text' => 'Template 3 Boxen (25%, 25%, 50%)'],
					['value' => 'footer-navigation-five', 'text' => 'Template 3 Boxen (25%, 50%, 25%)'],
					['value' => 'footer-navigation-six', 'text' => 'Template 2 Boxen (50%, 50%)'],
					['value' => 'footer-navigation-seven', 'text' => 'Template 2 Boxen (75%, 25%)'],
					['value' => 'footer-navigation-eight', 'text' => 'Template 2 Boxen (25%, 75%)'],
					['value' => 'footer-navigation-nine', 'text' => 'Template 1 Box (100%)']
				]
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_footer_template_three',
				'Zeile 3',
				'',
				[
					['value' => '', 'text' => 'Nein'],
					['value' => 'footer-navigation', 'text' => 'Shopware Standard'],
					['value' => 'footer-navigation-two', 'text' => 'Template 4 Boxen (25%, 25%, 25%, 25%)'],
					['value' => 'footer-navigation-three', 'text' => 'Template 3 Boxen (50%, 25%, 25%)'],
					['value' => 'footer-navigation-four', 'text' => 'Template 3 Boxen (25%, 25%, 50%)'],
					['value' => 'footer-navigation-five', 'text' => 'Template 3 Boxen (25%, 50%, 25%)'],
					['value' => 'footer-navigation-six', 'text' => 'Template 2 Boxen (50%, 50%)'],
					['value' => 'footer-navigation-seven', 'text' => 'Template 2 Boxen (75%, 25%)'],
					['value' => 'footer-navigation-eight', 'text' => 'Template 2 Boxen (25%, 75%)'],
					['value' => 'footer-navigation-nine', 'text' => 'Template 1 Box (100%)']
				]
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_footer_template_four',
				'Zeile 4',
				'',
				[
					['value' => '', 'text' => 'Nein'],
					['value' => 'footer-navigation', 'text' => 'Shopware Standard'],
					['value' => 'footer-navigation-two', 'text' => 'Template 4 Boxen (25%, 25%, 25%, 25%)'],
					['value' => 'footer-navigation-three', 'text' => 'Template 3 Boxen (50%, 25%, 25%)'],
					['value' => 'footer-navigation-four', 'text' => 'Template 3 Boxen (25%, 25%, 50%)'],
					['value' => 'footer-navigation-five', 'text' => 'Template 3 Boxen (25%, 50%, 25%)'],
					['value' => 'footer-navigation-six', 'text' => 'Template 2 Boxen (50%, 50%)'],
					['value' => 'footer-navigation-seven', 'text' => 'Template 2 Boxen (75%, 25%)'],
					['value' => 'footer-navigation-eight', 'text' => 'Template 2 Boxen (25%, 75%)'],
					['value' => 'footer-navigation-nine', 'text' => 'Template 1 Box (100%)']
				]
			)
		);

		return $fieldSet;
	}

	private function createFieldSetFooterPaymentAndShipping()
	{
		$fieldSet = $this->createFieldSet(
			'mars_footer_payment_and_shipping',
			'Einstellungen Zahlungsarten und Versandarten',
			[
				'attributes' => [
					'layout' => 'anchor',
					'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
				]
			]
		);

		$fieldSet->addElement(
			$this->createTextField(
				'cbax_payment_and_shipping_note',
				'',
				'',
				[
					'attributes' => [
						'xtype' => 'container',
						'html' => 'Legen Sie allgemeine Einstellungen für die Zahlungs- und Versandarten Icon fest.',
						'style' => 'padding: 0px 0px 20px 0px;'
					]
				]
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_payment_and_shipping_active',
				'Icons anzeigen',
				true,
				$this->getLabelAttribute(
					'Wenn aktiv, werden die Zahlungs-und Versandarten Icons angezeigt'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_payment_and_shipping_type',
				'Icon Farbe',
				'dark',
				[
					['value' => 'dark', 'text' => 'Dunkel'],
					['value' => 'brightly', 'text' => 'Hell'],
					['value' => 'color', 'text' => 'Farbig']
				],
				$this->getLabelAttribute(
					'Bestimmen Sie die Farbvorlage der Icons',
					'helpText'
				)
			)
		);
		$fieldSet->addElement(
			$this->createSelectField(
				'cbax_payment_and_shipping_position',
				'Icon Position',
				'float-yes',
				[
					['value' => 'float-yes', 'text' => 'Nebeneinander'],
					['value' => 'float-non', 'text' => 'Untereinander']
				],
				$this->getLabelAttribute(
					'Wie sollen die Icons der Zahlungsarten und Versandarten angezeigt werden.<br /><br />
					<b>Nebeneinander</b><br>
					Zahlungsarten und Versandarten werden in einer Reihe angezeigt<br /><br />
					<b>Untereinander</b><br>
					Es werden die Zahlungsarten in einer Reihe und darunter die Versandarten angezeigt',
					'helpText'
				)
			)
		);

		return $fieldSet;
	}

	private function createFieldSetFooterPayment()
	{
		$attributes = array_merge($this->fieldSetDefaults, ['height' => 460]);
		$fieldSet = $this->createFieldSet(
			'mars_footer_payment',
			'Zahlungsarten anzeigen',
			['attributes' => $attributes]
		);

		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_amazon_payment',
				'Amazon Payment',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_american_express',
				'American Express',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_barzahlung',
				'Barzahlung',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_billpay',
				'Billpay',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_billsave',
				'Billsave',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_clickandbuy',
				'ClickandBuy',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_discover',
				'Discover',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_ec_cash',
				'EC Cash',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_girocard',
				'Girocard',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_giropay',
				'Giropay',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_ideal',
				'Ideal',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_klarna',
				'Klarna',
				true
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_lastschrift',
				'Lastschrift',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_maestro',
				'Maestro',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_mastercard',
				'Mastercard',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_nachnahme',
				'Nachnahme',
				true
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_paymorrow',
				'Paymorrow',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_paypal',
				'PayPal',
				true
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_invoice',
				'Rechnung',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_santander',
				'Santander',
				true
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_sepa',
				'Sepa',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_skill',
				'Skill',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_sofort',
				'Sofortüberweisung',
				true
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_visa',
				'Visa',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_vorkasse',
				'Vorkasse',
				true
			)
		);

		return $fieldSet;
	}

	private function createFieldSetFooterShipping()
	{
		$attributes = array_merge($this->fieldSetDefaults, ['height' => 270]);
		$fieldSet = $this->createFieldSet(
			'mars_footer_shipping',
			'Versandarten anzeigen',
			['attributes' => $attributes]
		);

		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_post_shipping',
				'Deutsche Post',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_dhl_shipping',
				'DHL',
				true
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_dhl_express_shipping',
				'DHL Express',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_dhl_packstation_shipping',
				'DHL Packstation',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_dpd_shipping',
				'DPD',
				true
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_fedex_shipping',
				'Fedex',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_gls_shipping',
				'GLS',
				true
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_hermes_shipping',
				'Hermes',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_pin_shipping',
				'PIN',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_sebstabholung_shipping',
				'Selbstabholung',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_spedition_shipping',
				'Spedition',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_tnt_shipping',
				'TNT',
				false
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_icon_ups_shipping',
				'UPS',
				false
			)
		);

		return $fieldSet;
	}

	private function createFieldSetCheckoutBasket()
	{
		$fieldSet = $this->createFieldSet(
			'mars_checkout_basket',
			'Offcanvas Warenkorb',
			[
				'attributes' => [
					'layout' => 'anchor',
					'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
				]
			]
		);

		$fieldSet->addElement(
			$this->createTextField(
				'cbax_basket_note',
				'',
				'',
				[
					'attributes' => [
						'xtype' => 'container',
						'html' => 'Hier können Sie ein verkaufsförderndes Banner für den Offcanvas Warenkorb hinterlegen. Das Banner sollte eine Breite von 380px haben.',
						'style' => 'padding: 0px 0px 20px 0px;'
					]
				]
			)
		);
		$fieldSet->addElement(
			$this->createCheckboxField(
				'cbax_basket_active',
				'Banner aktiv',
				false,
				$this->getLabelAttribute(
					'Wenn aktiv, dann wird das Banner im Offcanvas Warenkorb angezeigt'
				)
			)
		);
		$fieldSet->addElement(
			$this->createDateField(
				'cbax_basket_start_date',
				'Startdatum',
				''
			)
		);
		$fieldSet->addElement(
			$this->createDateField(
				'cbax_basket_end_date',
				'Enddatum',
				''
			)
		);
		$fieldSet->addElement(
			$this->createMediaField(
				'cbax_basket_banner',
				'Banner',
				'',
				['attributes' => ['lessCompatible' => false]]
			)
		);
		$fieldSet->addElement(
			$this->createTextField(
				'cbax_basket_link',
				'Link',
				'',
				['attributes' => ['lessCompatible' => false]]
			)
		);

		return $fieldSet;
	}
	
	private function createFieldSetCheckoutConfigurator()
    {
        $fieldSet = $this->createFieldSet(
            'mars_checkout_configurator',
			'Variantenanzeige',
            [
                'attributes' => [
                    'layout' => 'anchor',
                    'defaults' => ['labelWidth' => 180, 'anchor' => '100%']
                ]
            ]
        );
		
		$fieldSet->addElement(
			$this->createTextField(
				'cbax_configurator_note',
				'',
				'',
				[
					'attributes' => [
						'xtype' => 'container',
						'html' => 'Hier können Sie festlegen, ob die Varianten übersichtlich getrennt unter dem Artikelname angezeigt werden.',
						'style' => 'padding: 0px 0px 20px 0px;'
					]
				]
			)
		);
		$fieldSet->addElement(
            $this->createCheckboxField(
                'cbax_configurator_active',
                'Varianten trennen aktiv',
                true,
				$this->getLabelAttribute(
                    'Wenn aktiv, dann werden die Varianten getrennt angezeigt'
                )
            )
        );
		$fieldSet->addElement(
            $this->createSelectField(
                'cbax_configurator_display',
                'Anzeigen auf',
                array('note', 'account', 'checkout'),
                [
                    ['value' => 'note', 'text' => 'Merkzettel'],
					['value' => 'account', 'text' => 'Account'],
                    ['value' => 'checkout', 'text' => 'Checkout'],
					['value' => 'document', 'text' => 'Dokumente'],
					['value' => 'mail', 'text' => 'E-Mail']
                ],
				['attributes' => ['multiSelect' => true, 'editable' => false, 'helpText' => 'Auf welchen Seiten sollen die Varianten getrennt werden (Mehrfachauswahl möglich)']]
            )
        );

        return $fieldSet;
    }

	public function createConfigSets(ArrayCollection $collection)
	{
		$set = new ConfigSet();
		$set->setName('Theme Mars Orange');
		$set->setDescription('Setze alle Farben und Einstellungen des Theme Mars in der Farbe Orange');
		$set->setValues(array(
			'brand-primary' => '#f0891c',
			'brand-primary-light' => 'saturate(lighten(@brand-primary, 8%), 5%)',
			'brand-secondary' => '#616161',
			'brand-secondary-dark' => 'darken(@brand-secondary, 10%)',
			'body-bg' => '#f5f5f5',
			'highlight-success' => '#aabe00',
			'badge-discount-bg' => '#990000',
			'badge-discount-color' => '#ffffff',
			'mars-notification-bg' => '@brand-primary',
			'mars-notification-color' => '#ffffff',
			'mars-sidebar-widget-bg' => '#000000',
			'mars-sidebar-widget-opacity' => '0.7',
			'mars-sidebar-widget-color' => '#ffffff',
			'mars-footer-widget-bg' => '#000000',
			'mars-footer-widget-opacity' => '0.7',
			'mars-footer-widget-color' => '#ffffff',
			'mars-background-bg' => '#f5f5f5',
			'mars-top-bar-bg' => '#292a29',
			'mars-top-bar-color' => '#cfcfcf',
			'mars-header-bg' => '#ffffff',
			'mars-header-color' => '#616161',
			'mars-navigation-bg' => '#ffffff',
			'mars-navigation-color' => '#666666',
			'mars-navigation-hover-bg' => '#ffffff',
			'mars-navigation-hover-color' => '#3a353e',
			'mars-navigation-active-bg' => '@brand-primary',
			'mars-navigation-active-color' => '#ffffff',
			'mars-sticky-navigation-bg' => 'linear-gradient(to bottom,#fff 0%,#f8f8fa 100%)',
			'mars-sticky-navigation-color' => '#5c5c5c',
			'mars-sidebar-navigation-bg' => '@brand-primary',
			'mars-sidebar-navigation-color' => '#ffffff',
			'mars-sidebar-navigation-hover-color' => '#ffffff',
			'mars-sidebar-navigation-active-color' => '#ffffff',
			'mars-filter-bg' => '#ffffff',
			'mars-filter-color' => '#616161',
			'mars-tabs-bg' => 'transparent',
			'mars-tabs-color' => '#616161',
			'mars-tabs-hover-bg' => '#ffffff',
			'mars-tabs-hover-color' => '@brand-primary',
			'mars-tabs-active-bg' => '#ffffff',
			'mars-tabs-active-color' => '#616161',
			'mars-btn-primary-top-bg' => '#f0891c',
			'mars-btn-primary-bottom-bg' => 'darken(@mars-btn-primary-top-bg, 10%)',
			'mars-btn-primary-hover-bg' => '@mars-btn-primary-bottom-bg',
			'mars-btn-primary-text-color' => '#ffffff',
			'mars-badge-shipping-bg' => '#aabe00',
			'mars-badge-shipping-color' => '#ffffff',
			'mars-price-discount-color' => '#990000',
			'cbax_pseudoprice' => 'percent',
			'mars-step-container-bg' => '#eeeeee',
			'mars-step-container-color' => '#5c5c5c',
			'mars-step-icon-bg' => '#5c5c5c',
			'mars-step-icon-color' => '#ffffff',
			'mars-basket-footer-bg' => '#eeeeee',
			'mars-basket-footer-color' => '#5c5c5c',
			'mars-footer-info-bg' => '#292a29',
			'mars-footer-info-color' => '#616161',
			'mars-footer-main-bg' => '#ffffff',
			'mars-footer-main-color' => '#616161',
			'mars-footer-bottom-bg' => 'darken(@mars-background-bg, 3%)',
			'mars-footer-bottom-color' => '#616161',
			'mars-vote-background-color' => '#f5f5f5'
		));

		$collection->add($set);

		$set = new ConfigSet();
		$set->setName('Theme Mars Rot');
		$set->setDescription('Setze alle Farben und Einstellungen des Theme Mars in der Farbe Rot');
		$set->setValues(array(
			'brand-primary' => '#b73c38',
			'brand-primary-light' => 'saturate(lighten(@brand-primary, 8%), 5%)',
			'brand-secondary' => '#616161',
			'brand-secondary-dark' => 'darken(@brand-secondary, 10%)',
			'body-bg' => '#f5f5f5',
			'highlight-success' => '#aabe00',
			'badge-discount-bg' => '#990000',
			'badge-discount-color' => '#ffffff',
			'mars-notification-bg' => '@brand-primary',
			'mars-notification-color' => '#ffffff',
			'mars-sidebar-widget-bg' => '#000000',
			'mars-sidebar-widget-opacity' => '0.7',
			'mars-sidebar-widget-color' => '#ffffff',
			'mars-footer-widget-bg' => '#000000',
			'mars-footer-widget-opacity' => '0.7',
			'mars-footer-widget-color' => '#ffffff',
			'mars-background-bg' => '#f5f5f5',
			'mars-top-bar-bg' => '#292a29',
			'mars-top-bar-color' => '#cfcfcf',
			'mars-header-bg' => '#ffffff',
			'mars-header-color' => '#616161',
			'mars-navigation-bg' => '#ffffff',
			'mars-navigation-color' => '#666666',
			'mars-navigation-hover-bg' => '#ffffff',
			'mars-navigation-hover-color' => '#3a353e',
			'mars-navigation-active-bg' => '@brand-primary',
			'mars-navigation-active-color' => '#ffffff',
			'mars-sticky-navigation-bg' => 'linear-gradient(to bottom,#fff 0%,#f8f8fa 100%)',
			'mars-sticky-navigation-color' => '#5c5c5c',
			'mars-sidebar-navigation-bg' => '@brand-primary',
			'mars-sidebar-navigation-color' => '#ffffff',
			'mars-sidebar-navigation-hover-color' => '#ffffff',
			'mars-sidebar-navigation-active-color' => '#ffffff',
			'mars-filter-bg' => '#ffffff',
			'mars-filter-color' => '#616161',
			'mars-tabs-bg' => 'transparent',
			'mars-tabs-color' => '#616161',
			'mars-tabs-hover-bg' => '#ffffff',
			'mars-tabs-hover-color' => '@brand-primary',
			'mars-tabs-active-bg' => '#ffffff',
			'mars-tabs-active-color' => '#616161',
			'mars-btn-primary-top-bg' => '#b73c38',
			'mars-btn-primary-bottom-bg' => 'darken(@mars-btn-primary-top-bg, 10%)',
			'mars-btn-primary-hover-bg' => '@mars-btn-primary-bottom-bg',
			'mars-btn-primary-text-color' => '#ffffff',
			'mars-badge-shipping-bg' => '#aabe00',
			'mars-badge-shipping-color' => '#ffffff',
			'mars-price-discount-color' => '#990000',
			'cbax_pseudoprice' => 'percent',
			'mars-step-container-bg' => '#eeeeee',
			'mars-step-container-color' => '#5c5c5c',
			'mars-step-icon-bg' => '#5c5c5c',
			'mars-step-icon-color' => '#ffffff',
			'mars-basket-footer-bg' => '#eeeeee',
			'mars-basket-footer-color' => '#5c5c5c',
			'mars-footer-info-bg' => '#292a29',
			'mars-footer-info-color' => '#616161',
			'mars-footer-main-bg' => '#ffffff',
			'mars-footer-main-color' => '#616161',
			'mars-footer-bottom-bg' => 'darken(@mars-background-bg, 3%)',
			'mars-footer-bottom-color' => '#616161',
			'mars-vote-background-color' => '#f5f5f5'
		));

		$collection->add($set);

		$set = new ConfigSet();
		$set->setName('Theme Mars Grün');
		$set->setDescription('Setze alle Farben und Einstellungen des Theme Mars in der Farbe Grün');
		$set->setValues(array(
			'brand-primary' => '#758b22',
			'brand-primary-light' => 'saturate(lighten(@brand-primary, 8%), 5%)',
			'brand-secondary' => '#616161',
			'brand-secondary-dark' => 'darken(@brand-secondary, 10%)',
			'body-bg' => '#f5f5f5',
			'highlight-success' => '#aabe00',
			'badge-discount-bg' => '#990000',
			'badge-discount-color' => '#ffffff',
			'mars-notification-bg' => '@brand-primary',
			'mars-notification-color' => '#ffffff',
			'mars-sidebar-widget-bg' => '#000000',
			'mars-sidebar-widget-opacity' => '0.7',
			'mars-sidebar-widget-color' => '#ffffff',
			'mars-footer-widget-bg' => '#000000',
			'mars-footer-widget-opacity' => '0.7',
			'mars-footer-widget-color' => '#ffffff',
			'mars-background-bg' => '#f5f5f5',
			'mars-top-bar-bg' => '#292a29',
			'mars-top-bar-color' => '#cfcfcf',
			'mars-header-bg' => '#ffffff',
			'mars-header-color' => '#616161',
			'mars-navigation-bg' => '#ffffff',
			'mars-navigation-color' => '#666666',
			'mars-navigation-hover-bg' => '#ffffff',
			'mars-navigation-hover-color' => '#3a353e',
			'mars-navigation-active-bg' => '@brand-primary',
			'mars-navigation-active-color' => '#ffffff',
			'mars-sticky-navigation-bg' => 'linear-gradient(to bottom,#fff 0%,#f8f8fa 100%)',
			'mars-sticky-navigation-color' => '#5c5c5c',
			'mars-sidebar-navigation-bg' => '@brand-primary',
			'mars-sidebar-navigation-color' => '#ffffff',
			'mars-sidebar-navigation-hover-color' => '#ffffff',
			'mars-sidebar-navigation-active-color' => '#ffffff',
			'mars-filter-bg' => '#ffffff',
			'mars-filter-color' => '#616161',
			'mars-tabs-bg' => 'transparent',
			'mars-tabs-color' => '#616161',
			'mars-tabs-hover-bg' => '#ffffff',
			'mars-tabs-hover-color' => '@brand-primary',
			'mars-tabs-active-bg' => '#ffffff',
			'mars-tabs-active-color' => '#616161',
			'mars-btn-primary-top-bg' => '#758b22',
			'mars-btn-primary-bottom-bg' => 'darken(@mars-btn-primary-top-bg, 10%)',
			'mars-btn-primary-hover-bg' => '@mars-btn-primary-bottom-bg',
			'mars-btn-primary-text-color' => '#ffffff',
			'mars-badge-shipping-bg' => '#aabe00',
			'mars-badge-shipping-color' => '#ffffff',
			'mars-price-discount-color' => '#990000',
			'cbax_pseudoprice' => 'percent',
			'mars-step-container-bg' => '#eeeeee',
			'mars-step-container-color' => '#5c5c5c',
			'mars-step-icon-bg' => '#5c5c5c',
			'mars-step-icon-color' => '#ffffff',
			'mars-basket-footer-bg' => '#eeeeee',
			'mars-basket-footer-color' => '#5c5c5c',
			'mars-footer-info-bg' => '#292a29',
			'mars-footer-info-color' => '#616161',
			'mars-footer-main-bg' => '#ffffff',
			'mars-footer-main-color' => '#616161',
			'mars-footer-bottom-bg' => 'darken(@mars-background-bg, 3%)',
			'mars-footer-bottom-color' => '#616161',
			'mars-vote-background-color' => '#f5f5f5'
		));

		$collection->add($set);
	}
}