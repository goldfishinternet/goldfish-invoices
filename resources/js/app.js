import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;

document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}, false);
