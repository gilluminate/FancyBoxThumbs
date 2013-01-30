( function ( $ ) {
    //remove the link to the file:image page and replace it with a link to the original file to be displayed inside the fancybox modal window.
    $("a.image").each(function () {
        "use strict";
        var img_src_parts, new_img_src, orig_img_src = $(this).find('img').attr("src");

        //break up the image link into an array
        img_src_parts = orig_img_src.split("/");

        if ($.inArray("thumb", img_src_parts) < 0) {
            // If true, this is not the thumbnail. Original is probably smaller than Thumb size.
            new_img_src = orig_img_src;
        } else {
            //remove "thumb" from path
            img_src_parts.splice($.inArray("thumb", img_src_parts), 1);

            //remove thumbnail filename (from the end of the src)
            img_src_parts.splice(img_src_parts.length - 1, 1);

            //re-assemble the path
            new_img_src = img_src_parts.toString().replace(/\,/g, "/");
        }

        //attach new path to this link
        $(this).attr("href", new_img_src).attr("rel", "group").addClass('fancybox');
    });

    //now set fancybox on all thumbnail links
    //fbtFancyBoxOptions is set in LocalSettings.php
    //example {closeBtn:false}
    $("a.fancybox").fancybox(fbtFancyBoxOptions);
}( jQuery ) );