function aggiungiInput() {
    // Get the element where the inputs will be added to
    var container = document.getElementById("container-input");
    // Create an <input> element, set its type and name attributes
    var div=document.createElement("span");
    div.className="input-group";
    container.appendChild(div);

    var input = document.createElement("input");
    input.type = "text";
    input.name = "tag[]";
    input.className="form-control";
    input.placeholder="@utente o link prodotto";
    container.appendChild(input);

    var input = document.createElement("input");
    input.type = "text";
    input.name = "nometag[]";
    input.className="form-control";
    input.placeholder="nome da visualizzare";
    container.appendChild(input);

    console.log("aggiunto");

}