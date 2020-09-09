{* Copyright in the footer *}
{block name='frontend_index_footer_info'}
    <div class="footer--info-content {$theme.cbax_payment_and_shipping_position}">
        {block name='frontend_index_footer_info_inner'}
            <div class="footer--payment-content">
                {if $theme.cbax_icon_amazon_payment}
                    <img src="{s name='MarsIconAmazonPayment'}{link file='frontend/_public/src/img/payment/'}amazon-pay_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltAmazonPayment'}Amazon Payments{/s}" title="{s name='MarsAltAmazonPayment'}Amazon Payments{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_american_express}
                    <img src="{s name='MarsIconAmericanExpress'}{link file='frontend/_public/src/img/payment/'}american-express_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltAmericanExpress'}American Express{/s}" title="{s name='MarsAltAmericanExpress'}American Express{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_barzahlung}
                    <img src="{s name='MarsIconBarzahlung'}{link file='frontend/_public/src/img/payment/'}barzahlung_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltBarzahlung'}Barzahlung{/s}" title="{s name='MarsAltBarzahlung'}Barzahlung{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_billpay}
                    <img src="{s name='MarsIconBillpay'}{link file='frontend/_public/src/img/payment/'}billpay_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltBillpay'}Billpay{/s}" title="{s name='MarsAltBillpay'}Billpay{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_billsave}
                    <img src="{s name='MarsIconBillsave'}{link file='frontend/_public/src/img/payment/'}billsave_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltBillsave'}Billsave{/s}" alt="{s name='MarsAltBillsave'}Billsave{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_clickandbuy}
                    <img src="{s name='MarsIconClickandbuy'}{link file='frontend/_public/src/img/payment/'}clickandbuy_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltClickandbuy'}Clickandbuy{/s}" title="{s name='MarsAltClickandbuy'}Clickandbuy{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_discover}
                    <img src="{s name='MarsIconDiscover'}{link file='frontend/_public/src/img/payment/'}discover_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltDiscover'}Discover{/s}" title="{s name='MarsAltDiscover'}Discover{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_ec_cash}
                    <img src="{s name='MarsIconECCash'}{link file='frontend/_public/src/img/payment/'}ec-cash_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltECCash'}ECCash{/s}" title="{s name='MarsAltECCash'}ECCash{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_girocard}
                    <img src="{s name='MarsIconGirocard'}{link file='frontend/_public/src/img/payment/'}girocard_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltGirocard'}Girocard{/s}" title="{s name='MarsAltGirocard'}Girocard{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_giropay}
                    <img src="{s name='MarsIconGiropay'}{link file='frontend/_public/src/img/payment/'}giropay_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltGiropay'}Giropay{/s}" title="{s name='MarsAltGiropay'}Giropay{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_ideal}
                    <img src="{s name='MarsIconIdeal'}{link file='frontend/_public/src/img/payment/'}ideal_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltIdeal'}Ideal{/s}" title="{s name='MarsAltIdeal'}Ideal{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_klarna}
                    <img src="{s name='MarsIconKlarna'}{link file='frontend/_public/src/img/payment/'}klarna_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltKlarna'}Klarna{/s}" titel="{s name='MarsAltKlarna'}Klarna{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_lastschrift}
                    <img src="{s name='MarsIconLastschrift'}{link file='frontend/_public/src/img/payment/'}lastschrift_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltLastschrift'}Lastschrift{/s}" title="{s name='MarsAltLastschrift'}Lastschrift{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_maestro}
                    <img src="{s name='MarsIconMaestro'}{link file='frontend/_public/src/img/payment/'}maestro_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltMaestro'}Maestro{/s}" title="{s name='MarsAltMaestro'}Maestro{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_mastercard}
                    <img src="{s name='MarsIconMastercard'}{link file='frontend/_public/src/img/payment/'}mastercard_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltMastercard'}Mastercard{/s}" title="{s name='MarsAltMastercard'}Mastercard{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_nachnahme}
                    <img src="{s name='MarsIconNachnahme'}{link file='frontend/_public/src/img/payment/'}nachnahme_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltNachnahme'}Nachnahme{/s}" title="{s name='MarsAltNachnahme'}Nachnahme{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_paymorrow}
                    <img src="{s name='MarsIconPaymorrow'}{link file='frontend/_public/src/img/payment/'}paymorrow_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltPaymorrow'}Paymorrow{/s}" title="{s name='MarsAltPaymorrow'}Paymorrow{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_paypal}
                    <img src="{s name='MarsIconPaypal'}{link file='frontend/_public/src/img/payment/'}paypal_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltPaypal'}Paypal{/s}" title="{s name='MarsAltPaypal'}Paypal{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_invoice}
                    <img src="{s name='MarsIconRechnung'}{link file='frontend/_public/src/img/payment/'}invoice_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltRechnung'}Rechnung{/s}" title="{s name='MarsAltRechnung'}Rechnung{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_santander}
                    <img src="{s name='MarsIconSantander'}{link file='frontend/_public/src/img/payment/'}santander_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltSantander'}Santander{/s}" title="{s name='MarsAltSantander'}Santander{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_sepa}
                    <img src="{s name='MarsIconSEPA'}{link file='frontend/_public/src/img/payment/'}sepa_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltSEPA'}SEPA{/s}" title="{s name='MarsAltSEPA'}SEPA{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_skill}
                    <img src="{s name='MarsIconSkrill'}{link file='frontend/_public/src/img/payment/'}skrill_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltSkrill'}Skrill{/s}" title="{s name='MarsAltSkrill'}Skrill{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_sofort}
                    <img src="{s name='MarsIconSofort'}{link file='frontend/_public/src/img/payment/'}sofortuberweisung_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltSofort'}Sofortüberweisung{/s}" title="{s name='MarsAltSofort'}Sofortüberweisung{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_visa}
                    <img src="{s name='MarsIconVisa'}{link file='frontend/_public/src/img/payment/'}visa_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltVisa'}Visa{/s}" title="{s name='MarsAltVisa'}Visa{/s}" class="icon-payment-footer" />
                {/if}
                {if $theme.cbax_icon_vorkasse}
                    <img src="{s name='MarsIconVorkasse'}{link file='frontend/_public/src/img/payment/'}vorkasse_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltVorkasse'}Vorkasse{/s}" title="{s name='MarsAltVorkasse'}Vorkasse{/s}" class="icon-payment-footer" />
                {/if}
            </div>
            <div class="footer--shipping-content">
                {if $theme.cbax_icon_post_shipping}
                    <img src="{s name='MarsIconDeutschePost'}{link file='frontend/_public/src/img/shipping/'}deutsche-post_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltDeutschePost'}Deutsche Post{/s}" titel="{s name='MarsAltDeutschePost'}Deutsche Post{/s}" class="icon-shipping-footer" />
                {/if}
                {if $theme.cbax_icon_dhl_shipping}
                    <img src="{s name='MarsIconDHL'}{link file='frontend/_public/src/img/shipping/'}dhl_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltDHL'}DHL{/s}" titel="{s name='MarsAltDHL'}DHL{/s}" class="icon-shipping-footer" />
                {/if}
                {if $theme.cbax_icon_dhl_express_shipping}
                    <img src="{s name='MarsIconDHLExpress'}{link file='frontend/_public/src/img/shipping/'}dhl-express_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltDHLExpress'}DHL Express{/s}" titel="{s name='MarsAltDHLExpress'}DHL Express{/s}" class="icon-shipping-footer" />
                {/if}
                {if $theme.cbax_icon_dhl_packstation_shipping}
                    <img src="{s name='MarsIconDHLPackstation'}{link file='frontend/_public/src/img/shipping/'}dhl-packstation_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltDHLPackstation'}DHL Packstation{/s}" titel="{s name='MarsAltDHLPackstation'}DHL Packstation{/s}" class="icon-shipping-footer" />
                {/if}
                {if $theme.cbax_icon_dpd_shipping}
                    <img src="{s name='MarsIconDPD'}{link file='frontend/_public/src/img/shipping/'}dpd_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltDPD'}DPD{/s}" titel="{s name='MarsAltDPD'}DPD{/s}" class="icon-shipping-footer" />
                {/if}
                {if $theme.cbax_icon_fedex_shipping}
                    <img src="{s name='MarsIconFedex'}{link file='frontend/_public/src/img/shipping/'}fedex_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltFedex'}Fedex{/s}" titel="{s name='MarsAltFedex'}Fedex{/s}" class="icon-shipping-footer" />
                {/if}
                {if $theme.cbax_icon_gls_shipping}
                    <img src="{s name='MarsIconGLS'}{link file='frontend/_public/src/img/shipping/'}gls_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltGLS'}GLS{/s}" titel="{s name='MarsAltGLS'}GLS{/s}" class="icon-shipping-footer" />
                {/if}
                {if $theme.cbax_icon_hermes_shipping}
                    <img src="{s name='MarsIconHERMES'}{link file='frontend/_public/src/img/shipping/'}hermes_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltHERMES'}HERMES{/s}" titel="{s name='MarsAltHERMES'}HERMES{/s}" class="icon-shipping-footer" />
                {/if}
                {if $theme.cbax_icon_pin_shipping}
                    <img src="{s name='MarsIconPIN'}{link file='frontend/_public/src/img/shipping/'}pin_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltPIN'}PIN{/s}" titel="{s name='MarsAltPIN'}PIN{/s}" class="icon-shipping-footer" />
                {/if}
                {if $theme.cbax_icon_sebstabholung_shipping}
                    <img src="{s name='MarsIconSelbstabholung'}{link file='frontend/_public/src/img/shipping/'}selbstabholung_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltSelbstabholung'}Selbstabholung{/s}" titel="{s name='MarsAltSelbstabholung'}Selbstabholung{/s}" class="icon-shipping-footer" />
                {/if}
                {if $theme.cbax_icon_spedition_shipping}
                    <img src="{s name='MarsIconSpedition'}{link file='frontend/_public/src/img/shipping/'}spedition_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltSpedition'}Spedition{/s}" titel="{s name='MarsAltSpedition'}Spedition{/s}" class="icon-shipping-footer" />
                {/if}
                {if $theme.cbax_icon_tnt_shipping}
                    <img src="{s name='MarsIconTNT'}{link file='frontend/_public/src/img/shipping/'}tnt_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltTNT'}TNT{/s}" titel="{s name='MarsAltTNT'}TNT{/s}" class="icon-shipping-footer" />
                {/if}
                {if $theme.cbax_icon_ups_shipping}
                    <img src="{s name='MarsIconUPS'}{link file='frontend/_public/src/img/shipping/'}ups_{$theme.cbax_payment_and_shipping_type}.png{/s}" alt="{s name='MarsAltUPS'}UPS{/s}" titel="{s name='MarsAltUPS'}UPS{/s}" class="icon-shipping-footer" />
                {/if}
            </div>
        {/block}
    </div>
{/block}
