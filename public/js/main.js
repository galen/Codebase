$(document).ready(function(){

    $('.delete-code').click(function(){
        ths = $(this);
        prnt = ths.closest( 'ul' );
        if ( prnt.data( 'locked' ) == 1 ) {
            alert( 'This code is locked. You can\'t delete it.' );
            return false;
        }
        if ( !confirm( "Do you want to delete code '"+ ths.data('code-name') + "'" ) ) {
            return false;
        }
        $.ajax({
            type: 'DELETE',
            url: '/api/delete/' + prnt.data( 'id' ),
            data: {}
        }).done( function( data ) {
            deleted = parseInt( data );
            if( deleted === 1 ) {
                prnt.slideUp();
            }
            else {
                alert( 'Error deleting the code' );
            }
        }).fail( function( xhr ) {
            data = jQuery.parseJSON( xhr.responseText );
            if ( typeof( data.error ) !== undefined ) {
                alert( data.error );
            }
            else {
                alert( 'Error deleting the code' );
            }
        });

        return false;
    });

    $('.star-code, .lock-code').click(function(){
        ths = $(this);
        prnt = ths.closest( 'ul' );
        if ( ths.hasClass( 'star-code' ) ) {
            active_class = 'starred';
            endpoint = 'star';
            verb = 'starring';
        }
        else {
            password = prompt( 'Enter the lock password' );
            if ( password === null || password === '' ) {
                return false;
            }
            active_class = 'locked';
            endpoint = 'lock';
            verb = 'locking';
        }
        $.ajax({
            type: 'POST',
            url: '/api/' + ( ths.hasClass( active_class ) ? 'un' : '' ) + endpoint + "/" + prnt.data( 'id' ),
            data: endpoint === 'lock' ? {password: password} : {}
        }).done( function( data ) {
            result = parseInt( data );
            if( result === 1 ) {
                ths.toggleClass( active_class );
            }
            else {
                alert( 'Error ' + verb + ' the code' );
            }
        }).fail( function( xhr ) {
            data = jQuery.parseJSON( xhr.responseText );
            if ( typeof( data.error ) !== undefined ) {
                alert( data.error );
            }
            else {
                alert( 'Error ' + verb + ' the code' );
            }
        });

        return false;
    });

});
