const rhtml = document.querySelector("#Resultado");
const enviar = document.querySelector("#enviar");
const dta = document.querySelector("#dta");
const hrs = document.querySelector("#hrs");

console.log(dta);

function enviarF() {
    var dtah = dta.value;
    var hrsh = hrs.value;
    var dataAtual = new Date;
    var dataNascimento = new Date(dtah + " " + hrsh);
    var dataDiferenca = dataAtual - dataNascimento;

    var anos = Math.floor(dataDiferenca / (1000 * 60 * 60 * 24 * 365));
    var meses = Math.floor(dataDiferenca / (1000 * 60 * 60 * 24 * 30));
    var dias = Math.floor(dataDiferenca / (1000 * 60 * 60 * 24));
    var horas = Math.floor(dataDiferenca / (1000 * 60 * 60));
    var minutos = Math.floor(dataDiferenca / (1000));
    var segundos = Math.floor(dataDiferenca / (1000 / 60));



    rhtml.innerHTML = "Você tem " + anos + " anos, " + meses + " meses, " + dias + " dias, " + horas + " horas, " + minutos + " minutos e " + segundos + " segundos de vida.";
    console.log(dtah + " " + hrsh);

    
}

enviar.onclick = enviarF;