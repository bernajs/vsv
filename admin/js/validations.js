  $('.isRequired').on('keyup', (function () {$(this).parent().removeClass('has-danger');}));
  $('.isNumber').keyup(function () { this.value = this.value.replace(/[^0-9\.]/g, ''); });
