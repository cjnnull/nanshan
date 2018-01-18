;(function ($) {
    $.fn.sliderPlay = function (options) {
        var defaults = {
            btnBox: 'btnBox', //按钮的容器,
            btnCurClassName: 'cur', //选中按钮的className,
            direction: 'left', //支持left , up
            mouseEvent: 'click', //事件类型，支持是click ,hover
            speed: 600, //动画效果持续时间 ms
            timeout: 5000//幻灯间隔时间 ms
        };

        var options = $.extend(defaults, options);
        var oSlider = $(this),
            oContainer = oSlider.find('ul'),
            firstLi = oContainer.find('li').first(),
            aBtn = $('#' + options.btnBox).children(),
            nextBtn = $('#' + options.nextBtn),
            oImg = oContainer.find('img'),
            _n = oImg.length,
            _w = oImg.first().outerWidth(),
            _h = oImg.first().outerHeight(),
            _timer = null,
            _iNow = 0,
            _index = 0,
            _flag = true;
        var isMoving = false;
        var lastScrollValue = $(window).scrollTop();

        var play = {
            
            bindScroll: function () {
                $(window).scroll(function (event) {
                    var top = $(window).scrollTop();
                    console.log(top);
                    // 下翻
                    if (top > lastScrollValue) {
                        if (top < 100) { 
                            if (_iNow != _n-1) {
                                if (isMoving) {
                                    return;
                                }
                                console.log('move');
                                _iNow = _index = _iNow + 1;
                                clearInterval(_timer);
                                play.move();
                                _timer = setInterval(play.tabChange, options.timeout);
                                $(window).scrollTop(0);
                            }
                        }
                    }
                    lastScrollValue = top;
                    event.preventDefault();
                    return false;
                });
            },
            init: function () {
                this.move();
                this.setCss();
                _timer = setInterval(play.tabChange, options.timeout);
                play.addEvent(options.mouseEvent);
                console.log('t890879');
                //play.bindScroll();
                this.pause();
            },
            setCss: function () {
                switch (options.direction) {
                    case 'left':
                        oContainer.css('width', _w * _n + 'px');
                        break;
                    case 'top':
                        oContainer.css('height', _n * _h + 'px');
                        break;
                }
                ;
            },
            move: function () {
                oContainer.stop(true);
                aBtn.removeClass(options.btnCurClassName).eq(_index).addClass(options.btnCurClassName);

                if (options.direction == 'left') {
                    oContainer.animate({left: -_w * _iNow + 'px'}, options.speed, function () {
                        if (!_flag) {
                            firstLi.css({position: 'static', left: 0})
                            oContainer.css('left', 0)
                            _iNow = 0;
                            _flag = true;
                        }
                    });
                }
                else {
                    isMoving = true;
                    oContainer.animate({top: -_h * _iNow + 'px'}, options.speed, function () {
                        if (!_flag) {
                            firstLi.css({position: 'static', top: 0})
                            oContainer.css('top', 0)
                            _iNow = 0;
                            _flag = true;
                        }

                        isMoving = false;
                    });
                }
            },
            tabChange: function () {
                _iNow++;
                _index++;
                if (_iNow == _n) {
                    _index = 0;
                    options.direction == 'left' ? firstLi.css({
                        position: 'relative',
                        left: _n * _w
                    }) : firstLi.css({position: 'relative', top: _n * _h})
                    _flag = false;
                }
                ;
                play.move();
            },
            addEvent: function (type) {

                nextBtn.click(function() {
                    if (_iNow == (_n-1)) {
                        _iNow = _index = 0;
                    } else {
                        _iNow = _index = _iNow+1;
                    }
                    clearInterval(_timer);
                    play.move();
                    _timer = setInterval(play.tabChange, options.timeout);
                });
                
                switch (type) {
                    case 'click' :
                        aBtn.click(function () {
                            if (_iNow == $(this).index())return;
                            _iNow = _index = $(this).index();
                            clearInterval(_timer);
                            play.move();
                            _timer = setInterval(play.tabChange, options.timeout);
                        })
                        break;
                    case 'hover' :
                        aBtn.hover(function () {
                            _iNow = _index = $(this).index();
                            clearInterval(_timer);
                            play.move();
                        }, function () {
                            _timer = setInterval(play.tabChange, options.timeout);
                        })
                }
            },
            pause: function () {
                oContainer.hover(function () {
                    clearInterval(_timer);
                }, function () {
                    _timer = setInterval(play.tabChange, options.timeout);
                });
            }
        }
        play.init();
    }
})(jQuery);
