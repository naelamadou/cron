/**
 *
 * Requires :
 *  vars :
 *    - startTutorial
 *    - assetsurl
 *    - cvId
 *    - cv_destination_country
 *    - currentCvPhotoOrientation
 *    - prevNextShown
 *    - forceSortAll
 *    - currentTemplateId
 *    - max_file_size
 *    - client_language = {{ ( CURRENT_LANG | split('_') )[0] }}
 *    - cvLocked
 *
 *    - cv_get_thumb_relative_URL = "{{ "Site:cvGetThumb" | route2url({cvId: cvVariant.getId}) }}"
 *    - cv_add_driving_license_URL = "{{ "Site: ajaxCVAddDrivingLicense" | route2url({cvId: cvVariant.getId}) }}"
 *    - cv_remove_driving_license_URL = "{{ "Site:ajaxCVRemoveDrivingLicense" | route2url({cvId: cvVariant.getId, informationId: ""}) }}"
 *    - cv_set_marital_status = "{{ "Site: ajaxCVSetMaritalStatus" | route2url({cvId: cvVariant.getId}) }}"
 *    - cv_set_nationality = "{{ "Site: ajaxCVSetNationality" | route2url({cvId: cvVariant.getId}) }}"
 *    - cv_remove_mobility = "Site: ajaxCVRemoveMobility" | route2url({cvId: cvVariant.getId, informationId: ""}) }}"
 *    - cv_block_add_image_URL = "{{ "Site:ajaxCVBlockAddImage" | route2url({cvId: cvVariant.getId}) }}"
 *    - cv_remove_address = "{{ "Site: ajaxCVRemoveAddress" | route2url({cvId: cvVariant.getId, informationId: ""}) }}"
 *
 */

var isAdvancedUpload = function () {
  var div = document.createElement('div');
  return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
}();

var bindAjaxPhotoForm = function ($form, cbOnComplete, cbOnStart, cbOnError) {

  var $input = $form.find('input[type="file"]'),
    droppedFiles = false;

  $input.on('change', function (e) {
    $form.trigger('submit');
  });

  if (isAdvancedUpload) {
    $form
      .addClass('has-advanced-upload') // letting the CSS part to know drag&drop is supported by the browser
      .on('drag dragstart dragend dragover dragenter dragleave drop', function (e) {
        // preventing the unwanted behaviours
        e.preventDefault();
        e.stopPropagation();
      })
      .on('dragover dragenter', function () //
      {
        $form.addClass('is-dragover');
      })
      .on('dragleave dragend drop', function () {
        $form.removeClass('is-dragover');
      })
      .on('drop', function (e) {
        droppedFiles = e.originalEvent.dataTransfer.files; // the files that were dropped
        $form.trigger('submit'); // automatically submit the form on file drop
      });
  } else {
    $form
      .on('drag dragstart dragend dragover dragenter dragleave drop', function (e) {
        // preventing the unwanted behaviours
        e.preventDefault();
        e.stopPropagation();
      })
      .on('dragover dragenter', function () //
      {
        $form.addClass('is-dragover');
      })
      .on('dragleave dragend drop', function () {
        $form.removeClass('is-dragover');
      })
      .on('drop', function (e) {
        $('input[type="submit"]', $form).trigger('click');
      });
  }


  $form.on('submit', function (e) {

    // preventing the duplicate submissions if the current one is in progress
    if ($form.hasClass('is-uploading')) return false;

    $form.addClass('is-uploading'); // .removeClass( 'is-error' );

    cbOnStart && cbOnStart();

    if (isAdvancedUpload) // ajax file upload for modern browsers
    {
      e.preventDefault();

      var ajaxData = new FormData($form.get(0));
      if (droppedFiles) {
        $.each(droppedFiles, function (i, file) {
          ajaxData.set($input.attr('name'), file);
        });
      }

      $.ajax(
        {
          url: $form.attr('action'),
          type: $form.attr('method'),
          data: ajaxData,
          dataType: 'json',
          cache: false,
          contentType: false,
          processData: false,
          complete: function () {
            $form.removeClass('is-uploading');
          },
          error: function (xhr, status) {
            cbOnError && cbOnError(xhr, status);
            $form.removeClass('is-uploading');
          },
          success: function (data) {
            // $form.addClass( data.success == true ? 'is-success' : 'is-error' );
            cbOnComplete && cbOnComplete(data);
            $form[0].reset();
            droppedFiles = null;
          }
        });
    }
    else // fallback Ajax solution upload for older browsers
    {
      var iframeName = 'uploadiframe' + new Date().getTime(),
        $iframe = $('<iframe name="' + iframeName + '" style="display: none;"></iframe>');

      $('body').append($iframe);
      $form.attr('target', iframeName);

      $iframe.one('load', function () {
        var data = $.parseJSON($iframe.contents().find('body').text());
        $form.removeClass('is-uploading').removeAttr('target'); // .addClass( data.success == true ? 'is-success' : 'is-error' )

        cbOnComplete && cbOnComplete(data);
        $form[0].reset();
        droppedFiles = null;

        $iframe.remove();
      });
    }
  });

  // Firefox focus bug fix for file input
  $input
    .on('focus', function () {
      $input.addClass('has-focus');
    })
    .on('blur', function () {
      $input.removeClass('has-focus');
    });

};

/**
 *
 *
 *
 */

var newVariantLoaded = false;
var newVariantActionCb = function () {
  if (newVariantLoaded) return;
  newVariantLoaded = true;
  $('select.select2.sl2init').select2({});
};

var optionsLoaded = false;
var optionsLoadedActionCb = function () {
  if (optionsLoaded) return;
  optionsLoaded = true;
  $('#updateMyInformation select.select2').select2({});

  $('.nav-tabs a').on('click', function (event) {
    event.preventDefault();
    $('.nav-item').removeClass('active');
    $(this).parent().addClass('active');
    $('.tab-pane').removeClass('in active');
    $('' + $(this).parent().prevObject[0].hash).addClass('in active');
  });
};

var fixedPhone = $(".phone");
var mobilePhone = $(".mobilePhone");
fixedPhone.intlTelInput({
  preferredCountries: [cv_destination_country],
  placeholderNumberType: "FIXED_LINE",
  initialCountry: cv_destination_country,
  utilsScript: assetsurl + "/libs/intltelinput/utils.js"
});
fixedPhone.change(function () {
  var info = $(this).intlTelInput("getSelectedCountryData");
  var pname = $(this).attr('name').replace('[number]', '[prefix]');
  $('input[name="' + pname + '"]').val(info.dialCode);
});
mobilePhone.intlTelInput({
  preferredCountries: [cv_destination_country],
  placeholderNumberType: "MOBILE",
  initialCountry: cv_destination_country,
  utilsScript: assetsurl + "/libs/intltelinput/utils.js"
});
mobilePhone.change(function () {
  var info = $(this).intlTelInput("getSelectedCountryData");
  var pname = $(this).attr('name').replace('[number]', '[prefix]');
  $('input[name="' + pname + '"]').val(info.dialCode);
});

function startMultipageTutorial() {
  var intro = introJs();
  intro.setOptions(Object.assign(introjsIntl, {
    showStepNumbers: false,
    disableInteraction: true,
    scrollToElement: false,
    steps: [
      {
        intro: intl("tutorial.multipage.step1"),
        tooltipClass: 'fixed',
      },
      {
        element: document.querySelector('#addBlock'),
        intro: intl("tutorial.multipage.step2"),
        position: 'right'
      }
    ]
  }));
  intro.start();
}

function startIntro() {
  var intro = introJs();
  intro.setOptions(Object.assign(introjsIntl, {
    scrollTo: 'tooltip',
    disableInteraction: true,
    steps: [
      {
        intro: intl("tutorial.step1")
      },
      {
        element: document.querySelector('.cv-page .cv-container .cv-block'),
        intro: intl("tutorial.step2"),
        position: 'top'
      },
      {
        element: document.querySelector('#cvTemplatesOptions > a:first-of-type'),
        intro: intl("tutorial.step3"),
        position: 'right'
      },
      {
        element: document.querySelector('#cvOptionsHTML'),
        intro: intl("tutorial.step4"),
        position: 'left'
      },
      {
        element: document.querySelector('.cvdr-buttons:not(.deleteZone)'),
        intro: intl("tutorial.step5"),
        position: 'bottom'
      }
    ]
  }));
  intro.start();
}

var unlockedAction = function (response, unlockingSuccess) {
  if (response.success) {

    var $el = $('.template[action-associated="' + response.actionName + '"]');
    if ($el.length) {
      $('.unlock-zone', $el).html("<span>" + intl('editor.templates.unlocked') + "</span>");
      $el.attr('is-locked', 0);
      getCurrentCV && getCurrentCV();
    }

    unlockingSuccess && unlockingSuccess();

  } else {
    if (response.tutorialReason) {
      runTutorial(response.tutorialReason)
    } else {
      handleError(response.reason)
    }
  }
}

var startUnlockingAction = function (actionName, fromObjectType, fromObjectId, cbSuccessUnlocked) {

  requestPOST('/ajax/unlocking/getFormOrExecute', function (json) {
      if (json.success) {
        if (json.formHTML) {
          var $unlockForm = $(json.formHTML)
          feedOverlay($unlockForm)
          bindAjaxForm('#unlockActionForm', function (response) {
            unlockedAction(response, cbSuccessUnlocked)
          })
        } else {
          unlockedAction(json.executeResponse, cbSuccessUnlocked)
        }
      }
    },
    {
      actionName: actionName,
      fromObjectType: fromObjectType,
      fromObjectId: fromObjectId
    }
  );

}

var openUnlockingTutorial = function (actionToUnlock, cvId, cbSuccessUnlocked) {
  startUnlockingAction(actionToUnlock, 'CV', cvId, cbSuccessUnlocked);
}

