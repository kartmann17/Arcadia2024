function filterTable() {
    const animalFilter = document.getElementById("animalFilter").value.toLowerCase();
    const dateFilter = document.getElementById("dateFilter").value;
    const table = document.getElementById("rapportTable");
    const rows = Array.from(table.getElementsByTagName("tbody")[0].rows);

    rows.forEach(row => {
        const animalCell = row.cells[0].innerText.toLowerCase();
        const dateCell = row.cells[1].innerText.split(" ")[0];

        const animalMatch = !animalFilter || animalCell.includes(animalFilter);
        const dateMatch = !dateFilter || dateCell === dateFilter;

        row.style.display = animalMatch && dateMatch ? "" : "none";
    });
}

// réinitialisation du filtre
function resetFilter() {
    document.getElementById("animalFilter").value = "";
    document.getElementById("dateFilter").value = "";
    filterTable();
}