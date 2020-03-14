jQuery(document).ready(function( $ ) {
    
    var panel = $( '#demo-panel' );

    $( '#demo-toggle' ).click(function( e ) {
        
        e.preventDefault();
        
        if ( panel.hasClass( 'active' ) ) {
            close();
        } else {
            open();
        }
    
    });
    
    function open() {
        
        panel
        .addClass( 'active' );
        
        Cookies.set('panel_state', 'open', { expires: 7 });
    }
    
    function close() {
        panel
        .removeClass( 'active' );
        
        Cookies.set('panel_state', 'close', { expires: 7 });
    }
    
    function fastClose() {
        
    }
    
    function checkCookie() {
        
        var panel_state = Cookies.get( "panel_state" );
        if ( panel_state == 'close' ) {
            
            close();
            
        // open it by default
        } else {
            open();
        }
        
    }
    
    checkCookie();

});