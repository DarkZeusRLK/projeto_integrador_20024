
function formatarNDC() {
}
function formatarVAL() {
  var input = document.getElementById("valInput");
  var val = input.value.replace(/\D/g, ""); // Remove todos os caracteres não numéricos
  val = val.replace(/(\d{2})(\d)/, "$1/$2"); // Insere uma barra após os primeiros 2 dígitos
  input.value = val;
}
function formatarCVV() {
  var input = document.getElementById("cvvInput");
  var cvv = input.value.replace(/\D/g, ""); // Remove todos os caracteres não numéricos
  cvv = cvv.replace(/(\d{3})(\d)/,); // 
  input.value = cvv;
}
function formatarCPF() {
  var input = document.getElementById("cpfInput");
  var cpf = input.value.replace(/\D/g, ""); // Remove todos os caracteres não numéricos
  cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2"); // Insere um ponto após os primeiros 3 dígitos
  cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2"); // Insere um ponto após os próximos 3 dígitos
  cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2"); // Insere um traço antes dos últimos 2 dígitos
  input.value = cpf;
}

function formatarTelefone() {
  var input = document.getElementById("telefoneInput");
  var telefone = input.value.replace(/\D/g, ""); // Remove todos os caracteres não numéricos
  telefone = telefone.replace(/(\d{2})(\d{5})(\d{4})/, "($1) $2-$3"); // Formata o número com DDD entre parênteses e hífen
  input.value = telefone;
}