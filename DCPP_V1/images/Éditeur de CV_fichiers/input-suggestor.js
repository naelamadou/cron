var visibleSuggestions = {};
var hideAllSuggestors = function () {
  $('.suggestor').hide();
  visibleSuggestions = {};
};
onBodyMousedownriggers.push(hideAllSuggestors);
var addressComponents = [
  'street_number', 'route', 'country', 'country_short',
  'administrative_area_level_1', 'administrative_area_level_1_short', 'administrative_area_level_2', 'administrative_area_level_2_short',
  'locality', 'postal_code', 'point_of_interest', 'latitude', 'longitude'
]
var validateMySuggestion = function ($sugg, inputName, label) {
  $('.thx', $sugg).removeClass('hidden');

  var formInput = $sugg.closest('.form-input')[0];

  var v = label.replace(/ *\([^)]*\) */g, "");
  $('input[name="' + inputName + '"]', formInput).val(v);
  $('input[name="' + inputName + '"]', formInput).effect('highlight');
  $('input[name="' + inputName + '"]', formInput).focus();
  hideAllSuggestors();

}
var cancelMySuggestion = function ($sugg) {
  $('.thx', $sugg).addClass('hidden');
};

var suffixizeInputName = function (inputName, suffix) {
  if (inputName.indexOf(']') > -1) {
    return inputName.substring(0, inputName.length - 1) + "" + suffix + "]"
  } else {
    return inputName + suffix;
  }
}

