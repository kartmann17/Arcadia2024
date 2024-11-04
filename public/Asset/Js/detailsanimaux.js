function showModal(name, age, race, habitat, description, imgSrc) {
    // Échapper le texte pour éviter les injections
    const setTextContent = (id, value) => {
        const element = document.getElementById(id);
        if (element) {
            element.textContent = value;
        }
    };

    // évite les injections XSS
    setTextContent('modal-animal-name', name);
    setTextContent('modal-animal-age', age);
    setTextContent('modal-animal-race', race);
    setTextContent('modal-animal-habitat', habitat);
    setTextContent('modal-animal-description', description);

    // Validation de l'URL de l'image
    const imgElement = document.getElementById('modal-animal-img');
    if (imgElement) {
        if (imgSrc.startsWith('/Asset/Images/')) {
            imgElement.src = imgSrc;
        } else {
            imgElement.src = '/Asset/Images/default.png'; 
        }
    }

    let myModal = new bootstrap.Modal(document.getElementById('animalModal'));
    myModal.show();
}