 
function like(id) {
    // window.location = "like.php?idpost=" + id;
    $.ajax({
        url: "post/like.php?idpost=" + id,
        success: function () {
            $("#like" + id).removeClass("fa-regular");
            $("#like" + id).addClass("fa-solid");
        }
    });
}

function save(id) {
    //window.location = "post/save.php?idpost=" + id;
    $.ajax({
            url: "post/save.php?idpost=" + id,
            success: function(data) {
                $("#save").removeClass("fa-thin");
                $("#save").addClass("fa-solid");
            }
        });
}


//da capire cosa fare
function tag(id) {
    window.location = "post/tag.php?idpost=" + id;
    // $.ajax({
    //         url: "tag.php?idpost=" + id,
    //         success: function(data) {
    //             $("#save").removeClass("fa-thin");
    //             $("#save").addClass("fa-solid");
    //         }
    //     });
}
