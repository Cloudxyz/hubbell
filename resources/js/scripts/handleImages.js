export function handleImages() {
    let fileContainer = $('.file-container');

    fileContainer.mouseenter(function() {
        $(this).find('.card-img-overlay').fadeIn();
    });

    fileContainer.mouseleave(function() {
        $(this).find('.card-img-overlay').fadeOut();
    });

    if($('#sort_files').length){
        var currentFiles = jQuery.parseJSON($('#sort_files').val());
    }

    $( "#sortable" ).sortable({
        revert: true,
        update: function() {
            var getImages = $('#sortable').find('.file-container');
            var dragOrder = [];
            var newOrderFiles = [];
            $.each( getImages, function( key, value ) {
                dragOrder.push({id:$(value).data('id'), order:key+1});
            });
            dragOrder = dragOrder.filter(function( element ) {
                return element !== undefined;
            });
            $.each( currentFiles, function( key, value ) {
                $.each( dragOrder, function( key, e ) {
                    if(value['id'] == e['id']){
                        value['order'] = e['order'];
                    }
                });
                newOrderFiles.push(value);
            });
            $('#sort_files').val(JSON.stringify(newOrderFiles));
        }
    });


    fileContainer.draggable({
        connectToSortable: "#sortable",
        revert: "invalid",
    });


    return null;
}
