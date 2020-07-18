export function handleResources() {

    let counter_option = 0;

    $('.add_resource').on('click', function(){
        $('#resources_container').css('display', 'block');
        $('#resources_container').append(
            '<div class="section_container">' +
                '<div class="input-container">' +
                    '<label>Titulo de sección</label><br>' +
                    '<input type="text" name="section_resource['+counter_option +'][title][]" />' +
                '</div>' +
                '<div class="input-container">' +
                    '<label>Archivo de sección</label><br>' +
                    '<input type="file" name="section_resource['+counter_option +'][resource][]" />' +
                '</div>' +
            '</div>'

        );
        counter_option++;
    });

    return null;
}
