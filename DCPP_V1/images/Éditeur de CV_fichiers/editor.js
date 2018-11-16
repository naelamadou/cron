var showVariants = function () {
  $('.left-menus .language').addClass('visible');
}
$(document).ready(function () {
  $('.left-menus .language').click(function () {
    showVariants();
  })
})
var hideVariants = function (e) {
  if ($(e.target).closest("ul.left-menus").length == 0) {
    $('.left-menus .language').removeClass('visible');
  }
}
onBodyMousedownriggers.push(hideVariants);


var showObjects = function () {
  $('.left-menus .current-object').addClass('visible');
}
$(document).ready(function () {
  $('.left-menus .current-object').click(function () {
    showObjects();
  })
})
var hideObjects = function (e) {
  if ($(e.target).closest("ul.left-menus").length == 0) {
    $('.left-menus .current-object').removeClass('visible');
  }
}
onBodyMousedownriggers.push(hideObjects);


var setLetterCreated = function (response) {
  window.location = response.letterEditorURL;
};

var setCVCreated = function (response) {
  window.location = response.cvEditorURL;
};

var runTutorial = function (tutorial) {

  var intro = introJs();
  intro.setOptions(Object.assign(introjsIntl, {
    steps: tutorial
  }));
  intro.start();

}

var windowHeight = $(window).height();
var windowWidth = $(window).width();

var rightOffiset = function ($whatever) {
  return ($(window).width() - ($whatever.offset().left + $whatever.outerWidth()));
}

var alreadyLoadedStaticsOnce = false;
var loadTheStatics = function () {

  var maxStaticHeight = false;
  var minOffsetY = false;

  $('.static:not(.binded)').each(function () {

    var $static = $(this);

    var alignedRight = $static.hasClass('rightalign');

    $(this).addClass('binded');

    var originalLeft = $(this).offset().left;
    var originalRight = rightOffiset($(this));
    var relativeOriginalLeft = originalLeft - $(this).parent().offset().left;
    var relativeOriginalRight = originalRight - rightOffiset($(this).parent());

    var scrollToFixedTop = function () {
    };

    var resizing = false;
    $(window).resize(function () {
      windowWidth = $(window).width();
      if (resizing) {
        clearTimeout(resizing);
        resizing = false;
      }
      resizing = setTimeout(function () {
        if ($static.hasClass('follow')) {
          $static.removeClass('follow');
          $static.attr('style', '');
          alignedRight && $static.css('right', relativeOriginalRight);
          !alignedRight && $static.css('left', relativeOriginalLeft);
          staticTop = $static.offset().top;
        }
        setTimeout(function () {
          originalLeft = $static.offset().left;
          relativeOriginalLeft = originalLeft - $static.parent().offset().left;
          originalRight = rightOffiset($static);
          relativeOriginalRight = originalRight - rightOffiset($static.parent());

          if (windowWidth > 1275) {
            if ($static.attr('id') === "cvOptionsHTML") {
              $('#cvOptionsHTML .html').show();
            }
          }

          scrollToFixedTop();
        }, 50);

        resizing = false;
      }, 300);
    });

    var staticHeight = $static.outerHeight();
    var staticTop = null;
    var documentHeight = null;
    var currentScrollTop = $(window).scrollTop();

    var property = $static.hasClass('margintop') ? 'margin-top' : 'top';
    var topOffset = $static.data('offset-y');
    var preventUnder = $static.data('preventUnder');
    var heightScrollLimit = $static.data('offset-scroll-height');

    minOffsetY = !minOffsetY || topOffset < minOffsetY ? topOffset : minOffsetY;
    maxStaticHeight = !maxStaticHeight || staticHeight > maxStaticHeight ? staticHeight : maxStaticHeight;

    scrollToFixedTop = function () {
      if (staticTop === null || documentHeight === null) {
        staticTop = $static.offset().top;
        documentHeight = $(document).height();
      }
      if ($static.data('offset-y') !== topOffset) {
        topOffset = $static.data('offset-y');
        minOffsetY = !minOffsetY || topOffset < minOffsetY ? topOffset : minOffsetY;
      }
      if ((!preventUnder || windowWidth > preventUnder) && currentScrollTop >= staticTop - topOffset) {
        if (currentScrollTop <= documentHeight - windowHeight) {
          var t = topOffset
          if (!$static.hasClass('follow')) {
            $static.addClass('follow');
          }
          if (property === 'top') {
            alignedRight && $static.css('right', originalRight);
            !alignedRight && $static.css('left', originalLeft);
            // console.log('ooo', originalRight);
            if (currentScrollTop > staticTop + heightScrollLimit) {
              t = topOffset + staticTop + heightScrollLimit - currentScrollTop;
            }
            $static.css('top', t);
          }
        }
      } else {
        if ($static.hasClass('follow')) {
          $static.removeClass('follow');
          $static.attr('style', '');
          alignedRight && $static.css('right', relativeOriginalRight);
          !alignedRight && $static.css('left', relativeOriginalLeft);
        }
      }
    };

    if (alreadyLoadedStaticsOnce) {
      scrollToFixedTop();
    }
    $(window).scroll(function () {
      currentScrollTop = $(window).scrollTop();
      scrollToFixedTop();
    });

  });

  alreadyLoadedStaticsOnce = true;
};

