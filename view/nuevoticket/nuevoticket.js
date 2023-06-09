
function init(){
     $("#ticket_from").on("submit",function(e){
        guardaryeditar(e);
    });

}

$(document).ready(function() {
    $('#tick_descrip').summernote({
        height: 350,
        lang: "es-ES",
        popover:{
            image: [],
            link: [],
            air: [],
        },
        callbacks: {
            onImageUpload: function(image){
                console.log("Image detect...");
                myimagereat([0]);
            },
            onPaste: function (e) {
                console.log("Text detect...");
            }
        }
    });

    $.post("../../controller/categoria.php?op=combo",function(data, status){
        $('#id_cat').html(data);
    });

});


function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#ticket_from")[0]);
    $.ajax({
        url: "../../controller/ticket.php?op=insert",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            console.log(datos);
        }
    });
}

init();