/**
 * Javascript del index principal del sitio
 *
 * @package     webroot
 * @subpackage  js
 * @author      JpBaena13
 */

// Mostrando mensajes de error
 if (getUrlVars()['error'] != undefined) {
    $('.untPlgMsg').untInputMsg({
        title: i18n.errAuth,
        content: i18n.errUserPassLogin,
        type: 'Err'
    }).show();
}