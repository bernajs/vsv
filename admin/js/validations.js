  $('.isRequired').on('keyup', (function () {$(this).parent().removeClass('has-danger');}));
  $('.isNumber').keyup(function () { this.value = this.value.replace(/[^0-9\.]/g, ''); });

document.addEventListener('DOMContentLoaded', () => {

  // var telephone = new Cleave('.isTelefono', {
  //     phone: true,
  //     phoneRegionCode: '{MX}'
  // });
  //
  // var precio = new Cleave('.isPrecio', {
  //     delimiters: ['.', ',', ','],
  //     blocks: [2, 3, 3],
  //     uppercase: true
  // });
  //
  // var hora = new Cleave('.isHora', {
  //     delimiters: [':', ':'],
  //     blocks: [2, 2],
  //     uppercase: true
  // });
});
