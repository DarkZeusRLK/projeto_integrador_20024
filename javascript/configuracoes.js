document.addEventListener("DOMContentLoaded", () => {
  const backgroundForm = document.getElementById("background-form");

  backgroundForm.addEventListener("submit", (e) => {
    e.preventDefault();

    const backgroundSelect = document.getElementById("background-select");
    const selectedImage = backgroundSelect.value;

    // Salvar a imagem de fundo selecionada no localStorage
    localStorage.setItem("backgroundImage", selectedImage);

    alert("Imagem de fundo salva com sucesso!");
  });
});
