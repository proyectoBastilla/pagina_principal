
/*ESTO ES PARA QUE FUNCIONEN CORRECTAMENTE LOS TOOLTIPS,
ES OBLIGATORIO INICIALIZARLO MANUALMENTE*/

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})


/*ESTO ES PARA QUE FUNCIONEN CORRECTAMENTE LOS POPOVERS,
ES OBLIGATORIO INICIALIZARLO MANUALMENTE*/

var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})

var popover = new bootstrap.Popover(document.querySelector('.popover-dismiss'), {
  trigger: 'focus'
})