var filterTemplates = function (searchQuery) {
  if (searchQuery) {
    $('#cvTemplatesOptions a.search').addClass('searching');
    $('.template').hide();
    $('.template').each(function () {
      var templateName = $(this).data('template-name');
      if (templateName.toLowerCase().indexOf(searchQuery.toLowerCase()) > -1) {
        $(this).show();
      }
    })
  } else {
    $('#cvTemplatesOptions a.search').removeClass('searching');
    $('.template').show();
  }
}
var toggleSearchTemplate = function () {
  $('#cvTemplatesSearch').toggle();
  if ($('#cvTemplatesSearch').is(':visible')) {
    $('#cvTemplatesSearch input').focus();
  }
}
var hideSearchTemplate = function () {
  $('#cvTemplatesSearch').hide();
}
var hideCvTemplates = function () {
  $('#cvTemplates').addClass('hideTemplates');
  $('#cvTemplatesOptions').addClass('hideTemplates');
  $('#bg-overlay').removeClass('visible');
  $('.site-wrapper').removeClass('blurred');
}
var showCvTemplates = function () {
  $('#cvTemplates').removeClass('hideTemplates');
  $('#cvTemplatesOptions').removeClass('hideTemplates');
  $('#bg-overlay').addClass('visible');
  $('.site-wrapper').addClass('blurred');
}
onBodyMousedownriggers.push(hideSearchTemplate);
onBodyMousedownriggers.push(hideCvTemplates);
var toggleShowTemplate = function () {
  $('#cvTemplates').toggleClass('hideTemplates');
  if ($('#cvTemplates').hasClass('hideTemplates')) {
    hideCvTemplates();
  } else {
    showCvTemplates();
  }
};

var setTemplate = function (templateId) {
  $('.template').removeClass('active');
  requestPOST('/ajax/cv/' + cvId + '/template/set', function (json) {
    if (json.success) {
      forceSortAll = true;

      refreshCVFromHTMLCSS(json.CVHTMLCSS);
      refreshCVOptionsFromHTML(json.CVHTMLCSS['optionsHTML']);
      $('#template-' + templateId).addClass('active');
      currentTemplateId = templateId;
      hideCvTemplates();
    } else {
      handleError(json.reason);
    }
  }, {templateId: templateId});
};

var justMarkTemplateAsPaid = function (hasBeenBought, templateId, cvId, $f) {
  if (hasBeenBought) {
    $('#template-' + templateId + ' .buy-zone').html('<span>' + intl("editor.templates.bought") + '</span>');
    // refreshCVFromHTMLCSS(htmlcss);
    setTemplate(templateId);
    if ($f) {
      handleFormMessage($f, intl('editor.cvEditor.successBought'), 'success')
      $f[0].reset();
      clearStripeCard();
    }
  }
};

var justBuyTemplate = function (tplId) {
  askForDownload(tplId, cvId, justMarkTemplateAsPaid);
};


$('#cvTemplates').tmousedown(function (e) {
  e.stopPropagation();
})
$('#cvTemplatesOptions').tmousedown(function (e) {
  e.stopPropagation();
});
$('.editLayout').click(function () {
  toggleShowTemplate();
})
$('.searchLayout').click(function () {
  toggleSearchTemplate();
})
$('.template').click(function () {
  setTemplate($(this).data('templateId'));
})


var downloadCVcallback = function (hasBeenBought, templateId, cvId, htmlcss, $f) {
  justMarkTemplateAsPaid(hasBeenBought, templateId, cvId, $f);
  setTimeout(function () {
    clearOverlay(true);
    var $tpl = $('#template-' + templateId);
    if ($tpl.attr('is-locked') == 1) {
      openUnlockingTutorial($tpl.attr('action-associated'), cvId, function () {
        openDownloadModal(cvId)
      });
    } else {
      openDownloadModal(cvId);
    }
  }, (hasBeenBought ? 1000 : 0));
};

var downloadCV = function () {
  askForDownload(currentTemplateId, cvId, downloadCVcallback);
};

var onCloseDownloadModal = function () {
  $('#downloadCV').remove();
};

var shareCV = function () {
  $('#shareCV .loading').show();
  $('#shareCV .buttons').hide();

  // on lance l'ajax pour la génération de la miniature
  requestPOST(cv_get_thumb_relative_URL, function (response) {
    if (response.success) {
      $('#shareCV .buttons').fadeIn(function () {
        var $fbc = $('#fb-share-button-container');
        $fbc.empty();
        var $fb = $('<div />')
          .attr("class", "fb-share-button")
          .attr("data-href", $fbc.data('href'))
          .attr("data-size", $fbc.data('size'))
          .attr("data-layout", $fbc.data('layout'))
          .attr("data-mobile-iframe", $fbc.data('mobileIframe'));
        $fbc.append($fb);
        FB.XFBML.parse();
        twttr.widgets.load();
      });
      setTimeout(function () {

      }, 500);
      $('#shareCV .loading').hide();
    }
  });

  // on affiche le formulaire de partage
  feedOverlay($('#shareCV'));
};


var handleOffsetYOptions = function (ww) {
  if (ww > 1020) {
    $("#cvOptionsHTML").data('offset-y', 15)
    $("#cvOptionsHTML").addClass('rightalign')
  } else {
    $("#cvOptionsHTML").data('offset-y', 203)
    $("#cvOptionsHTML").removeClass('rightalign')
  }
};
$(document).ready(function () {
  handleOffsetYOptions($(window).width());
});
$(window).resize(function () {
  handleOffsetYOptions($(window).width());
});

var onKeyDownCTRLZ = function (e, cb) {
  var evtobj = window.event ? window.event : e;
  var activeElement = document.activeElement;
  var inputs = ['input', 'textarea'];
  if (activeElement && inputs.indexOf(activeElement.tagName.toLowerCase()) !== -1) {
    return false;
  }
  if (evtobj.keyCode == 90 && (evtobj.ctrlKey || evtobj.metaKey)) {
    evtobj.preventDefault();
    cb();
  }
};
var onCTRLZ = function () {
  requestPOST("/ajax/cv/" + cvId + "/backToPreviousVersion", function (response) {
    if (response.success) {
      refreshCVFromHTMLCSS(response.CVHTMLCSS);
      if (response.variablesUpdated || response.templateSelected) {
        refreshCVOptionsFromHTML(response.CVHTMLCSS['optionsHTML']);
      }
      if (response.templateSelected) {
        $('.template').removeClass('active');
        $('#template-' + response.templateSelected).addClass('active');
        currentTemplateId = response.templateSelected;
      }
    } else {
      handleError(intl("editor.notice.nothingToUndo"));
    }
  });
};
var onKeyDownCTRLY = function (e, cb) {
  var evtobj = window.event ? window.event : e;
  var activeElement = document.activeElement;
  var inputs = ['input', 'textarea'];
  if (activeElement && inputs.indexOf(activeElement.tagName.toLowerCase()) !== -1) {
    return false;
  }
  if (evtobj.keyCode === 89 && (evtobj.ctrlKey || evtobj.metaKey)) {
    evtobj.preventDefault();
    cb();
  }
};
var onCTRLY = function () {
  requestPOST("/ajax/cv/" + cvId + "/restoreNextVersion", function (response) {
    if (response.success) {
      refreshCVFromHTMLCSS(response.CVHTMLCSS);
      if (response.variablesUpdated || response.templateSelected) {
        refreshCVOptionsFromHTML(response.CVHTMLCSS['optionsHTML']);
      }
      if (response.templateSelected) {
        $('.template').removeClass('active');
        $('#template-' + response.templateSelected).addClass('active');
        currentTemplateId = response.templateSelected;
      }
    } else {
      handleError(intl("editor.notice.nothingToRedo"));
    }
  });
};
$(document).keydown(function (e) {
  onKeyDownCTRLZ(e, onCTRLZ);
  onKeyDownCTRLY(e, onCTRLY);
});

var updateCvVariantVariable = function (varname, vartype, value) {
  requestPOST("/ajax/cv/" + cvId + "/variable/" + vartype + "/set/" + varname,
    function (response) {
      if (response.success) {
        refreshCVFromHTMLCSS(response.CVHTMLCSS);
      } else {
        handleError(response.reason);
      }
    },
    {value: value});
}

var cancelDrivingLicense = function (drivingLicenseInfId) {
  requestPOST(cv_remove_driving_license_URL + drivingLicenseInfId, function (response) {
    if (response.success) {
      $('#drivingLicense-' + drivingLicenseInfId).remove();
      refreshCVFromHTMLCSS(response.CVHTMLCSS);
    } else {
      handleError(response.reason);
    }
  });
}
var handleCustomDrivingLicense = function (e) {
  var customValue = $('#customDL').val();
  requestPOST(cv_add_driving_license_URL, function (response) {
    if (response.success) {
      var $cancelDL = $('<span>x</span>')
      $cancelDL.click(function () {
        cancelDrivingLicense(response.drivingLicenseId);
      })
      var $dl = $('<div class="tag" id="drivingLicense-' + response.drivingLicenseId + '">' +
        '' + response.label + ' ' +
        '</div>');
      $dl.append($cancelDL);
      $('#drivingLicensesList').append($dl)
      refreshCVFromHTMLCSS(response.CVHTMLCSS);
    } else {
      handleError(response.reason);
    }
  }, {custom: customValue});

  $('#customDL').val('');
  $('#customDL').hide();

  e.preventDefault();
};

var handleDrivingLicense = function () {
  var dlkey = $(this).val()
  if (dlkey === -1) {
    $('#customDL').show();
    $('#customDL').focus();
  } else {
    requestPOST(cv_add_driving_license_URL, function (response) {
      if (response.success) {
        var $cancelDL = $('<span>x</span>');
        $cancelDL.click(function () {
          cancelDrivingLicense(response.drivingLicenseId);
        })
        var $dl = $('<div class="tag" id="drivingLicense-' + response.drivingLicenseId + '">' +
          '' + response.label + ' ' +
          '</div>');
        $dl.append($cancelDL);
        $('#drivingLicensesList').append($dl)
        refreshCVFromHTMLCSS(response.CVHTMLCSS);
      } else {
        handleError(response.reason);
      }
    }, {key: dlkey});
  }
  $(this).val(0);
};

var handleMaritalStatus = function () {
  var maritalStatusKey = $(this).val()
  requestPOST(cv_set_marital_status, function (response) {
    if (response.success) {
      refreshCVFromHTMLCSS(response.CVHTMLCSS);
    } else {
      handleError(response.reason);
    }
  }, {maritalStatusKey: maritalStatusKey});
};

var handleNationality = function () {
  var nationalityId = $(this).val()
  requestPOST(cv_set_nationality, function (response) {
    if (response.success) {
      refreshCVFromHTMLCSS(response.CVHTMLCSS);
    } else {
      handleError(response.reason);
    }
  }, {nationalityId: nationalityId});
}

$(document).ready(function () {

  $('#chooseDrivingLicenses').change(handleDrivingLicense);
  $('#submitInformation').on('click', function () {
    if ($('#customDL').val().length >= 1) {
      handleCustomDrivingLicense();
    }
  })

  $('#chooseMaritalStatus').change(handleMaritalStatus)
  $('#chooseNationality').change(handleNationality)
});