var bindSuggestor = function (parent) {
  var p = $(parent);
  $('*[suggest="true"]', p).each(function () {
    var type = $(this).attr('suggest-type');
    var lang = $(this).attr('suggest-ln');
    var hiddenName = $(this).attr('suggested-hidden-name');
    var hiddenInitValue = $(this).attr('suggested-hidden-initial-value');
    var $el = $(this);
    var value = $el.val();

    $el.parent().append('<input type="hidden" name="' + hiddenName + '" value="' + hiddenInitValue + '" />');
    if (type === "canonicalPlace") {
      $el.parent().append('<input type="hidden" name="' + suffixizeInputName(hiddenName, '_origin') + '[google_id]" value="' + hiddenInitValue + '" />');
      for (var i in addressComponents) {
        $el.parent().append('<input type="hidden" name="' + suffixizeInputName(hiddenName, '_origin') + '[' + addressComponents[i] + ']" value="" />');
      }
    }

    var suggestorInitialContent = '';
    var $suggestor = $(
      '<div class="suggestor" style="display:none;">' +
      suggestorInitialContent +
      '</div>'
    );
    $suggestor.tmousedown(function (e) {
      e.stopPropagation();
    })
    var suggestorTimeout = null
    var suggestorLastAjaxCall = null
    var makeSuggestion = function () {
      if (suggestorTimeout) {
        clearTimeout(suggestorTimeout);
        if (suggestorLastAjaxCall) {
          suggestorLastAjaxCall.abort();
        }
      }
      visibleSuggestions[type] = true;
      value = $el.val();
      suggestorTimeout = setTimeout(function () {
        suggestorLastAjaxCall = $.ajax({
          url: siteurl + '/ajax/cv/suggestion/' + type + '',
          method: "POST",
          dataType: "json",
          data: {
            value: value,
            lang: lang,
            nb: 10
          },
          success: function (response) {
            var res = response.results;
            $suggestor.empty();
            // $suggestor.append('<h3>' + intl('editor.suggestor.title') + '</h3>');
            var $cancel = $('<a href="javascript:;">' + intl('editor.suggestor.cancel') + '</a>')
            $cancel.click(function () {
              cancelMySuggestion($(this.parentNode.parentNode.parentNode))
            });
            var $thx = $('<div class="thx hidden"></div>');
            var $thxContent = $('<div></div>');
            $thxContent.append($cancel);
            $thx.append($thxContent);
            $suggestor.append($thx);
            $suggestor.data('nbResults', res.length);
            console.log(hiddenInitValue);
            if (res.length > 0) {
              if (visibleSuggestions[type]) {
                $suggestor.show();
              }
              var $list = $(
                '<ul>' +
                '<li>' +
                '<label>' +
                '<input ' +
                'name="' + hiddenName + '_tmp" ' +
                'type="radio" ' +
                'value="0" ' +
                'tabindex="-1" ' +
                'data-is-place="' + (type === "canonicalPlace" ? 1 : 0) + '" ' +
                'checked' +
                '/> ' + intl('editor.cvEditor.nomatch') + '' +
                '</label>' +
                '</li>' +
                res.map(function (v) {
                  return '<li>' +
                    '<label>' +
                    '<input ' +
                    'tabindex="-1" ' +
                    'name="' + hiddenName + '_tmp" ' +
                    'type="radio" ' +
                    'value="' + v.id + '" ' +
                    'data-label="' + v.label + '" ' +
                    'data-place-label="' + (v.minified_label ? v.minified_label : -1) + '" ' +
                    'data-is-place-tool="' + (type == "canonicalPlace" ? response.placeTool : 0) + '" ' +
                    'data-is-place="' + (type == "canonicalPlace" ? 1 : 0) + '" ' +
                    (type == "canonicalPlace" ? ('data-place-geocoding="' + encodeURIComponent(JSON.stringify(v.payload)) + '" ') : '') +
                    '' + ((v.id == hiddenInitValue || (type == "canonicalPlace" && v.gid == hiddenInitValue)) ? 'checked' : '') + ' /> ' + v.label + '' +
                    '</label>' +
                    '</li>'
                }).join('') +
                '</ul>'
              )
              $suggestor.append($list);

              $('input[name="' + hiddenName + '_tmp"]').change(function () {
                var isPlace = $(this).data('is-place');
                var placeTool = $(this).data('is-place-tool');
                var label = $(this).data('label');
                var id = $(this).val();
                if (id != 0) {
                  if (isPlace) {
                    var payloadGeocoding = JSON.parse(decodeURIComponent($(this).data('place-geocoding')));
                    var coordinates = payloadGeocoding.coordinates.split(',');
                    var minifiedLabel = $(this).data('place-label');
                    if (minifiedLabel != -1) {
                      label = minifiedLabel;
                    }
                    $('input[name="' + suffixizeInputName(hiddenName, '_origin') + '[latitude]' + '"]').val(coordinates[0]);
                    $('input[name="' + suffixizeInputName(hiddenName, '_origin') + '[longitude]' + '"]').val(coordinates[1]);
                    $('input[name="' + suffixizeInputName(hiddenName, '_origin') + '[administrative_area_level_1]' + '"]').val(payloadGeocoding.admin1);
                    $('input[name="' + suffixizeInputName(hiddenName, '_origin') + '[country]' + '"]').val(payloadGeocoding.country);
                    $('input[name="' + suffixizeInputName(hiddenName, '_origin') + '[locality]' + '"]').val(payloadGeocoding.city);
                  } else {
                    // id is an id
                    $('input[name="' + hiddenName + '"]').val(id);
                    hiddenInitValue = id;
                  }
                  validateMySuggestion($suggestor, $el.attr('name'), label);
                } else {
                  if (isPlace) {
                    var payloadGeocoding = JSON.parse(decodeURIComponent($(this).data('place-geocoding')));
                    var coordinates = payloadGeocoding.coordinates.split(',');
                    $('input[name="' + suffixizeInputName(hiddenName, '_origin') + '[latitude]' + '"]').val(coordinates[0]);
                    $('input[name="' + suffixizeInputName(hiddenName, '_origin') + '[longitude]' + '"]').val(coordinates[1]);
                    $('input[name="' + suffixizeInputName(hiddenName, '_origin') + '[administrative_area_level_1]' + '"]').val(payloadGeocoding.admin1);
                    $('input[name="' + suffixizeInputName(hiddenName, '_origin') + '[country]' + '"]').val(payloadGeocoding.country);
                    $('input[name="' + suffixizeInputName(hiddenName, '_origin') + '[locality]' + '"]').val(payloadGeocoding.city);
                  } else {
                    $('input[name="' + hiddenName + '"]').val(0);
                  }
                  hiddenInitValue = id;
                }
              });
            } else {
              $suggestor.hide();
            }
          }
        })
      }, 400);
    };
    $(this).keyup(function () {
      makeSuggestion();
      cancelMySuggestion($suggestor);
    });
    var initialized = false;
    $(this).tmousedown(function (e) {
      e.stopPropagation();
    });
    $(this).keydown(function (e) {
      if (e.which === 9) {
        hideAllSuggestors();
      }
    });
    $(this).focus(function () {
      hideAllSuggestors();
      if (!initialized) {
        $el.parent().append($suggestor);
        makeSuggestion();
        initialized = true;
      } else {
        if ($suggestor.data('nbResults') > 0) {
          $suggestor.show();
        }
      }
    });
  })
};

