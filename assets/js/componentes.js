function showPassword(field, input1, input2) {

  let campo = "password";
  let notVision = "none";
  let vision = "flex";

  if (document.getElementsByName(field)[0].type == "password") {
    campo = "text";
    notVision = "flex";
    vision = "none";
  }



  document.getElementsByName(field)[0].type = campo;
  document.getElementById(input1).style.display = notVision;
  document.getElementById(input2).style.display = vision;
}


function responsiveBar() {


  if (document.getElementsByClassName("nav-bar-links")[0].style.display == 'flex') {
    document.getElementsByClassName("nav-bar-links")[0].style.display = 'none';
  }
  else {
    document.getElementsByClassName("nav-bar-links")[0].style.display = 'flex';
  }
}





function detalhesPedido(id) {


  if(id == 'ocutarDetalhes'){

    obj = document.getElementsByClassName(id);

    if(document.getElementById('btnGeralDetalhes').innerText == 'Abrir'){

      document.getElementById('btnGeralDetalhes').innerText = 'Fechar';
      for(let i=0; i<obj.length; i++){
        obj[i].style.display = 'table-row';
      }
      
    }else{

      document.getElementById('btnGeralDetalhes').innerText = 'Abrir';
      for(let i=0; i<obj.length; i++){
        obj[i].style.display = 'none';
      }

    }
  }
  else{

    obj = document.getElementById(id);

    if (obj.style.display == 'none') {
      obj.style.display = 'table-row'
    }
    else {
      obj.style.display = 'none'
    }

  }

}

//Elimirar essa função depois - Alessandro

function trocarFundo(obj, id){
  
  if(obj.children[0].id == 'icon_x'){
      obj.children[0].id = 'icon_v';
      obj.children[0].classList.replace('fa-times', 'fa-check');
      document.getElementById(id).style.backgroundColor= "#f6fff7";
  }else{
      document.getElementById(id).style.backgroundColor= "#ffebeb";
      obj.children[0].id = 'icon_x';
      obj.children[0].classList.replace('fa-check', 'fa-times');
  }
}

function trocarFundoProcesso(obj, id){
  
  if(obj.children[0].id == 'icon_x'){
      obj.children[0].id = 'icon_v';
      obj.children[0].classList.replace('fa-times', 'fa-check');
  
  }else{
 
      obj.children[0].id = 'icon_x';
      obj.children[0].classList.replace('fa-check', 'fa-times');
  }
}


function marcarPedidos(id) {

    obj = document.getElementsByClassName(id);

    if(document.getElementById('btnGeralMarcar').innerText == 'Marcar'){

      document.getElementById('btnGeralMarcar').innerText = 'Limpar';
      for(let i=0; i<obj.length; i++){

        obj[i].children[0].checked = true;
        obj[i].children[1].children[0].id = 'icon_v';
        obj[i].children[1].children[0].classList.replace('fa-times', 'fa-check');

        document.getElementById(obj[i].children[0].value).style.backgroundColor= "#f6fff7";
      }
      
    }else{

      document.getElementById('btnGeralMarcar').innerText = 'Marcar';
      
      for(let i=0; i<obj.length; i++){
      
        obj[i].children[0].checked = false;
        obj[i].children[1].children[0].id = 'icon_x';
        obj[i].children[1].children[0].classList.replace('fa-check', 'fa-times');
        document.getElementById(obj[i].children[0].value).style.backgroundColor= "#ffebeb";

      }

    }
}



function detalhesProcesso(id) {


  if(id == 'ocultarPedidos'){

    obj = document.getElementsByClassName(id);

    if(document.getElementById('btnGeralPedidos').innerText == 'Abrir pedidos'){

      document.getElementById('btnGeralPedidos').innerText = 'Fechar pedidos';
      for(let i=0; i<obj.length; i++){
        obj[i].style.display = 'table-row';
      }
      
    }else{

      document.getElementById('btnGeralPedidos').innerText = 'Abrir pedidos';
      for(let i=0; i<obj.length; i++){
        obj[i].style.display = 'none';
      }

    }

  }
  else{


    
    obj = document.getElementById(id);

    if (obj.style.display == 'none') {
      obj.style.display = 'table-row'
    }
    else {
      obj.style.display = 'none'
    }

    var linhas = document.getElementsByClassName("ocultarPedidos");
    var aberto = 0;

    console.log(linhas)

    for(let i=0; i<linhas.length; i++){
      
      if(linhas[i].style.display == 'table-row'){
        aberto++;
      }
    }

    if(aberto == linhas.length){
      document.getElementById('btnGeralPedidos').innerText = 'Fechar pedidos';
    }
    else{
      document.getElementById('btnGeralPedidos').innerText  = 'Abrir pedidos';
    }
  }

}


function editarProcesso(id) {


  if(id == 'ocultarEdicao'){

    obj = document.getElementsByClassName(id);

    if(document.getElementById('btnGeralEdicao').innerText == 'Abrir edição'){

      document.getElementById('btnGeralEdicao').innerText = 'Fechar edição';
      for(let i=0; i<obj.length; i++){
        obj[i].style.display = 'table-row';
      }
      
    }else{

      document.getElementById('btnGeralEdicao').innerText = 'Abrir edição';
      for(let i=0; i<obj.length; i++){
        obj[i].style.display = 'none';
      }

    }

  }
  else{
    
    obj = document.getElementById(id);

    if (obj.style.display == 'none') {
      obj.style.display = 'table-row'
    }
    else {
      obj.style.display = 'none'
    }

  }

}


