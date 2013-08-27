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

    $.untInputWin = function(options) {
        var defaults = {
            content: '',
            params: '',
            btnAccept: true,
            btnCancel: false,
            width: 'auto',
            height: 'auto',
            clickCancel: function() { return true; },
            clickAccept: function() { return true; },
            onLoadContent: function() { }
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
                                 <button class="btnWinAccept untBtn">' + i18n.accept + '</button>\n\
                                 <button class="btnWinCancel untBtn">' + i18n.cancel + '</button>\n\
                             </div>\n\
                          </div>')
        
        if (!opts.title)
            $('.untWinHeader').last().hide()

        if (opts.btnAccept) {
            $('.btnWinAccept').last().on('click', function(){
                if (opts.clickAccept() !== false)
                    untInputWinRemove()
            })
        } else {
            $('.btnWinAccept').last().hide()
        }

        if (opts.btnCancel) {
            $('.btnWinCancel').last().on('click', function(){
                if(opts.clickCancel() !== false)
                    untInputWinRemove()
            })
        } else {
            $('.btnWinCancel').last().hide()
        }

        if (!opts.btnAccept && !opts.btnCancel) {
            $('.untWinFooter').last().hide();
        }
        
        $('.untWin').last().css({
            width: opts.width,
            height: opts.height
        })          
        
        untInputWinCenter();
        opts.onLoadContent();
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
})(jQuery);

/**
 * Permite centrar un untInputWin (Acceso público)
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