// var skillLanguageTests = {};
var chooseSkillLanguage = function (ln, formId, clearHTML) {
  $.ajax({
    url: siteurl + '/ajax/getSkillLanguageTests',
    method: "POST",
    dataType: "json",
    data: {
      ln: ln
    },
    success: function (response) {
      if (response.success) {
        var $certifs = $('.certifications-select', $('#' + formId));
        $certifs.data('initied', 1);
        if (response.languageTests.length > 0) {
          // console.log('okk', response.languageTests)
          $certifs.html('<option value="0">' + intl('editor.cvEditor.editContent.chooseTest') + '</option>');
          for (var i in response.languageTests) {
            $certifs.append(
              '<option ' +
              'value="' + response.languageTests[i].id + '" ' +
              'data-max-score="' + response.languageTests[i].maxScore + '"' +
              '>' +
              response.languageTests[i].label +
              '</option>'
            );
          }
        }
        if (clearHTML) {
          if (response.languageTests.length > 0) {
            $('.add-certification', $('#' + formId)).show();
            cancelTestScore(formId);
          } else {
            $('.add-certification', $('#' + formId)).hide();
          }
          $('.certifications-inputs').html('');
        }
      }
    }
  })
}
var cancelTestScore = function (formId) {
  $('.add-certification a.add', $('#' + formId)).show();
  $('.add-certification a.cancel', $('#' + formId)).hide();
  $('.add-certification select', $('#' + formId)).hide();
}
var addTestScore = function (formId) {
  $('.add-certification a.add', $('#' + formId)).hide();
  $('.add-certification a.cancel', $('#' + formId)).show();
  if ($('.certifications-select', $('#' + formId)).data('initied') == 0) {
    var ln = $('select[name="skillLabel"]', $('#' + formId)).val();
    chooseSkillLanguage(ln, formId);
  }
  $('.add-certification select', $('#' + formId)).show();
}
var deleteTestScore = function (testId) {
  $('.test-score-' + testId).remove();
}
var prepareTestScoreForm = function (formId) {
  var $certifs = $('.certifications-inputs');
  var test = $('.certifications-select option:selected', $('#' + formId));
  var testVal = test.val();
  var testLabel = test.text();
  var testMaxScore = test.data('max-score');
  if (testVal) {
    if (!$('.test-score-' + testVal + '', $('#' + formId)).length) {
      var $deleteTestScore = $('<a href="javascript:;" class="delete">x</a>');
      $deleteTestScore.click(function () {
        deleteTestScore(testVal);
      })
      var $testScore = $('<div class="test-score test-score-' + testVal + '"></div>');
      $testScore.append($deleteTestScore);
      $testScore.append(testLabel);
      $testScore.append('<div class="score"><input type="number" name="testScores[' + testVal + ']"  min="0" max="' + testMaxScore + '" /> / ' + testMaxScore + '</div>');
      $certifs.append($testScore);
    }
  }
  $('.certifications-select').val(0);
  cancelTestScore(formId);

}