var cancelMobilityPlace = function (informationId) {
  requestPOST(cv_remove_mobility + informationId, function (response) {
    if (response.success) {
      $('#mobility-' + informationId).remove();
      refreshCVFromHTMLCSS(response.CVHTMLCSS);
    } else {
      handleError(response.reason);
    }
  });
};

var mobilityFocused = function (event, ui) {
  event.preventDefault();
};

var mobilitySelected = function (event, ui) {
  $(this).val('');
  requestGET('/ajax/geoplace/' + ui.item.value + '/details/feedCV/' + cvId + '/GEO_MOBILITY',
    function (response) {
      if (response.placeDetails) {
        var $mobilityDL = $('<span>x</span>')
        $mobilityDL.click(function () {
          cancelMobilityPlace(response.informationId);
        })
        var $mobility = $('<div class="tag" id="mobility-' + response.informationId + '">' +
          '' + ui.item.label + ' ' +
          '</div>')
        $mobility.append($mobilityDL)
        $('#mobilitiesList').append($mobility);
        refreshCVFromHTMLCSS(response.CVHTMLCSS);
      }
    },
    {
      rawValue: ui.item.label
    }
  );
  event.preventDefault();
};

var cancelAddressPlace = function (informationId) {
  requestPOST(cv_remove_address + informationId, function (response) {
    if (response.success) {
      $('#address-' + informationId).remove();
      refreshCVFromHTMLCSS(response.CVHTMLCSS);
    } else {
      handleError(response.reason);
    }
  });
};
var addressFocused = function (event, ui) {
  event.preventDefault();
};
var addressSelected = function (event, ui) {
  var self = this;
  $(self).val(ui.item.label);
  $('#addressChoosen').html('');
  requestGET('/ajax/geoplace/' + ui.item.value + '/details/feedCV/' + cvId + '/ADDRESS',
    function (response) {
      if (response.placeDetails) {
        $(self).val('');
        var $addressDL = $('<span>x</span>')
        $addressDL.click(function () {
          cancelAddressPlace(response.informationId);
        })
        var $address = $('<div class="tag" id="address-' + response.informationId + '">' +
          '' + ui.item.label + ' ' +
          '</div>')
        $address.append($addressDL);
        $('#addressChoosen').html($address);
        refreshCVFromHTMLCSS(response.CVHTMLCSS);
      }
    }, {
      rawValue: ui.item.label
    });
  event.preventDefault();
};


var saveInformationRelativeSort = function (cvId) {
  return new Promise(function (resolve, reject) {
    var information = []
    $('*[information-field="true"]').each(function () {
      information.push({
        id: $(this).attr('information-id')
      })
    })
    requestPOST('/ajax/updateInfRelativeOrders/' + cvId, function (response) {
      resolve(response)
    }, {
      information: information
    });
  });
};


var cvContentsStructure = [];
var lastCvContentsStructureDiff = {};

var initContentsSortCalculator = function () {
  lastCvContentsStructureDiff = {};
  cvContentsStructure = [];
  $('*[single-content="true"]').each(function () {
    cvContentsStructure.push({
      id: $(this).attr('single-content-id'),
      type: $(this).attr('single-content-type'),
      currentBlock: $(this).closest('div[block="true"]').attr('block-id')
    })
  })
}
var makeDiffContentsSort = function () {
  var newCvContentsStructure = []
  $('*[single-content="true"]').each(function () {
    newCvContentsStructure.push({
      id: $(this).attr('single-content-id'),
      type: $(this).attr('single-content-type'),
      currentBlock: $(this).closest('div[block="true"]').attr('block-id')
    })
  });
  var blocksToResort = [];
  for (var i in cvContentsStructure) {
    if (forceSortAll || newCvContentsStructure[i].id !== cvContentsStructure[i].id || newCvContentsStructure[i].type !== cvContentsStructure[i].type || newCvContentsStructure[i].currentBlock !== cvContentsStructure[i].currentBlock) {
      lastCvContentsStructureDiff[i] = newCvContentsStructure[i];
      var bid = newCvContentsStructure[i].currentBlock;
      blocksToResort.indexOf(bid) === -1 && blocksToResort.push(bid);
    }
  }
  if (!forceSortAll) {
    // On complète chaque block avec tous les contenus du bloc pour faire un tri complet
    for (var j = 0; j < blocksToResort.length; j++) {
      for (var i in cvContentsStructure) {
        if (blocksToResort[j] === cvContentsStructure[i].currentBlock) {
          lastCvContentsStructureDiff[i] = newCvContentsStructure[i];
        }
      }
    }
  }
}

var saveRelativeSort = function (cvId) {
  return new Promise(function (resolve, reject) {
    var blocks = []
    $('*[block="true"]').each(function () {
      blocks.push({
        id: $(this).attr('block-id'),
        containerName: $(this).closest('*[blocks-container="true"]').attr('container-name')
      })
    })
    requestPOST('/ajax/updateRelativeOrders/' + cvId, function (response) {
      forceSortAll = false;
      resolve(response)
    }, {
      blocks: blocks,
      contents: lastCvContentsStructureDiff
    });
  })
}

var upLined = {"1": false, "2": false, "3": false, "4": false, "5": false}
var showForbiddenZones = function () {
  var i = 1;
  $('.cv-page').each(function () {
    var pagenum = i + "";
    var elheight = $(this).outerHeight();
    if (elheight > 1122.6) {
      var noticeMessage = '<div class="notice-message" style="display:none" onclick="event.stopPropagation();">' + intl('editor.cvEditor.forbiddenExplaination') +
        '<br/>' +
        '<a href="javascript:;" onclick="moveBlocksToOtherPage(' + pagenum + ');">' +
        intl('editor.cvEditor.forbiddenActionLabel') +
        '</a>' +
        ' <a href="javascript:;" onclick="autoFit(' + pagenum + ');">' +
        intl('editor.cvEditor.forbiddenZoneAction2Label') +
        '</a>' +
        '</div>';
      var $fz = $('<div class="forbiddenZone' + (upLined[pagenum] === true ? ' upLine' : '') + '">' + noticeMessage + '<div class="notice-line" onclick="event.stopPropagation();">' + intl('editor.cvEditor.forbiddenNotice') + '</div></div>');
      $fz.height(Math.ceil(elheight - 1122.6));
      $fz.click(function (e) {
        $(this).addClass('upLine');
        e.stopPropagation();
        upLined[pagenum] = true;
        return false;
      });
      $(this).append($fz);
    }
    i++;
  });
};
var showAgainForbiddenZones = function (e) {
  if ($(e.target).closest(".cv-page").length == 0) {
    $('.forbiddenZone').removeClass('upLine');
    upLined = {"1": false, "2": false, "3": false, "4": false, "5": false}
  }
}
onBodyMousedownriggers.push(showAgainForbiddenZones);

var bindCvDataSortable = function (cvId) {
  $('*[blocks-container="true"]').each(function () {
    var t = this
    var connectedWith = $(this).attr('container-class-connected');
    var updateErr;
    var updateErrArgs;
    $(this).sortable({
      items: '> div[block="true"]',
      connectWith: connectedWith ? '#cvHTML .' + connectedWith : false,
      start: function () {
        //console.log('start', connectedWith)
        if (connectedWith) {
          $('.' + connectedWith).addClass('draggingOn');
        } else {
          $(t).addClass('draggingOn');
        }
        $('.cv-page').addClass('dragging-blocks');
        updateErr = false;
        updateErrArgs = {};
      },
      stop: function () {
        $('.cv-container').removeClass('draggingOn');
        $('.cv-page').removeClass('dragging-blocks');
      },
      receive: function (event, ui) {
        /*********** code pour gérer les retours arrière dans le cas ou le conteneur de destination
         * a des restrictions sur le type ou le nombre de blocks *********************************/
        if (ui.sender) {
          var $dest = $(ui.item).parent();
          var nbCurrent = $dest.attr('container-nb-blocks');
          var nbMax = $dest.attr('container-max-nb-blocks');
          var restrictedType = $dest.attr('container-restricted-types');
          if (restrictedType != "-1") {
            restrictedType = restrictedType.split(',')
          }
          var currBlockType = $(ui.item).attr('block-type');
          if (restrictedType != "-1" && restrictedType.indexOf(currBlockType) == -1) {
            updateErr = intl("errors.cvEditor.forbiddenBlockType");
          } else if (nbMax != "-1" && nbCurrent + 1 > nbMax) {
            updateErrArgs = {maxBlocks: nbMax}
            updateErr = intl("errors.cvEditor.tooMuchBlocks");
          }
        }
        if (updateErr) {
          $(ui.sender).sortable("cancel");
          setTimeout(function () {
            handleError(updateErr, updateErrArgs);
          }, 300);
        }
        /*********************************************************
         *********************************************************/
      },
      update: function (event, ui) {

        if (this === ui.item.parent()[0]) {
          /*********** code pour gérer les retours arrière dans le cas ou le conteneur de destination
           * a des restrictions sur le type ou le nombre de blocks *********************************/
          var authorizeUpdate = true;
          if (ui.sender) {
            var $dest = $(ui.item).parent();
            var nbCurrent = $dest.attr('container-nb-blocks');
            var nbMax = $dest.attr('container-max-nb-blocks');
            var restrictedType = $dest.attr('container-restricted-types');
            if (restrictedType != "-1") {
              restrictedType = restrictedType.split(',')
            }
            var currBlockType = $(ui.item).attr('block-type');
            if (restrictedType != "-1" && restrictedType.indexOf(currBlockType) == -1) {
              authorizeUpdate = false;
            } else if (nbMax != "-1" && nbCurrent + 1 > nbMax) {
              authorizeUpdate = false;
            }
          }
          /*********************************************************
           *********************************************************/
          if (authorizeUpdate) {
            saveRelativeSort(cvId).then(function (response) {
              refreshCVFromHTMLCSS(response.CVHTMLCSS);
            });
          }
        }
      }
    })
  }).disableSelection();

  initContentsSortCalculator();
  $('*[timeline-contents-container="true"]').each(function () {
    $(this).sortable({
      items: '> div[single-content="true"]',
      update: function (event, ui) {
        makeDiffContentsSort();
        saveRelativeSort(cvId).then(function (response) {
          if (response.success === false) {
            handleError(response.reason);
          } else {
            refreshCVFromHTMLCSS(response.CVHTMLCSS);
          }
        });
      }
    }).disableSelection();
  });
  var differInstantContentsSortingTimeout = null;
  $('*[contents-container="true"]').each(function () {
    var connectedWith = $(this).attr('connected-to');
    $(this).sortable({
      connectWith: connectedWith ? '#cvHTML .' + connectedWith : false,
      items: '> div[single-content="true"]',
      update: function (event, ui) {
        if (differInstantContentsSortingTimeout) {
          clearTimeout(differInstantContentsSortingTimeout);
          differInstantContentsSortingTimeout = null;
        }
        differInstantContentsSortingTimeout = setTimeout(function () {
          makeDiffContentsSort();
          saveRelativeSort(cvId).then(function (response) {
            if (response.success === false) {
              handleError(response.reason);
            } else {
              refreshCVFromHTMLCSS(response.CVHTMLCSS);
            }
          });
          differInstantContentsSortingTimeout = null;
        }, 100);
      }
    }).disableSelection();
  })
  $('*[information-fields-container="true"]').sortable({
    items: '*[information-field="true"]',
    update: function (event, ui) {
      saveInformationRelativeSort(cvId).then(function (response) {
        if (response.success === false) {
          handleError(response.reason);
        } else {
          refreshCVFromHTMLCSS(response.CVHTMLCSS);
        }
      });
    }
  }).disableSelection();
}


