document.addEventListener('DOMContentLoaded', function() {

    const animalButtons = document.querySelectorAll('.btn');

    animalButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault(); // pas de redirection


            const animalId = this.getAttribute('data-animal-id');

            // Requête AJAX pour incrémenter les visites
            fetch('/Animaux/incrementVisits', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: animalId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {

                    console.log('Visite incrémentée avec succès.');

                } else {
                    console.error('Erreur lors de l\'incrémentation : ' + data.message);
                }
            })
            .catch(error => console.error('Erreur:', error));
        });
    });
});