const icons = document.querySelectorAll('.icon');
icons.forEach (icon => {  
  icon.addEventListener('click', (event) => {
    icon.classList.toggle("open");
  });
});

document.addEventListener("DOMContentLoaded", function() {
    const sidebar = document.querySelector('.sidebar');
    const icon = document.querySelector('.icon');
    const content = document.querySelector('.block-content');
    const navv = document.querySelector('nav');
  
    icon.addEventListener('click', function() {
      sidebar.classList.toggle('close');
      content.classList.toggle('open');
      navv.classList.toggle('open')
    
    });
  });


  document.querySelector('#group').addEventListener('click', function() {
    const arrow = this;
    arrow.classList.toggle('down');
  });

 // Função para obter o nome do mês
function getMonthName(month) {
  const monthNames = ["janeiro", "fevereiro", "março", "abril", "maio", "junho",
      "julho", "agosto", "setembro", "outubro", "novembro", "dezembro"];
  return monthNames[month];
}

// Função para formatar a data
function formatDate(date) {
  const day = date.getDate();
  const month = getMonthName(date.getMonth());
  const year = date.getFullYear();
  return `${day} de ${month} de ${year}`;
}

// Obtendo a data e hora atual do local
const localDate = new Date();
const formattedDate = formatDate(localDate);

// Inserindo a data formatada na tag <p>
const dataAtualElement = document.querySelector('.data-time');
dataAtualElement.textContent = formattedDate;


$('#phone').mask('(00) 00000-0000');
$('#cnpj').mask('00.000.000/0000-00', {reverse: true});




// document.getElementById('form-empresa').addEventListener('submit', function(event) {
//   event.preventDefault(); // Evita o comportamento padrão do formulário (recarregar a página)

//   var formData = new FormData(this);
//   var empresaData = {};

//   // Formata os dados do formulário para um objeto JSON
//   formData.forEach(function(value, key){
//       empresaData[key] = value;
//   });

//   // Obtém o token de autenticação armazenado no local storage
//   var token = localStorage.getItem('token');

//   // Faça uma requisição para o backend Laravel
//   fetch('http://localhost:8000/api/companies', {
//       method: 'POST',
//       headers: {
//           'Authorization': 'Bearer ' + token, // Adiciona o token de autenticação
//           'Content-Type': 'application/json' // Define o tipo de conteúdo como JSON
//       },
//       body: JSON.stringify(empresaData) // Converte o objeto JSON em uma string JSON
//   })
//   .then(function(response) {
//       if (!response.ok) {
//           throw new Error('Erro ao enviar dados');
//       }
//       return response.json();
//   })
//   .then(function(data) {
//       // Exibe a mensagem de sucesso
//       document.getElementById('mensagem').innerText = data.message;
//   })
//   .catch(function(error) {
//       // Exibe a mensagem de erro
//       document.getElementById('mensagem').innerText = error.message;
//   });
// });