var bindCvContentEditable = function () {
  var $anyContent = $('*[single-content="true"]');
  var $freeContent = $('*[free-block-content="true"]')
  $anyContent.each(function () {
    var contentid = $(this).attr('single-content-id');
    var contenttype = $(this).attr('single-content-type');
    var $editCvContent = $('<a href="javascript:;" class="edit"></a>');
    $editCvContent.click(function () {
      editCvContent(contenttype, contentid);
    })
    var $deleteCvContent = $('<a href="javascript:;" class="delete"></a>');
    $deleteCvContent.click(function () {
      deleteCvContent(contenttype, contentid);
    })
    $(this).append(
      $('<div>').addClass('buttons')
        .append($editCvContent)
        .append($deleteCvContent)
        .tmousedown(function (e) {
          e.stopPropagation();
        })
    );
  });
  $freeContent.each(function () {
    var blockid = $(this).closest('*[block="true"]').attr('block-id');
    var $editFree = $('<a href="javascript:;" class="edit"></a>');
    $editFree.click(function () {
      editFreeContent(blockid);
    })
    $(this).append(
      $('<div>').addClass('buttons')
        .append($editFree)
        .tmousedown(function (e) {
          e.stopPropagation();
        })
    );
  });
}

var deleteCvBlock = function (cvBlokId) {
  requestPOST('/ajax/cv/' + cvId + '/deleteBlock/' + cvBlokId, function (response) {
    if (response.success) {
      refreshCVFromHTMLCSS(response.CVHTMLCSS);
    } else {
      handleError(response.reason);
    }
  });
}
var pushNewCvTitle = function (e, t, bid, isBlur) {
  if (e.which == 13) {
    $(t).blur();
  }
  if (isBlur) {
    var val = t.value;
    requestPOST('/ajax/cv/' + cvId + '/blockTitle/' + bid, function (response) {
      if (response.success) {
        refreshCVFromHTMLCSS(response.CVHTMLCSS);
      } else {
        handleError(response.reason);
      }
    }, {title: val});
  }
}
var chooseIco = function (ico, bid) {
  requestPOST('/ajax/cv/' + cvId + '/blockTitle/' + bid, function (response) {
    if (response.success) {
      refreshCVFromHTMLCSS(response.CVHTMLCSS);
    } else {
      handleError(response.reason);
    }
  }, {icon: ico});
}
var iconsList = function (bid) {
  var $a = [];
  var $removeIcon = $('<span>X</span>')
  $removeIcon.click(function () {
    chooseIco('', bid);
  })
  $a.push($removeIcon[0]);
  $.each(icons, function (i, v) {
    var $el = $('<span class="fa ' + v + '"></span>');
    $el.click(function () {
      chooseIco(v, bid)
    })
    $a.push($el[0])
  });
  return $a;
}
var bindCvTitles = function () {
  $('*[block-title="true"]').each(function () {
    var t = this;

    var $tOptions = $('<div class="options"></div>');

    var $moveButton = $('<span class="move"></span>');
    var $addButton = $('<span class="add"></span>');
    //var $editTitleButton = $('<span class="edit"></span>');
    var $editIconButton = $('<span class="editIcon"></span>');
    var $deleteButton = $('<span class="delete"></span>');

    $(t).prepend($tOptions);
    if (!$(t).attr('disabled-add-content')) {
      $tOptions.prepend($addButton);
    }
    $tOptions.prepend($moveButton);
    $tOptions.prepend($deleteButton);
    if (!$(t).attr('disabled-add-icon')) {
      $tOptions.prepend($editIconButton);
    }

    var parentBlockId = $(this).attr('block-parent-id');
    var thml = $('.title-text', this).text().trim();
    $addButton.tmousedown(function (e) {
      e.stopPropagation();
    })
    $addButton.click(function () {
      requestPOST('/ajax/cv/' + cvId + '/addBlockContentForm/' + parentBlockId, function (response) {
        if (response.success) {
          createContentEditor(response.contentForm, contentUpdated);
        }
      });
    })
    //$editTitleButton.mousedown(function (e) {
    $('.title-text', t).tmousedown(function (e) {
      e.stopPropagation();
    })
    var $el = $('<input type="text" value="' + thml + '" onkeyup="pushNewCvTitle(event, this, ' + parentBlockId + ')" onblur="pushNewCvTitle(event, this, ' + parentBlockId + ', 1)" />');
    $el.tmousedown(function (e) {
      e.stopPropagation();
    })
    var originalTitleText = $('.title-text', t).html();
    //$editTitleButton.click(function () {
    $('.title-text', t).click(function () {
      if ($('.title-text', t).html() == originalTitleText) {
        $('.title-text', t).html($el);
        $el.focus();
      }
    });
    onBodyMousedownriggers.push(function () {
      $('.title-text', t).html(originalTitleText);
    })
    $deleteButton.tmousedown(function (e) {
      e.stopPropagation();
    })
    $deleteButton.click(function () {
      if (confirmBox(intl('editor.cvEditor.editCvBlock.deleteBlock'))) {
        deleteCvBlock(parentBlockId);
      }
    });
    $editIconButton.tmousedown(function (e) {
      e.stopPropagation();
    })
    $editIconButton.click(function () {
      var $el = $('<div tabindex="0" id="iconsManager" onblur="$(this).remove();"></div>');
      var $icons = iconsList(parentBlockId);
      for (var i = 0; i < $icons.length; i++) {
        $el.append($icons[i]);
      }
      $el.tmousedown(function (e) {
        e.stopPropagation();
      })
      $(this).parent().append($el);
      $el.focus();
    });
  });
}

var openMyApplicationInformation = function () {
  feedOverlay($('#updateMyInformation'));//, 'dark', false, true);
  optionsLoadedActionCb();
};
var bindEditableInformation = function () {
  $('*[information-fields-container="true"]').each(function () {
    var t = this;
    var $editButton = $('<span class="edit"></span>');
    var showEdit = function () {
      $(t).append($editButton);
      $editButton.click(function () {
        openMyApplicationInformation();
      });
    }
    var hideEdit = function () {
      $editButton.remove();
    }
    $(t).hover(showEdit, hideEdit)
  });
}

var bindEditableUsername = function () {
  $('*[username-data-container="true"]').each(function () {
    var t = this;
    $(t).click(function () {
      handleError(intl("editor.notice.changeUsername"));
    });
  });
}

var bindEditableCvGeneralInfo = function () {
  $('*[cvvariant-data-container="true"]').each(function () {
    var t = this;
    $(t).click(function () {
      openMyApplicationInformation();
    });
  });
}

var deleteProfilePicture = function () {
  requestPOST('/ajax/cv/' + cvId + '/photo/delete', function (response) {
    if (response.success) {
      refreshCVFromHTMLCSS(response.CVHTMLCSS);
    }
  });
}
var bindActionsProfilePicture = function (currentCvPhotoOrientation) {
  $('*[profile-picture="true"]').each(function () {
    var t = this;
    var $deleteButton = $('<span class="delete"></span>');
    var newOrientation = currentCvPhotoOrientation === 'cover' ? 'portrait' : (currentCvPhotoOrientation === 'portrait' ? 'landscape' : 'cover');
    var $landscapeModeButton;
    var showButtons = function () {
      $landscapeModeButton = $('<span class="orientation-mode ' + newOrientation + '" title="' + intl('editor.cvEditor.changeOrientationModeTo.' + newOrientation) + '"></span>');
      $(t).append($deleteButton);
      $(t).append($landscapeModeButton);
      $deleteButton.click(function () {
        deleteProfilePicture();
      });
      $landscapeModeButton.click(function () {
        changeOrientationModePhoto();
      });
      loadSpecificTooltip($landscapeModeButton, 'right');
    };
    var hideButtons = function () {
      $deleteButton.remove();
      $landscapeModeButton.remove();
    };
    $(t).hover(showButtons, hideButtons)
  })
}

var showUndoRedo = function () {
  $('#undoRedo').show();
  $('#cvOptionsHTML').show();
  $('#addBlock').show();
  $('#addContent').show();
  //$('#delete-zone').show();
  $('#school-actions').show();
}

var checkContainerMoveToTop = function ($element) {

  var $cvpage = $element.closest('.cv-page');
  var offsetCvPage = $cvpage.offset().top + $cvpage.height();

  $element.css('top', '70px');
  var bottomElementTooFar = $element.offset().top + $element.height() + 50 > offsetCvPage;
  if (bottomElementTooFar) {
    $element.css('top', '-' + ($element.height() - 10) + 'px');
  }

}

var showAvailableBlocks = function (t) {

  $('.addBlockContainer').removeClass('visible');
  var $container = $(t).next();
  $container.addClass('visible');
  checkContainerMoveToTop($container);

}

var showBlockContents = function () {

  $('.cv-container').addClass('showEditContents');

}
var hideBlockContents = function () {

  $('.cv-container').removeClass('showEditContents');

}
onBodyMousedownriggers.push(hideBlockContents);

