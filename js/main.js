$("#botaoLimpar").click(function () {
    $("#login").val("");
    $("#senha").val("");
})

//autenticar
// function valida() {

//     if (form['usu'].value == "") {
//         alert("O campo USUARIO e obrigatorio");
//         form['usu'].focus();
//         return false
//     }

//     if (form['senha'].value == "") {
//         alert("O campo SENHA e obrigatorio");
//         form['senha'].focus();
//         return false
//     }
// }

//MOSTRAR SENHA
$("#togglePassword").click(function() {
    var input = $("#senha")
    input.attr('type', input.attr("type") === "text" ? 'password' : 'text')
    var icon = $("#icone-senha")
    // toggle icon class
    icon.toggleClass('fa-eye-slash fa-eye')

 
});