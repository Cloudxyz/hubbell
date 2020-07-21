export function handleDynamic(btn, container) {

    let counter_option = 0;
    let counter_option_inner = 0;

    btn.on('click', function(){
        container.css('display', 'block');
        container.append(
            '<div class="input-container">' +
                '<label>Titulo de la sección</label><br>' +
                '<input class="form-control" type="text" name="list_dynamic['+counter_option +'][title_section][]" />' +
            '</div>' +
            '<div class="btn add_sub_detail" data-section-container=".section_container_'+counter_option +'" data-section="'+counter_option +'">' +
                '<i class="i-Add"></i>Agregar Detalle' +
            '</div>' +
            '<div class="section_details_container section_container_'+counter_option+'">' +
            '</div>'

        );

        counter_option++;

        $.each($('.add_sub_detail'), function(e,v){
            $(v).on('click', function(){
                var curren_container = $(v).data('section-container');
                var current_section = $(v).data('section');

               $(curren_container).append(
                   '<div class="detail_container">' +
                       '<div class="input-container">' +
                            '<label>Titulo</label><br>' +
                            '<input class="form-control" type="text" name="list_dynamic['+current_section+'][details]['+counter_option_inner +'][title][]" />' +
                       '</div>' +
                       '<div class="input-container">' +
                            '<label>Descripción</label><br>' +
                            '<textarea class="form-control" name="list_dynamic['+current_section+'][details]['+counter_option_inner +'][description][]"></textarea>' +
                       '</div>' +
                    '</div>'
               );
               counter_option_inner++;
            });
        });
    });

    $.each($('.btn_edit_detail'), function(e,v){
        $(v).on('click', function(x){
            $('.detail_container_edit').css('display', 'flex');
            x.preventDefault();
            $("html, body").animate({ scrollTop: $($('#title_section_edit')).offset().top - 200 }, 500);
            $('#title_section_edit').focus();
            let id = $(v).data('id');
            let title_section = $(v).data('title-section');
            let title = $(v).data('title');
            let description = $(v).data('description');

            $('#id_edit').val(id);
            $('#title_section_edit').val(title_section);
            $('#title_edit').val(title);
            $('#description_edit').val(description);
        });
    });

    return null;
}