var showAddBlocks = function () {

  $('.addBlockContainer:not(.addTimelineContentContainer)').each(function () {

    var $addBlockFormContainer = $(this)
    var containerName = $addBlockFormContainer.data('containerName')
    requestPOST('/ajax/cv/' + cvId + '/getPossibleInsertableBlocks/' + containerName, function (response) {
      if (response.possibleBlocks) {

        var possibleBlocksOptions = Object.keys(response.possibleBlocks).map(function (key, value) {
          var v = response.possibleBlocks[key];
          return '<a href="javascript:;" class="new-empty-block" data-block-type="' + v + '">' + intl('editor.cvEditor.newBlockLabels.' + v) + '</a>'
        }).join('');
        var $select = $(possibleBlocksOptions);
        $addBlockFormContainer.html($select);
        $addBlockFormContainer.find('.new-empty-block').each(function () {
          var blockType = $(this).data('block-type');
          $(this).click(function () {
            requestPOST('/ajax/cv/' + cvId + '/addEmptyBlock/' + blockType + '/' + containerName, function (response) {
              if (response.success) {
                refreshCVFromHTMLCSS(response.CVHTMLCSS);
              } else {
                handleError(response.reason)
              }
            });
            hideAddBlocks();
          })
        });
      }
    });

  });

  $('.cv-container').addClass('showAddBlock');
}
var hideAddBlocks = function () {

  $('.cv-container').removeClass('showAddBlock');

}
onBodyMousedownriggers.push(hideAddBlocks);

var updateCvImage = function (imageId, postArgs) {
  requestPOST('/ajax/cv/' + cvId + '/updateImage/' + imageId, function (response) {
    if (response.success) {
      refreshCVFromHTMLCSS(response.CVHTMLCSS);
    }
  }, postArgs);
}

var bindEditImage = function () {
  $('*[single-image="true"]').each(function () {
    var t = this;
    var imageId = $(t).attr('single-image-id');
    $(t).draggable({
      containment: "parent",
      stop: function () {
        var offsetLeft = $(t).offset().left - $(t).parent().offset().left
        var offsetTop = $(t).offset().top - $(t).parent().offset().top
        updateCvImage(imageId, {left: offsetLeft, top: offsetTop});
      }
    });
    $(t).resizable({
      minHeight: 5,
      minWidth: 5,
      stop: function (event, ui) {
        updateCvImage(imageId, ui.size);
      }
    });
    var $deleteButton = $('<span class="delete"></span>');
    var showDelete = function () {
      $(t).append($deleteButton);
      $deleteButton.click(function () {
        updateCvImage(imageId, {"delete": 1});
      });
    }
    var hideDelete = function () {
      $deleteButton.remove();
    }
    $(t).hover(showDelete, hideDelete)
  });
}

var openInsertImageForm = function (pageNumber) {

  var $el = $('' +
    '<form ' +
    'class="box pageImage" ' +
    'action="' + cv_block_add_image_URL + pageNumber + '" ' +
    'method="post" ' +
    'id="insertPageImage-' + pageNumber + '" ' +
    'enctype="multipart/form-data">' +
    '<div class="box__input">' +
    '<svg class="box__icon" xmlns="http://www.w3.org/2000/svg" width="50" height="43" viewBox="0 0 50 43"><path d="M48.4 26.5c-.9 0-1.7.7-1.7 1.7v11.6h-43.3v-11.6c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v13.2c0 .9.7 1.7 1.7 1.7h46.7c.9 0 1.7-.7 1.7-1.7v-13.2c0-1-.7-1.7-1.7-1.7zm-24.5 6.1c.3.3.8.5 1.2.5.4 0 .9-.2 1.2-.5l10-11.6c.7-.7.7-1.7 0-2.4s-1.7-.7-2.4 0l-7.1 8.3v-25.3c0-.9-.7-1.7-1.7-1.7s-1.7.7-1.7 1.7v25.3l-7.1-8.3c-.7-.7-1.7-.7-2.4 0s-.7 1.7 0 2.4l10 11.6z"/></svg>' +
    '<input type="file" class="box__file" id="insertImageInput-' + pageNumber + '" name="image" />' +
    '<label for="insertImageInput-' + pageNumber + '"><strong>' + intl("editor.cvEditor.chooseFile") + '</strong><span class="box__dragndrop">' + intl('editor.cvEditor.orDragItHere') + '</span>.</label>' +
    '<input type="submit" class="box__button" value="" />' +
    '</div>' +
    '<div class="box__uploading">' + intl("editor.cvEditor.sending") + '</div>' +
    '</form>'
  );

  var binded = feedOverlay($el, 'dark');
  if (!binded) {
    bindAjaxPhotoForm($el,
      function (response) {
        if (response.success) {
          clearOverlay();
          refreshCVFromHTMLCSS(response.CVHTMLCSS);
        } else {
          handleError(response.reason)
        }
      },
      function () {
      }
    );
  }
};

$(document).ready(function () {
  bindAjaxPhotoForm($('#updateCvProfilePictureForm'), function (response) {
    if (response.success) {
      clearOverlay();
      refreshCVFromHTMLCSS(response.CVHTMLCSS);
    } else {
      handleError(response.reason)
    }
  }, null, function (xhr, status) {
    if (xhr && xhr.status && xhr.status == 413) {
      handleError(intl('errors.media.empty_or_too_big').replace('\{\{ max_file_size \}\}', max_file_size + 'M'));
    }
  });

});
var showEditCVPhoto = function () {
  feedOverlay($('#updateCvProfilePicture'));
}

var bindImageAdding = function () {
  if (cvLocked) return;

  var $profilePictureToggler = $('<div ' +
    'id="cvProfilePictureToggler" ' +
    'class="cvdr-left-editor-button right-tooltip" ' +
    'title="' + intl('editor.cvEditor.tooltips.setPhoto') + '">' +
    '<span class="fa fa-camera"></span> ' +
    '<span>' + intl('editor.cvEditor.profilePicture') + '</span>' +
    '</div>');
  $profilePictureToggler.click(function () {
    showEditCVPhoto();
  });
  $('#cvHTML').prepend($profilePictureToggler);

  var i = 1;
  $('*[columns-container="true"]').each(function () {
    var t = this;
    var pageNumber = $(this).attr('container-page-number');
    var $addImageForm = $('' +
      '<span id="addPageImage-' + i + '" ' +
      'class="cvdr-left-editor-button addPageImage right-tooltip static" ' +
      'data-offset-scroll-height="950" ' +
      'data-offset-y="15" ' +
      //'style="' + (i > 1 ? 'top:' + ((i - 1) * (29.7 + 1.5)) + 'cm;' : '') + '" ' +
      'title="' + intl('editor.cvEditor.tooltips.addImage') + '" ' +
      'style="left: -4cm;">' +
      '<span class="fa fa-institution"></span> ' +
      '<span>' + intl('editor.cvEditor.images') + '</span>' +
      '</span>'
      )
    ;
    $addImageForm.click(function () {
      openInsertImageForm(pageNumber);
    })
    $(t).append($addImageForm);
    i++;
  });
}

var addTimeLineContentByType = function (type) {
  requestPOST('/ajax/cv/' + cvId + '/addBlockContentFormByType/' + type, function (response) {
    if (response.success) {
      createContentEditor(response.contentForm, contentUpdated);
    }
  });
}
var bindTimelineContainerOptions = function () {
  var i = 1;
  $('*[timeline-contents-container="true"]').each(function () {

    var t = this;
    var $addTimelineBlurContainer = $('<span class="addBlockBlurContainer"></span>');
    $addTimelineBlurContainer.tmousedown(function (e) {
      $('.addBlockContainer').removeClass('visible');
      e.stopPropagation();
    })
    $(t).prepend($addTimelineBlurContainer);

    var $addTimelineContainer = $('<span class="addBlockContainer addTimelineContentContainer" id="addTimelineContainer-' + i + '"></span>');
    $addTimelineContainer.tmousedown(function (e) {
      e.stopPropagation();
    })
    var $addTimelineButtonContainer = $('<span class="addBlockButtonContainer">' +
      '<span class="fa fa-plus"></span> ' + intl("editor.cvEditor.editContainers.addTimelineContent") +
      '</span>');
    $addTimelineButtonContainer.tmousedown(function (e) {
      e.stopPropagation();
      showAvailableBlocks(this);
    })
    $(t).prepend($addTimelineContainer);
    $(t).prepend($addTimelineButtonContainer);

    var $c1 = $('<a href="javascript:;" class="new-empty-block">' + intl('editor.cvEditor.editContainers.timeline.addJobContent') + '</a>')
    $c1.click(function () {
      addTimeLineContentByType('PRO_EXPERIENCES')
    });
    var $c2 = $('<a href="javascript:;" class="new-empty-block">' + intl('editor.cvEditor.editContainers.timeline.addDiplomaContent') + '</a>')
    $c2.click(function () {
      addTimeLineContentByType('EDUCATION')
    });
    var $c3 = $('<a href="javascript:;" class="new-empty-block">' + intl('editor.cvEditor.editContainers.timeline.addAssociativeContent') + '</a>')
    $c3.click(function () {
      addTimeLineContentByType('ASSO_EXPERIENCES')
    });
    var $c4 = $('<a href="javascript:;" class="new-empty-block">' + intl('editor.cvEditor.editContainers.timeline.addComplementaryDiplomaContent') + '</a>')
    $c4.click(function () {
      addTimeLineContentByType('COMPLEMENTARY_EDUCATION')
    });

    $addTimelineContainer.html($c1).append($c2).append($c3).append($c4);

    i++;
  });
}

var bindCvContainerOptions = function () {
  $('*[blocks-container="true"]').each(function () {

    var t = this;
    var containerName = $(t).attr('container-name');
    var $addBlockFormContainer = $('<span class="addBlockContainer" data-container-name="' + containerName + '"></span>');
    $addBlockFormContainer.tmousedown(function (e) {
      e.stopPropagation();
    })
    var $addBlockButtonContainer = $('<span class="addBlockButtonContainer">' +
      '<span class="fa fa-plus"></span> ' + intl("editor.cvEditor.editContainers.addBlock") +
      '</span>');
    $addBlockButtonContainer.tmousedown(function (e) {
      e.stopPropagation();
      showAvailableBlocks(this);
    })
    $(t).prepend($addBlockFormContainer);
    $(t).prepend($addBlockButtonContainer);
    var $addBlockBlurContainer = $('<span class="addBlockBlurContainer"></span>');
    $addBlockBlurContainer.tmousedown(function (e) {
      $('.addBlockContainer').removeClass('visible');
      e.stopPropagation();
    })
    $(t).prepend($addBlockBlurContainer);

  });
}

