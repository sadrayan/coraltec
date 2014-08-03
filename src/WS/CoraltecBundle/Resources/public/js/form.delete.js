/**
 * Created by sadra on 3/22/14.
 */
$(document).ready(function(){

    $(".delete").confirm({
        text: "Are you sure you want to delete your application?",
        title: "Confirmation required",
        confirm: function(button) {
            //get url
            var url = button.attr("href");

            var posting = $.post( url );

            posting.done(function( data ) {
                var pieces = url.split("/");
                var id = "#app_" + pieces[pieces.length-1];

                var app_element = $(id);

                // remove the application from list
                app_element.hide('slow', function(){
                    app_element.remove();
                });

            });
        },
        cancel: function(button) {
            // do nothing
        },
        confirmButton: "Yes I am",
        cancelButton: "No",
        post: true
    });
});