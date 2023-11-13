// script.js
function createAnimal() {
    const species = document.getElementById('species').value;
    const description = document.getElementById('description').value;

    fetch('backend.php', {
        method: 'POST',
        body: JSON.stringify({ species: species, description: description })
    })
    .then(response => response.json())
    .then(data => displayAnimals(data));
}

function displayAnimals(animals) {
    const animalList = document.getElementById('animalList');
    animalList.innerHTML = '';
    animals.forEach(animal => {
        const listItem = document.createElement('li');
        listItem.textContent = `Species: ${animal.species}, Description: ${animal.description}`;
        animalList.appendChild(listItem);
    });
}

// Initial display of animals
fetch('backend.php')
    .then(response => response.json())
    .then(data => displayAnimals(data));