var getCV = function (cvId) {
  return new Promise(function (resolve, reject) {
    requestPOST('/ajax/getCVHTML/' + cvId, function (response) {
      if (response.success) {
        resolve(response.CVHTMLCSS);
      }
    });
  });
}

var getCvContent = function (cvContentType, cvContentId) {
  return new Promise(function (resolve, reject) {
    requestPOST('/ajax/getCvContentForm/' + cvContentType + '/' + cvContentId, function (response) {
      if (response.success) {
        resolve(response.contentForm);
      }
    });
  })
}

var getCvBlockContent = function (cvBlockId) {
  return new Promise(function (resolve, reject) {
    requestPOST('/ajax/getCvBlockContentForm/' + cvBlockId, function (response) {
      if (response.success) {
        resolve(response.contentForm);
      }
    });
  })
}

var deleteCvContent = function (cvContentType, cvContentId) {
  requestPOST('/ajax/cv/' + cvId + '/deleteContent/' + cvContentType + '/' + cvContentId, function (response) {
    if (response.success) {
      refreshCVFromHTMLCSS(response.CVHTMLCSS);
    }
  });
}

var freeBlockContentUpdated = function (response) {
  if (response.success) {
    refreshCVFromHTMLCSS(response.CVHTMLCSS);
    clearOverlay();
  }
}

var contentUpdated = function (response) {
  if (response.success) {
    refreshCVFromHTMLCSS(response.CVHTMLCSS);
    clearOverlay();
  } else {
    handleError(response.reason);
  }
}

var updatedAllInformation = function (response) {
  if (response.success) {

    if (response.newMobilityInformationId) {
      var $inp = $('input[name="customRawMobility"]');
      var val = $inp.val();
      var $mobilityDL = $('<span>x</span>')
      $mobilityDL.click(function () {
        cancelMobilityPlace(response.newMobilityInformationId);
      })
      var $mobility = $('<div class="tag" id="mobility-' + response.newMobilityInformationId + '">' +
        '' + val + ' ' +
        '</div>')
      $mobility.append($mobilityDL)
      $('#mobilitiesList').append($mobility);
      $inp.val("");
    }

    refreshCVFromHTMLCSS(response.CVHTMLCSS);
    clearOverlay();
  }
}

var updatedMainData = function (response) {
  if (response.success) {
    refreshCVFromHTMLCSS(response.CVHTMLCSS);
    clearOverlay();
  }
}

var bindContentEditUtils = function (id) {
  $('input[name="isCurrent"]', $(id)).change(function () {
    if ($(this).is(':checked')) {
      $('.endDate', $(id)).addClass('hidden');
    } else {
      $('.endDate', $(id)).removeClass('hidden');
    }
  });

  // bind wysibb
  $('textarea.wysibb', $(id)).wysibb({
    buttons: "bold,italic,underline,|,fontcolor,|,sup,|,link,|,justify,|,removeFormat,|,source",
    allButtons: {
      justify: {
        title: 'Justify text',
        buttonHTML: '<span class="fonticon ve-tlb-textjustify1">\uE013</span>',
        transform: {
          '<div style="text-align:justify;">{SELTEXT}</div>': '[justify]{SELTEXT}[/justify]'
        }
      },
    },
    lang: client_language
  });

  // bind select2
  $('select.select2', $(id)).select2({});
}
var createContentEditor = function (contentForm, cbupdated) {
  feedOverlay($(contentForm.html), 'dark', false, true);
  var $form = $('form#' + contentForm.id);
  $form[0].reset();
  bindAjaxForm('#' + contentForm.id, cbupdated, function () {
    var $wysibbtxt = $('textarea.wysibb', $form);
    if ($wysibbtxt.length) {
      $wysibbtxt.sync();
    }
  });
  var formEdited = false;
  $form.find('input, textarea').each(function () {
    $(this).keyup(function () {
      formEdited = true;
    })
  })
  $form.find('select').each(function () {
    $(this).change(function () {
      formEdited = true;
    })
  })
  $('input.cancel', $('#' + contentForm.id)).click(function (e) {
    if (!formEdited || (formEdited && confirmBox(intl('editor.cvEditor.editContent.cancelConfirm')))) {
      clearOverlay();
    }
  });
  bindSearchAutocomplete('#' + contentForm.id + ' .ac');
  bindSuggestor('#' + contentForm.id + '');
  bindContentEditUtils('#' + contentForm.id + '');
}
var editCvContent = function (cvContentType, cvContentId) {
  getCvContent(cvContentType, cvContentId).then(function (contentForm) {
    createContentEditor(contentForm, contentUpdated);
  })
}
var editFreeContent = function (blockid) {
  getCvBlockContent(blockid).then(function (contentForm) {
    createContentEditor(contentForm, freeBlockContentUpdated);
  })
}

var openOptionsMenu = function (t) {
  $('.options-cat h4').removeClass('active');
  $('.options-list-container').addClass('hidden');
  $(t).next().removeClass('hidden');
  $(t).addClass('active');
}

var toggleOptionsHTML = function (h) {
  if (h) {
    $('#cvOptionsHTML .html').hide();
  } else {
    $('#cvOptionsHTML .html').toggle();
  }
}
var hideOptionsDOM = function (e) {
  if ($(window).outerWidth() <= 1275) {
    if ($(e.target).closest("#cvOptionsHTML").length == 0 && $(e.target).closest(".colorpicker").length == 0) {
      toggleOptionsHTML(1)
    }
  }
}
onBodyMousedownriggers.push(hideOptionsDOM);


var detectBlockInRedZone = function () {
  var pageNum = 0;
  $('.cv-page').each(function () {
    pageNum++;
    var haveOutside = false;
    var $forbiddenZone = $('.forbiddenZone', this);
    if ($forbiddenZone.length > 0) {
      var forbiddenZoneTop = $forbiddenZone.offset().top;
      $('.cv-container .cv-block', this).each(function () {
        $(this).attr('current-page', pageNum);
        $(this).attr('is-outside', false);
        var bottomPosition = $(this).offset().top + $(this).outerHeight();
        if (bottomPosition > forbiddenZoneTop) {
          $(this).attr('is-outside', true);
          $('div[single-content="true"]', this).each(function () {
            $(this).attr('is-outside', false);
            var bottomPosition = $(this).offset().top + $(this).outerHeight();
            if (bottomPosition > forbiddenZoneTop) {
              $(this).attr('is-outside', true);
            }
          });
          haveOutside = true;
        }
      });
    }
    if (haveOutside) {
      $('.notice-message', $forbiddenZone).show();
    }
  });
};

var showPreviousNextButtons = function () {
  if (!prevNextShown) {
    Cookies.set("prevNextShown", 1);
    prevNextShown = 1;
    var intro = introJs();
    intro.setOptions(Object.assign(introjsIntl, {
      scrollTo: 'tooltip',
      disableInteraction: true,
      steps: [
        {
          element: document.getElementById('undoRedo'),
          intro: intl("editor.cvEditor.forbiddenActionUndoRedo"),
          position: 'right'
        }
      ]
    }));
    intro.start();
  }
};

var autoFit = function (pageNum) {
  requestPOST('/ajax/cv/' + cvId + '/autoFitPages',
    function (response) {
      if (response.success) {
        refreshCVFromHTMLCSS(response.CVHTMLCSS);
        refreshCVOptionsFromHTML(response.CVHTMLCSS.optionsHTML);
        setTimeout(function () {
          showPreviousNextButtons();
        }, 600);
      }
    }, {
      pageNum: pageNum
    });
};

var moveBlocksToOtherPage = function (pageNum) {
  var dataToMove = [];
  $('.cv-container .cv-block', $('.cv-page[container-page-number="' + pageNum + '"]')[0]).each(function () {
    if ($(this).attr('is-outside') == "true") {
      var currentContainer = $(this).closest('.cv-container').attr('container-name');
      var currentPage = $(this).attr('current-page');
      var outerHeight = $(this).outerHeight();
      var validContents = [];
      var outsideContents = [];
      if (currentPage === "1") {
        $('div[single-content="true"]', this).each(function () {
          if ($(this).attr('is-outside') == "true") {
            outsideContents.push({
              id: parseInt($(this).attr('single-content-id')),
              outerHeight: $(this).outerHeight()
            });
          } else {
            validContents.push({
              id: parseInt($(this).attr('single-content-id')),
              outerHeight: $(this).outerHeight()
            });
          }
        });
        dataToMove.push({
          block: $(this).attr('block-id'),
          blockHeight: outerHeight,
          validContents: validContents,
          outsideContents: outsideContents,
          currentContainer: currentContainer,
          currentPage: parseInt(currentPage),
          destinationPage: parseInt(currentPage) + 1
        });
      }
    }
  });
  if (dataToMove.length > 0) {
    requestPOST('/ajax/cv/' + cvId + '/autoMoveBlocks', function (response) {
      if (response.success) {
        refreshCVFromHTMLCSS(response.CVHTMLCSS);
        setTimeout(function () {
          showPreviousNextButtons();
        }, 600);
      }
    }, {
      blocksToMove: dataToMove
    });
  }
};

var refreshCVOptionsFromHTML = function (html) {
  $('#cvOptionsHTML .html').html(html);
  bindCvVariables();
};

var refreshCVFromHTMLCSS = function (htmlcss) {

  var $cvhtml = $('#cvHTML');
  $cvhtml.html(htmlcss['css']);
  $cvhtml.html($cvhtml.html() + htmlcss['html']);
  if (cvLocked) return;

  bindCvDataSortable(cvId);
  bindCvContentEditable();
  bindCvTitles();
  bindCvContainerOptions();
  bindTimelineContainerOptions();
  bindResizableElements();
  bindMovableElements();
  bindEditableInformation();
  bindEditableUsername();
  bindEditableCvGeneralInfo();
  bindImageAdding();
  bindEditImage();
  bindActionsProfilePicture(currentCvPhotoOrientation);

  showUndoRedo();
  loadTheTooltips();

  setTimeout(function () {
    showForbiddenZones();
    detectBlockInRedZone();
  }, 0);

  loadTheStatics();

  window.callbackComment && window.callbackComment();
};

var getCurrentCV = function () {
  return getCV(cvId).then(function (htmlcss) {
    refreshCVOptionsFromHTML(htmlcss['optionsHTML']);
    refreshCVFromHTMLCSS(htmlcss);
  })
};

