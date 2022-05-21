
function like(id, liked) {
    // window.location = "like.php?idpost=" + id;
    let s = "post/like.php?idpost=" + id;
    if (liked) s = "post/unlike.php?idpost=" + id;
    $.ajax({
        url: s,
        success: function () {
            if (!liked) {
                $("#like" + id).removeClass("fa-regular");
                $("#like" + id).addClass("fa-solid");
                $("#save" + id).addClass("blackIcon");
                $("#save" + id).addClass("redIcon");
            } else {
                $("#like" + id).removeClass("fa-solid");
                $("#like" + id).addClass("fa-regular");
            }
            window.location.reload("index.php");
        }
    });
}

function save(id,saved) {
    //window.location = "post/save.php?idpost=" + id;
    let s = "post/save.php?idpost=" + id;
    if (saved) s = "post/unsave.php?idpost=" + id;
    $.ajax({
        url: s,
        success: function () {
            if (!saved) {
                $("#save" + id).removeClass("fa-regular");
                $("#save" + id).addClass("fa-solid");
                $("#save" + id).removeClass("redShirt");
            } else {
                //$("#save" + id).removeClass("redShirt");
                //$("#save" + id).removeClass("fa-solid");
                //$("#save" + id).addClass("fa-regular");
                $("#save" + id).addClass("redShirt");
            }
            window.location.reload("index.php");
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
