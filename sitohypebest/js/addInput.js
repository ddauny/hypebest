function aggiungiInput() {
    // Get the element where the inputs will be added to
    var container = document.getElementById("container-input");
    // Create an <input> element, set its type and name attributes
    var div=document.createElement("div");
    div.className="input-group";
    // container.appendChild(div);

    var input = document.createElement("input");
    input.type = "text";
    input.name = "tag[]";
    input.className="form-control";
    input.placeholder="@utente o link prodotto";
    div.appendChild(input);

    var input = document.createElement("input");
    input.type = "text";
    input.name = "nometag[]";
    input.className="form-control";
    input.placeholder="nome da visualizzare";
    div.appendChild(input);


    var div2=document.createElement("div");
    div2.className="input-group-append";
    // container.appendChild(div);

    // var input = document.createElement("input");
    // input.type = "button";
    // input.className="form-control buttonTag";
    // input.value="Aggiungi tag";
    // input.onclick="aggiungiInput()";

    // // var input="<input type'button' name='form-control buttonTag' value='Aggiungi tag' onclick='aggiungiInput()'";
    // div2.appendChild(input);

    div.appendChild(div2);
    container.appendChild(div);

    console.log("aggiunto");

}