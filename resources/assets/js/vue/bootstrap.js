
require('./form');
require('./errors');

if ('Sg' in window) {
    $.extend(Sg, require('./http'));
}