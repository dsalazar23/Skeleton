/*!
 * JQuery Messages and Buttons Plug-in 0.1
 *
 * @author      JpBaena13
 */
;(function($, undefined) {

    $.fn.untInputMsg = function(options) {
        var defaults = {
            content: '',
            title: '',
            type: 'Ok',
        }

        var opts = $.extend(defaults, options)

        return this.each(function() {

            var $this = $(this)
            $this.css('display', 'none')
            $this.html('<div class="untMsg">\n\
                              <div class="untMsgIcon"></div>\n\
                              <div class="untMsgWrapper">\n\
                                 <div class="untMsgTitle">' + opts.title + '</div>\n\
                                 <div class="untMsgContent">' + opts.content + '</div>\n\
                              </div>\n\
                          </div>')

            var children = $this.children('.untMsg')

            children
                .addClass('untMsg' + opts.type)
                .css('width', opts.width)
                .css('height', opts.height);
            
            // Inserta el tag img si el usuario ingreso una URL de imagen
            if (opts.icon) {
                children.children('.untMsgIcon')
                    .html('<img src="' + opts.icon + '"/>')
                    .css('display', 'inline-block')
            }
        });
    }

    $.fn.untInputBtn = function(options) {
        var defaults = {
            content: 'Button'
        }

        var opts = $.extend(defaults, options)

        return this.each(function() {
            var $this = $(this)

            $this.html('<div class="untBtnIcon"></div>\n\
                        <div class="untBtnContent">' + opts.content + '</div>')

            $this.addClass('untBtn')

             // Inserta el tag img si el usuario ingreso una URL de imagen
            if (opts.icon) {
                $this.children('.untBtnIcon')
                    .html('<img src="' + opts.icon + '"/>')
                    .css('display', 'inline-block')
            }

            // Ejecuta la función clic ingresada por el programador.
            if (opts.click) {
                $this.click(function() {
                    opts.click()
                })
            }
        });
    }

    $.untInputWin = function(options) {
        var defaults = {
            content: '',
            params: '',
            btnCancel: false,
            width: '300',
            height: 'auto',
            clickCancel: function() {},
            clickAccept: function() {}
        }

        if (typeof(options) != 'object')
            options = {content: options}

        var opts = $.extend(defaults, options)
        
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
        
        if (!opts.title)
            $('.untWinHeader').last().hide()

        $('.btnWinAccept').last().untInputBtn({
            content: i18n.accept,
            click: function() {                
                opts.clickAccept()
                untInputWinRemove()
            }
        });

        if (opts.btnCancel) {
            $('.btnWinCancel').last().untInputBtn({
                content: i18n.cancel,
                click: function() {
                    opts.clickCancel()
                    untInputWinRemove()
                }
            }).show()
        }
        
        $('.untWin').last().css({
            width: opts.width,
            height: opts.height
        })          
        
        untInputWinCenter()
    }

    // --- Eventos de cambio de pantalla y tecla presionada
    $(window).on('resize', function() {
        untInputWinCenter()
    })

    $(document).on('keydown', function(e) {
        if (e.which == 27) {
            if($('.untWin').length != 0) {
                untInputWinRemove()
            }
        }
    });

    /**
     * Borrar los elementos de una ventana
     */
    function untInputWinRemove() {
        var win = $('.untWin').last()

        win.css({ top: -win.outerHeight() });

        if(!Modernizr.csstransitions) { 
            $('.untWinBG').last().remove()
            win.remove()
            return
        }

        setTimeout(function() {
            $('.untWinBG').last().remove()
            win.remove()
        }, 1000)
    }
})(jQuery)

/**
 * Permite centrar un untInputWin (Acceso público)
 */
function untInputWinCenter() {
    var wDoc = $(document).width()
    var hDoc = $(document).height()

    $('.untWinBG').css({
        width: wDoc,
        height: hDoc
    })

    $('.untWin').css({
        left: ($(window).width() - $('.untWin').last().outerWidth())/2,
        top: ($(window).height() - $('.untWin').last().outerHeight())/2 + $(window).scrollTop()
    });
}