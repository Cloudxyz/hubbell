export function handleDynamic(btn, container) {

    let counter_option = 0;
    let counter_option_inner = 0;

    btn.on('click', function(){
        container.css('display', 'block');
        container.append(
            '<div class="input-container">' +
                '<label>Titulo de la sección</label><br>' +
                '<input type="text" name="list_dynamic['+counter_option +'][title_section][]" />' +
            '</div>' +
            '<div class="btn btn-success add_sub_detail" data-section-container=".section_container_'+counter_option +'" data-section="list_dynamic['+counter_option +']">' +
                '<i class="i-Add"></i>Agregar Detalle' +
            '</div>' +
            '<div class="section_container_'+counter_option+'">' +
            '</div>'

        );
        counter_option++;

        $.each($('.add_sub_detail'), function(e,v){
            $(v).on('click', function(){
                var curren_container = $(v).data('section-container');
               console.log(curren_container);
                var current_section = $(v).data('section');

               $(curren_container).append(
                   '<div class="input-container">' +
                        '<label>Titulo</label><br>' +
                        '<input type="text" name="list_dynamic['+current_section+']['+counter_option_inner +'][title][]" />' +
                   '</div>' +
                   '<div class="input-container">' +
                        '<label>Descripción</label><br>' +
                        '<input type="text" name="list_dynamic['+current_section+']['+counter_option_inner +'][description][]" />' +
                   '</div>'
               )
                counter_option_inner++;
            });
        });
    });



    return null;
}
