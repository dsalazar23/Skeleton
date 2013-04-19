/**
 * JQuery Messages and Buttons Plug-in 0.1
 *
 * @author      JpBaena13
 */
;(function($){
    
    //Insertando el CSS en el header del documento
    $('head').append('<link rel="stylesheet" type="text/css" href="/' + 
        WEBROOT_URL + 'js/plugins/untInput/css/untInput.css" media="screen" />')
        
    $.fn.untInputMsg = function(options) {
        return this.each(function() {

            var defaults = {
                content: '',
                title: '',
                type: 'Ok',
            }

            var opts = $.extend(defaults, options)

            var $this = $(this)
            $this.css('display', 'none')
            $this.html('<div class="untMsg">\n\
                              <div class="untMsgIcon"></div>\n\
                              <div class="untMsgWrapper">\n\
                                 <div class="untMsgTitle">' + opts.title + '</div>\n\
                                 <div class="untMsgContent">' + opts.content + '</div>\n\
                              </div>\n\
                          </div>')

            $($this).children('.untMsg').addClass('untMsg' + opts.type);
            $($this).children('.untMsg').css('width', opts.width);
            $($this).children('.untMsg').css('height', opts.height);
            
            // Inserta el tag img si el usuario ingreso una URL de imagen
            if (opts.icon) {
                $this.children('.untMsg').children('.untMsgIcon').html('<img src="' + opts.icon + '"/>')
                $this.children('.untMsg').children('.untMsgIcon').css('display', 'inline-block')
            }
        })
    }

    $.fn.untInputBtn = function(options) {
        return this.each(function(){
            var defaults = {
                content: 'UnNotes Button'
            }

            var opts = $.extend(defaults, options)
            var $this = $(this)

            $this.html('<div class="untBtnIcon"></div>\n\
                        <div class="untBtnContent">' + opts.content + '</div>')

            $this.addClass('untBtn')

             // Inserta el tag img si el usuario ingreso una URL de imagen
            if (opts.icon) {
                $this.children('.untBtnIcon').html('<img src="' + opts.icon + '"/>')
                $this.children('.untBtnIcon').css('display', 'inline-block')
            }

            // Ejecuta la función clic ingresada por el programador.
            if (opts.click) {
                $this.click(function() {
                    opts.click()
                })
            }

        })
    }

    $.untInputWin = function(options, callback) {
        var defaults = {
            title: 'UnNotes',
            content: '',
            params: '',
            header: true,
            footer: true,
            btnCancel: false,
            btnAccept: true,
            onCancel: function() {},
            width: '300',
            height: 'auto',
            clickAccept: function() {
                $('.untWinBG').last().remove()
                $('.untWin').last().remove()
            }
        }

        var opts = $.extend(defaults, options)
        
        if(typeof documentKeydownLoaded == "undefined"){
            documentKeydownLoaded = true
            $(document).keydown(function(e){
                if($('.untWin').length != 0){
                    if (e.which == 27){
                        $('.untWinBG').last().remove()
                        $('.untWin').last().remove()
                    }
                }
            })
        }
        
        //Cargando el contenido dinamicamente si opts.content es una URL
        if (isURL(opts.content)) {
            $.ajax ({
                url: opts.content,
                data: opts.params,
                async: false,
                success: function(data) {
                    if (isURL(data))
                        location.href = data
                    else
                        opts.content = data
                }
            });
        }        

        $('body').append('<div class="untWinBG"></div>\n\
                          <div class="untWin">\n\
                              <div class="untWinHeader">' + opts.title + '</div>\n\
                              <div class="untWinContent">' + opts.content + '</div>\n\
                              <div class="untWinFooter">\n\
                                 <button class="btnWinAccept untBtnSilver"></button>\n\
                                 <button class="btnWinCancel untBtnGold"></button>\n\
                             </div>\n\
                          </div>')
        
        if (!opts.header)
            $('.untWinHeader').last().hide()
        
        if (!opts.footer)
            $('.untWinFooter').last().hide()

        if (!opts.btnAccept)
            $('.btnWinAccept').hide()
        
        if (opts.btnCancel)
            $('.btnWinCancel').last().untInputBtn({
                content: i18n.cancel,
                click: function() {
                    $('.untWinBG').last().remove()
                    $('.untWin').last().remove()
                    
                    if (typeof opts.onCancel == 'function') {
                        opts.onCancel()
                    }
                }
            }).show()

        $('.btnWinAccept').last().untInputBtn({
            content: i18n.accept,
            click: function() {
                var callbackReturn = true
                if (typeof callback == 'function') {
                    callbackReturn = callback($('.untWinContent').last());
                } else if (opts.callback != undefined) {
                    callbackReturn = opts.callback($('.untWinContent').last());
                }
                if (callbackReturn == false) return
                
                opts.clickAccept()
            }
        })
        
        $('.untWin').last().css({
            width: opts.width,
            height: opts.height,
            left: ($(window).width() - $('.untWin').last().outerWidth())/2,
            top: ($(window).height() - $('.untWin').last().outerHeight())/2 + $(window).scrollTop()
        })          
        
        untInputWinCenter()
    }
})(jQuery)

/**
 * Permite centrar un untInputWin
 */
function untInputWinCenter() {
    var wDoc = $(document).width()
    var hDoc = $(document).height()

    $('.untWinBG').last().css({
        width: wDoc,
        height: hDoc
    })

    $('.untWin').last().css({
        left: ($(window).width() - $('.untWin').last().outerWidth())/2,
        top: ($(window).height() - $('.untWin').last().outerHeight())/2 + $(window).scrollTop()
    });
}