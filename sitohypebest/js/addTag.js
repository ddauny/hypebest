
function tag(idpost, tag, nometag) {
    $.ajax({
        url: "../post/tag.php?idpost=" + idpost + "&tag=" + tag + "&nometag=" + nometag,
        success: function () {
        }
    });
}