function checarInputs(id, msgId,nameForm){
 

  obj = document.getElementsByClassName(id);
  let possui = false;

  for(let i=0; i<obj.length; i++){
    if(obj[i].checked){
      if(nameForm =='pedidosForm'){
        pedidosForm.submit();
      }
      else{
        pedidosPedentesForm.submit();
      }
      possui = true;
    }
  }
 
  if(!possui){
    document.getElementById(msgId).style.display ='block';
  }
  
}



function detalhesPedidoPedentes(id) {


 

    obj = document.getElementsByClassName(id);

    if(document.getElementById('btnGeralPedentesDetalhes').innerText == 'Abrir'){

      document.getElementById('btnGeralPedentesDetalhes').innerText = 'Fechar';
      for(let i=0; i<obj.length; i++){
        obj[i].style.display = 'table-row';
      }
      
    }else{

      document.getElementById('btnGeralPedentesDetalhes').innerText = 'Abrir';
      for(let i=0; i<obj.length; i++){
        obj[i].style.display = 'none';
      }

    }

}


function marcarPedidosPendentes(id) {

  obj = document.getElementsByClassName(id);

  if(document.getElementById('btnGeralPedenteMarcar').innerText == 'Marcar'){

    document.getElementById('btnGeralPedenteMarcar').innerText = 'Limpar';
    for(let i=0; i<obj.length; i++){

      obj[i].children[0].checked = true;
      obj[i].children[1].children[0].id = 'icon_v';
      obj[i].children[1].children[0].classList.replace('fa-times', 'fa-check');

      document.getElementById(obj[i].children[0].value).style.backgroundColor= "#f6fff7";
    }
    
  }else{

    document.getElementById('btnGeralPedenteMarcar').innerText = 'Marcar';
    
    for(let i=0; i<obj.length; i++){
    
      obj[i].children[0].checked = false;
      obj[i].children[1].children[0].id = 'icon_x';
      obj[i].children[1].children[0].classList.replace('fa-check', 'fa-times');
      document.getElementById(obj[i].children[0].value).style.backgroundColor= "#ffebeb";

    }

  }
}

//Reformulação de script de pedidos



function checkedColuna(id, idTabela, obj){

  if(id=="checkedPedidos"+idTabela){

    var linhas = document.getElementsByClassName("checkedPedidos"+idTabela);

    if(obj.innerText == 'Marcar'){
  
      obj.innerText = 'Limpar';

      for(let i=0; i<linhas.length; i++){
        linhas[i].children[1].id = 'icon_v';
        linhas[i].children[1].classList.replace('fa-times', 'fa-check');
        linhas[i].style.backgroundColor = "#00880b";
        linhas[i].children[0].checked = true;
        document.getElementById(linhas[i].children[0].value).style.backgroundColor= "#f6fff7";
      }
      
    }else{
  
      obj.innerText = 'Marcar';

      for(let i=0; i<linhas.length; i++){
        linhas[i].children[1].id = 'icon_x';
        linhas[i].children[1].classList.replace('fa-check','fa-times');
        linhas[i].style.backgroundColor = "#aa0000";
        linhas[i].children[0].checked = false;
        document.getElementById(linhas[i].children[0].value).style.backgroundColor= "#ffebeb";
      }
  
    }

  }
  else{


    if(obj.children[1].id == 'icon_x'){
      obj.children[1].id = 'icon_v';
      obj.children[1].classList.replace('fa-times', 'fa-check');
      obj.style.backgroundColor = "#00880b";

      document.getElementById(id).style.backgroundColor= "#f6fff7";
      obj.children[0].checked = true;
    }else{
      
      obj.children[1].id = 'icon_x';
      obj.children[1].classList.replace('fa-check', 'fa-times');
      obj.style.backgroundColor = '#aa0000';

      document.getElementById(id).style.backgroundColor= "#ffebeb";
      obj.children[0].checked = false;
    }

    var linhas = document.getElementsByClassName('checkedPedidos'+idTabela);
    var ativo = 0;

    for(let i=0; i<linhas.length; i++){
      
      if(linhas[i].children[0].checked == true){
        ativo++;
      }
    }
    if(ativo == linhas.length){
      document.getElementById('btnGeralMarcar'+idTabela).innerText = 'Limpar';
    }
    else{
      document.getElementById('btnGeralMarcar'+idTabela).innerText = 'Marcar';
    }

  }

}


function ocultarDetalhes(id,idTabela,obj){


  if(id=="ocultarDetalhes"+idTabela){

    var linhas = document.getElementsByClassName("ocultarDetalhes"+idTabela);

    if(obj.innerText == 'Abrir'){
  
      obj.innerText = 'Fechar';

      for(let i=0; i<linhas.length; i++){
        linhas[i].style.display = 'table-row';
      }
      
    }else{
  
      obj.innerText = 'Abrir';

      for(let i=0; i<linhas.length; i++){
          linhas[i].style.display = 'none';
      }
  
    }

  }
  else{

    var div = document.getElementById(id);

    if (div.style.display == 'none') {
      div.style.display = 'table-row';
    }
    else {
      div.style.display = 'none'
    }


    var linhas = document.getElementsByClassName('ocultarDetalhes'+idTabela);
    var aberto = 0;

    for(let i=0; i<linhas.length; i++){
      
      if(linhas[i].style.display == 'table-row'){
        aberto++;
      }
    }

    if(aberto == linhas.length){
      document.getElementById('btnGeralDetalhes'+idTabela).innerText = 'Fechar';
    }
    else{
      document.getElementById('btnGeralDetalhes'+idTabela).innerText  = 'Abrir';
    }

  }

}
