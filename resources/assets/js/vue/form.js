window.Form = function (data) {
    var form = this;

    $.extend(this, data);

    this.errors = new FormErrors();

    this.startProcessing = function () {
        form.errors.forget();
    };

    this.resetStatus = function () {
        form.errors.forget();
    };

    this.setErrors = function (errors) {
        form.errors.set(errors);
    };
};