$(document).ready(function () {
  getCurrentCV().then(function () {

    $('#editMainInformation').show();
    $('#cvTemplatesOptions').show();
    $('#cvLoading').fadeOut('fast');
    window.callbackLoadComment && window.callbackLoadComment();
  }).then(function () {

    if (startTutorial) {
      startIntro();
    }

    var stop = false;
    if ($('#cvHTML .block-lnskill').length > 0) {
      $('#cvHTML .block-lnskill').each(function () {
        var self = this;
        if ($(this).text().indexOf('LANG_NOT_FOUND') > -1 && !stop) {
          var intro = introJs();
          intro.setOptions(Object.assign(introjsIntl, {
            scrollTo: 'tooltip',
            disableInteraction: true,
            steps: [
              {
                element: self,
                intro: intl("newVersion.langNotFound"),
                position: 'top'
              }
            ]
          }));
          intro.start();
          stop = true;
        }
      })
    }

  });
});

var bindCvVariables = function () {
  $('.metaoption, .fontoption, .sizeoption').change(function () {
    var type = $(this).attr('variable-type');
    var name = $(this).attr('variable-name');
    var value = $(this).val();
    updateCvVariantVariable(name, type, value);
  });

  $('.radiooption').change(function () {
    var type = $(this).attr('variable-type');
    var name = $(this).attr('variable-name');
    var radioname = $(this).attr('name');
    var selectedvalue = $('input[name="' + radioname + '"]:checked').val();
    updateCvVariantVariable(name, type, selectedvalue);
  });

  $('.colorSelector').each(function () {
    var type = $(this).attr('variable-type');
    var name = $(this).attr('variable-name');
    var value = $(this).attr('variable-value');
    var t = this;
    $(this).ColorPicker({
      color: value,
      onShow: function (colpkr) {
        $(colpkr).fadeIn(500);
        return false;
      },
      onHide: function (colpkr) {
        $(colpkr).fadeOut(500);
        value = $(t).attr('variable-value');
        updateCvVariantVariable(name, type, value);
        return false;
      },
      onChange: function (hsb, hex, rgb) {
        $('div', t).css('backgroundColor', '#' + hex);
        $(t).attr('variable-value', '#' + hex);
      }
    });
  });
};

var updateCVSizeColumn = function (size, variable) {
  updateCvVariantVariable(variable, 'SIZE', size.width);
};

var bindResizableElements = function () {
  $('*[resizable="true"]').each(function () {
    var minHeight = $(this).attr('resizable-min-height');
    var maxHeight = $(this).attr('resizable-max-height');
    var minWidth = $(this).attr('resizable-min-width');
    var maxWidth = $(this).attr('resizable-max-width');
    var handles = $(this).attr('resizable-handles');
    var width = $(this).width();
    var height = $(this).height();
    var ratio = $(this).attr('resizable-constraint-ratio') != 0 ? width / height : null;
    $(this).resizable({
      maxHeight: maxHeight ? maxHeight : height,
      maxWidth: maxWidth ? maxWidth : width,
      minHeight: minHeight ? minHeight : height,
      minWidth: minWidth ? minWidth : width,
      aspectRatio: ratio,
      handles: handles ? handles : null,
      stop: function (event, ui) {
        var cb = $(ui.element).attr('resizable-callback');
        var variable = $(ui.element).attr('variable-name');
        cb && window[cb](ui.size, variable);
      }
    });
  })
}
var bindMovableElements = function () {
  // console.log(currentCvPhotoOrientation);
  $('*[movable-background="true"]').each(function () {
    $(this).backgroundDraggable({
      bound: true,
      axis: currentCvPhotoOrientation === 'landscape' ? 'x' : (currentCvPhotoOrientation === 'portrait' ? 'y' : null),
      done: function (el) {
        var cb = $(el).attr('movable-background-callback');
        var backgroundPosition = $(el).css('background-position');
        var positions = backgroundPosition.replace('px', '').replace('px', '').split(' ');
        var x = positions[0] !== "50%" ? positions[0] : 0;
        var y = positions[1] !== "50%" ? positions[1] : 0;
        window[cb](x, y);
      }
    });
  });
}

var resizedCvPhoto = function (size) {
  requestPOST('/ajax/cv/' + cvId + '/photo/size',
    function (response) {
      if (response.success) {
        refreshCVFromHTMLCSS(response.CVHTMLCSS);
      }
    }, {
      width: parseInt(size.width),
      height: parseInt(size.height)
    });
};
var movedBackgroundPhoto = function (x, y) {
  requestPOST('/ajax/cv/' + cvId + '/photo/backgroundPosition', function (response) {
    if (response.success) {
      refreshCVFromHTMLCSS(response.CVHTMLCSS);
    }
  }, {
    x: parseInt(x),
    y: parseInt(y)
  });
};
var changeOrientationModePhoto = function () {
  requestPOST('/ajax/cv/' + cvId + '/photo/backgroundOrientation', function (response) {
    currentCvPhotoOrientation = response.currentMode;
    if (response.success) {
      refreshCVFromHTMLCSS(response.CVHTMLCSS);
    }
  });
}

var weightIntToTxt = function (i) {
  return intl('fontWeight.' + i);
}
var setFontSelectWeights = function (weightsSelect, stylesSelect, thisFontFamily) {
  var newvalues = $('option:selected', thisFontFamily).data('available-weights');
  var optionsWeights = ['<option value="">---</option>', newvalues.split(' ').map(function (v) {
    var styles = v.split('|')[1];
    v = v.split('|')[0];
    if (v) {
      return '<option value="' + v + '" data-available-styles="' + styles.replace(new RegExp(',', 'g'), ' ') + '">' + weightIntToTxt(v) + '</option>';
    }
  })];
  $('#' + weightsSelect + '').html(optionsWeights.join(''));
};

var createdCV = function (response) {
  if (response.success) {
    window.location = response.cvEditorURL
  } else {
    handleError(intl('createCV.' + response.reason));
  }
}


/**
 *  Payment & Download functions
 */

/**
 *
 * @param stripeResponse
 * @param order
 * @param cvId
 * @param cb
 */

var stripeResponseHandler = function (stripeResponse, order, cvId, cb) {
  if (stripeResponse.error) {
    cb(stripeResponse.error, null);
  } else {
    requestPOST('/ajax/payment/order/' + order.template_order.id + '/' + stripeResponse.source.id + '/' + (cvId ? cvId : 0), function (json) {
      if (json.success != false) {
        cb && cb(null, json);
      } else {
        cb && cb(json.error, null);
      }
    });
  }
};

var stripeCard = null;
var clearStripeCard = function () {
  if (stripeCard !== null) {
    stripeCard.clear();
  }
};

var PaymentPopup = function (url, options, fail, fn) {
  this.options = options || {};
  if (arguments.length == 2) {
    this.fn = this.options;
    this.options = {};
  }
  this.configure = function (options) {
    var width = options.width || 250;
    var height = options.height || 250;
    return {
      width: 500,
      height: 500,
    };
  };

  this.poll = function (popup, fn) {
    var done = fn;

    var parseParams = function (str) {
      return str.split('&').reduce(function (params, param) {
        var paramSplit = param.split('=').map(function (value) {
          return decodeURIComponent(value.replace(/\+/g, ' '));
        });
        params[paramSplit[0]] = paramSplit[1];
        return params;
      }, {});
    };

    var intervalId = setInterval(function polling() {
      if (popup.closed) {
        clearInterval(intervalId);
        done({popupClosed: true}, null);
        return;
      }
      try {
        var documentOrigin = document.location.host;
        var popupWindowOrigin = popup.location.host;
      } catch (e) {
      }
      ;

      if (popupWindowOrigin === documentOrigin && (popup.location.search || popup.location.hash)) {
        var queryParams = popup.location.search.substring(1).replace(/\/$/, '');
        var hashParams = popup.location.hash.substring(1).replace(/[\/$]/, '');
        var hash = parseParams(hashParams);
        var qs = parseParams(queryParams);

        qs = $.extend(qs, hash);

        if (qs.error) {
          clearInterval(intervalId);
          popup.close();
          done(qs.error, null);
        } else {
          clearInterval(intervalId);
          popup.close();
          done(null, qs);
        }
      }
    }, 35);
  };

  var str = $.param(this.configure(options));
  var popup = window.open(url, options.name || '', str);
  if (popup) {
    popup.focus();
    this.poll(popup, fn);
  } else {
    fail(intl('buyModel.labels.activatePopup'));
    $('#loading-payment').hide('normal', function () {
      $('#payment-form').show();
    });
  }
  return popup;
};


var handleLoadingStatus = function (key) {
  if ($('#loading-payment-status').text() != intl(key)) {
    $('#loading-payment-status').text(intl(key));
  }
};

