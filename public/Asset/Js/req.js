document.getElementById('avisForm').addEventListener('submit', async function(event) {
    event.preventDefault();


    const form = event.target;
    const formData = new FormData(form);

    try {

        const response = await fetch(form.action, {
            method: 'POST',
            body: formData
        });

        if (response.ok) {
            alert('Votre avis a été soumis avec succès !');
            form.reset();
        } else {
            const error = await response.text();
            alert('Erreur lors de l\'envoi de l\'avis : ' + error);
        }
    } catch (error) {
        console.error('Erreur lors de la requête :', error);
        alert('Une erreur s\'est produite lors de l\'envoi de votre avis.');
    }
});