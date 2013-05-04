/**
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

        return this.each(function() {
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

        return this.each(function() {
            var opts = $.extend(defaults, options)
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
            title: i18n.alert,
            content: '',
            params: '',
            header: true,
            footer: true,
            btnCancel: false,
            btnAccept: true,
            width: '300',
            height: 'auto',
            clickCancel: function() {},
            clickAccept: function() {}
        }

        var opts = $.extend(defaults, options)
        
        // Cierra la ventana con la tecla ESC
        if(typeof documentKeydownLoaded == "undefined") {
            documentKeydownLoaded = true
            $(document).keydown(function(e){
                if($('.untWin').length != 0){
                    if (e.which == 27){
                        untInputWinRemove()
                    }
                }
            });
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
            $('.btnWinAccept').last().hide()
        
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
            height: opts.height,
            left: -$('.untWin').last().outerWidth(),
            top: ($(window).height() - $('.untWin').last().outerHeight())/2 + $(window).scrollTop(),
        })          
        
        untInputWinCenter()
    }
})(jQuery)


$(window).on('resize', function() {
    untInputWinCenter()
})

/**
 * Permite centrar un untInputWin
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
        top: ($(window).height() - $('.untWin').last().outerHeight())/2 + $(window).scrollTop(),
        transition: 'all 1s ease'
    });
}

/**
 * Permite esconder la última ventana
 */
function untInputWinHide() {
    $('.untWin').last().css({
        top: -$('.untWin').last().outerHeight()
    });
}

/**
 * Borrar los elementos de una ventana
 */
function untInputWinRemove() {
    untInputWinHide()

    setTimeout(function() {
        $('.untWinBG').last().remove()
        $('.untWin').last().remove()
    }, 1000)
}