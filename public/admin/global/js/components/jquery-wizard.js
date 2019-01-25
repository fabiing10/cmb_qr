/*!
 * remark (http://getbootstrapadmin.com/remark)
 * Copyright 2016 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */
$.components.register("wizard", {
  mode: "default",
  defaults: {
    step: ".steps .step, .pearls .pearl",
    templates: {
      buttons: function() {
        var options = this.options;
        return '<div class="wizard-buttons">' +
          '<a class="btn btn-default btn-outline" href="#' + this.id + '" data-wizard="back" role="button">Atras</a>' +
          '<a class="btn btn-primary btn-outline pull-right" href="#' + this.id + '" data-wizard="next" role="button">Siguiente</a>' +
          '<a class="btn btn-success btn-outline pull-right" href="#' + this.id + '" data-wizard="finish" role="button">Finalizar</a>' +
          '</div>';
      }
    }
  }
});
