require('./bootstrap');

import Alpine from 'alpinejs';
import Noty from 'noty';

function notyAPI (text, type) {
    new Noty({
        text,
        type,
        theme: "nest"
    }).show();
}

window.Noty = notyAPI;
window.Alpine = Alpine;

Alpine.start();
