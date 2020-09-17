try {
  window.Popper = require('mdbootstrap/js/popper').default;
  window.$ = window.jQuery = require('mdbootstrap/js/jquery');
  require('mdbootstrap/js/bootstrap');
  require('mdbootstrap');
} catch (e) { }