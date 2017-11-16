
require('./form');
require('./errors');
require('./http');
if( 'Sgs' in window )  {
    $.extend(Sgs, require('./http'));
}
