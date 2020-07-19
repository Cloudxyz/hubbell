import { getViewport } from "./scripts/getViewport.js";
import { handleMenuFit } from "./scripts/handleMenuFit.js";
import { handleCategory } from "./scripts/handleCategory.js";
import { handleImages } from "./scripts/handleImages.js";
import { handleResources } from "./scripts/handleResources.js";
import { handleDynamic } from "./scripts/handleDynamic.js";
import { handleRichEditor } from "./scripts/handleRichEditor.js";
import { initDatepickerComponents } from "./scripts/initDatepickerComponents.js";
import { initFastSelectComponents } from "./scripts/initFastSelectComponents.js";
import { initMapInputComponents } from "./scripts/initMapInputComponents.js";
import { initTimepickerComponents } from "./scripts/initTimepickerComponents.js";
import { initDropZoneComponents } from "./scripts/initDropZoneComponents.js";

Dropzone.autoDiscover = false;

$(function() {
    /////////////////////////////
    /////////////////////////////

    var viewport = { x: 0, y: 0 };

    /////////////////////////////
    /////////////////////////////

    function init() {
        $(window).resize(resize);
        handleMenuFit();

        initDatepickerComponents();
        initFastSelectComponents();
        initMapInputComponents();
        initTimepickerComponents();
        initDropZoneComponents();
        handleCategory();
        handleImages();
        handleResources();
        handleDynamic($('.add_detail'), $('#details_container'));
        handleRichEditor();
    }

    function resize() {
        viewport = getViewport();
        handleMenuFit();
    }

    /////////////////////////////
    /////////////////////////////

    init();

    /////////////////////////////
    /////////////////////////////
});
