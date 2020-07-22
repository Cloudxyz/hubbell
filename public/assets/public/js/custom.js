(function($) {
    $(".action-add-cart").on("click", function() {
        var button = $(this);
        var oldValue = button.parent().parent().find(".js-qty-selector-input").val();
    
        if (button.hasClass('js-qty-selector-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
    
        button.parent().parent().find(".js-qty-selector-input").val(newVal);
    
    });

    $(".btn-show-option-cart").each(function(i,v){
        $(v).on('click', function(){
            $('.panel-collapse').each(function(j,w){
                $(w).removeClass('show');
            });
            $("input[name='actionRadio']").each(function(x,y){
                $(y).removeAttr('checked');
            });
            $(v).closest('.panel-collapse').addClass('show');
            $(v).find("input[name='actionRadio']").prop('checked', 'checked')
        });
    });
})(jQuery);