var mountStripeForm = function (templateId, cvId, onSubmitCb, onPaymentSuccessCb, onPaymentFailCb, onMountStripeFailCb) {
  var cardElementId = 'card-element'
  var cardErrorsId = 'card-errors';
  var paymentFormId = 'payment-form'

  var elements = stripe.elements();
  var card = elements.create('card');
  stripeCard = card;
  card.mount('#' + cardElementId);
  card.addEventListener('change', function (event) {
    var displayError = document.getElementById(cardErrorsId);
    if (event.error) {
      displayError.textContent = event.error.message;
    } else {
      displayError.textContent = '';
    }
  });

  var idealBank = elements.create('idealBank');
  // Mount the iDEAL Bank Element on the page.
  idealBank.mount('#ideal-bank-element');

  var form = document.getElementById(paymentFormId);
  form.addEventListener('submit', function (e) {
    e.preventDefault();
    onSubmitCb(e);
    $('#payment-form').hide('normal', function () {
      $('#loading-payment').show();
    });
    var shipping = {
      name: form.querySelector('input[name=billing-name]').value,
      address: {
        line1: form.querySelector('input[name=billing-address]').value,
        zip: form.querySelector('input[name=billing-zip]').value,
        city: form.querySelector('input[name=billing-city]').value,
        country: form.querySelector('select[name=billing-country]').value
      },
    };

    handleLoadingStatus('buyModel.labels.processingPayment');

    requestPOST('/ajax/payment/order', function (json) {
      if (json.success) {
        if (currentPaymentMethod === 'card') {
          stripe.createSource(card, {
            owner: {
              name: json.response.order.name,
            },
          }).then(function (value) {
            stripeResponseHandler(value, json.response.order, cvId, function (err, res) {
              if (err) return onPaymentFailCb(err, templateId);
              $('#loading-payment').hide('normal', function () {
                $('#payment-form').show();
              });
              return onPaymentSuccessCb(res.response.templateId);
            });
          });
        } else {
          var sourceData = {
            type: currentPaymentMethod,
            amount: json.response.order.total,
            currency: 'eur',
            owner: {
              name: json.response.order.name,
              email: json.response.order.email,
            },
            redirect: {
              return_url: window.location.href,
            },
            statement_descriptor: 'CVDesignR',
            metadata: {
              order: json.response.order.template_order.id
            },
          };

          // Add extra source information which are specific to a payment method.
          switch (currentPaymentMethod) {
            case 'ideal':
              // iDEAL: Add the selected Bank from the iDEAL Bank Element.
              stripe.createSource(
                idealBank,
                sourceData
              ).then(function (response) {
                if (response.source.flow == 'redirect') {
                  handleLoadingStatus('buyModel.labels.popupPayment');
                  new PaymentPopup(response.source.redirect.url, {}, onPaymentFailCb, function (err, res) {
                    if (err) {
                      if (err.popupClosed) onPaymentFailCb(intl('buyModel.labels.popupClosed'));
                      $('#loading-payment').hide('normal', function () {
                        $('#payment-form').show();
                      });
                      return;
                    }
                    handleLoadingStatus('buyModel.labels.processingPayment');
                    var retryCounter = 0;
                    var pollingOrderStatusId = setInterval(function () {
                      requestGET('/ajax/payment/order/' + json.response.order.template_order.id, function (json) {
                        if (json.success) {
                          // payment success
                          if (json.order.status == 1) {
                            clearInterval(pollingOrderStatusId);
                            $('#loading-payment').hide('normal', function () {
                              $('#payment-form').show();
                            });
                            return onPaymentSuccessCb(json.order.template_id);
                          } else if (json.order.status == -2) { // payment fails
                            clearInterval(pollingOrderStatusId);
                            handleLoadingStatus('buyModel.labels.paymentFailed');
                            onPaymentFailCb(intl('buyModel.labels.paymentFailed'));
                            $('#loading-payment').hide('normal', function () {
                              $('#payment-form').show();
                            });
                            return;
                          } else if (json.order.status == 0) {
                            retryCounter++;
                            if (retryCounter >= 30) {
                              clearInterval(pollingOrderStatusId);
                              handleLoadingStatus('buyModel.labels.paymentPending');
                              onPaymentFailCb(intl('buyModel.labels.paymentPending'));
                              $('#loading-payment').hide('normal', function () {
                                $('#payment-form').show();
                              });
                              return;
                            }
                          }
                        } else {
                          clearInterval(pollingOrderStatusId);
                          return;
                        }
                      });
                    }, 1000);
                  });
                }
              });
              return;
              break;
            case 'sofort':
              // SOFORT: The country is required before redirecting to the bank.
              sourceData.sofort = {
                country: json.response.order.address.country,
              };
              break;
          }
          // Create a Stripe source with the common data and extra information.
          stripe.createSource(sourceData).then(function (response) {
            if (response.source.flow == 'redirect') {
              handleLoadingStatus('buyModel.labels.popupPayment');
              new PaymentPopup(response.source.redirect.url, {}, onPaymentFailCb, function (err, res) {
                if (err) {
                  if (err.popupClosed) onPaymentFailCb(intl('buyModel.labels.popupClosed'));
                  $('#loading-payment').hide('normal', function () {
                    $('#payment-form').show();
                  });

                  return;
                }
                handleLoadingStatus('buyModel.labels.processingPayment');
                var retryCounter = 0;
                var pollingOrderStatusId = setInterval(function () {
                  requestGET('/ajax/payment/order/' + json.response.order.template_order.id, function (json) {
                    if (retryCounter < 30) {
                      if (json.success) {
                        // payment success
                        if (json.order.status == 1) {
                          clearInterval(pollingOrderStatusId);
                          $('#loading-payment').hide('normal', function () {
                            $('#payment-form').show();
                          });
                          return onPaymentSuccessCb(json.order.template_id);
                        } else if (json.order.status == -2) { // payment fails
                          clearInterval(pollingOrderStatusId);
                          onPaymentFailCb(intl('buyModel.labels.paymentFailed'));
                          $('#loading-payment').hide('normal', function () {
                            $('#payment-form').show();
                          });
                          return;
                        } else if (json.order.status == 0) {
                          retryCounter++;
                          if (retryCounter >= 30) {
                            clearInterval(pollingOrderStatusId);
                            handleLoadingStatus('buyModel.labels.paymentPending');
                            onPaymentFailCb(intl('buyModel.labels.paymentPending'));
                            $('#loading-payment').hide('normal', function () {
                              $('#payment-form').show();
                            });
                            return;
                          }
                        }
                      } else {
                        clearInterval(pollingOrderStatusId);
                        return;
                      }
                    }
                  });
                }, 1000);
              });
            }
          });
        }
      } else {
        onPaymentFailCb(json.error);
        setTimeout(function () {
          $('#loading-payment').hide('normal', function () {
            $('#payment-form').show();
          });
        }, 500);
        return;
      }
    }, $.param($.extend({templateId: templateId}, shipping)));
  });
};

var onCloseTemplatePayment = function () {
  $('#overlay-content').empty();
  currentPaymentMethod = 'card';
};

var getTemplatePaymentForm = function (templateId) {
  return new Promise(function (resolve, reject) {
    requestPOST('/ajax/payment/getTemplatePaymentForm', function (json) {
      if (json.success) {
        var $el = $(json.html);
        currentPaymentMethod = 'card';
        $el.attr('onClose', 'onCloseTemplatePayment');
        resolve($(json.html));
      } else {
        if (json.isLocked) {
          resolve(json.actionToUnlock);
        } else {
          resolve(false);
        }
      }
    }, {templateId: templateId});
  });
};

var currentPaymentMethod = 'card';

var bindPaymentInformations = function ($modal) {
  $('.payment-methods li', $modal).click(function () {
    var current = $(this);
    if (!current.hasClass('choosed') && current.data('payment') != currentPaymentMethod) {
      var oldSelectedPayment = $('.payment-methods li[data-payment=' + currentPaymentMethod + ']');
      oldSelectedPayment.removeClass('choosed');
      $('#' + oldSelectedPayment.data('open')).hide();
      current.addClass('choosed');
      $('#' + current.data('open')).show();
      currentPaymentMethod = current.data('payment');
    }
  });
};

/**
 *
 * @param templateId
 * @param cvId
 * @param successCb ( hasBeenBought?Bool, templateId, cvId, cvhtmlcss (fed if hasBeenBought===true) )
 */
var askForDownload = function (templateId, cvId, successCb) {
  getTemplatePaymentForm(templateId).then(function (response) {
    if (response !== false && response !== 'locked') {
      // paying template, response contains form html

      // response is a jQuery element
      feedOverlay(response, 'dark');
      response.bind('touchstart mousedown', function (event) {
        event.stopPropagation()
      });

      var paymentFormId = 'payment-form'
      var $paymentForm = $('#' + paymentFormId);

      bindPaymentInformations($paymentForm);

      var checkTermsOfSales = function () {
        /*
        if ($(this).is(':checked')) {
            $('#' + paymentFormId).find('input[type="submit"]').prop('disabled', false);
        } else {
            $('#' + paymentFormId).find('input[type="submit"]').prop('disabled', true);
        }
        */
      };
      $paymentForm.find('input[type="checkbox"]').each(checkTermsOfSales);
      $paymentForm.find('input[type="checkbox"]').change(checkTermsOfSales);

      var onSubmitCb = function (e) {
        $('input[type="submit"]', $paymentForm).prop('disabled', true);
        $('input[type="submit"]', $paymentForm).addClass('loading');
      };
      var onPaymentSuccessCb = function (templateId) {
        $('input[type="submit"]', $paymentForm).prop('disabled', false);
        $('input[type="submit"]', $paymentForm).removeClass('loading');
        successCb(true, templateId, cvId, $paymentForm);
      };
      var onPaymentFailCb = function (e) {
        $('input[type="submit"]', $paymentForm).prop('disabled', false);
        $('input[type="submit"]', $paymentForm).removeClass('loading');
        handleFormMessage($paymentForm, e, 'danger');
      };
      var onMountStripeFailCb = function () {
        $('input[type="submit"]', $paymentForm).prop('disabled', false);
        $('input[type="submit"]', $paymentForm).removeClass('loading');
      };
      mountStripeForm(templateId, cvId, onSubmitCb, onPaymentSuccessCb, onPaymentFailCb, onMountStripeFailCb)

    } else {
      // template free
      successCb(false, templateId, cvId, null);
    }
  })
};

var downloadingCV = function () {
  $('#downloadCV select').addClass('disabled');
  $('#downloadCV .loading').show();
};

var downloadedCV = function (response) {
  $('#downloadCV a').removeClass('disabled');
  $('#downloadCV select').removeClass('disabled');
  $('#downloadCV input').prop('disabled', false);
  $('#downloadCV .loading').hide();
  if (response.success) {
    if ($('#downloadCV a').hasClass('tooltipstered')) {
      $('#downloadCV a').tooltipster('destroy');
    }
    $('#downloadCV a').attr('title', '');
    $('#downloadCV a').attr('target', '_blank');
    $('#downloadCV a').attr('href', response.pdfURL);
    $('#downloadCV a').removeClass('disabled');
  }
};

var beforeSendDownload = function () {
  $('#downloadCV input').prop('disabled', true);
};

var openDownloadModal = function (cvId) {
  requestPOST('/ajax/payment/getCvDownloadForm', function (json) {
    if (json.success) {
      var $paymentForm = $(json.html);
      feedOverlay($paymentForm);

      loadTheTooltips();
      var formSet = false;
      $('#downloadCV select').change(function () {
        formSet = true;
        $('#downloadCV select').each(function () {
          if (!$(this).val()) {
            formSet = false;
          }
        })
        if (formSet) {
          $('#downloadCV input[type="submit"]').trigger('click');
        }
      });

      if (json.autoLoadDownload) {
        setTimeout(
          function () {
            $('#downloadCV input[type="submit"]').trigger('click');
          },
          200
        );
      }

      bindAjaxForm('#downloadCV', downloadedCV, downloadingCV, beforeSendDownload)
    }
  }, {cvId: cvId});
};

var markCVAsReadyToComment = function (response) {
  console.log(response);
  location.reload();
};