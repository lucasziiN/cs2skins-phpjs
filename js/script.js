function sortSkinsByWeapon() {
    // Retrieve the selected sort order from the dropdown menu
    const sortOrder = document.getElementById('sort-by-weapon').value;

    // Get the container element that holds all the skin items
    const skinsContainer = document.getElementById('skins-container');

    // Convert the HTMLCollection of skin items into an array for sorting
    const skins = Array.from(skinsContainer.getElementsByClassName('skin-item'));

    // Log the sort order to check if the function is triggered
    console.log("Sorting by: " + sortOrder);

    // Sort the skins array by the weapon type
    skins.sort((a, b) => {
        // Get the weapon names from the data attributes and convert them to lowercase for case-insensitive comparison
        const weaponA = a.getAttribute('data-weapon').toLowerCase();
        const weaponB = b.getAttribute('data-weapon').toLowerCase();
    
        if (sortOrder === 'asc') {
            // If the sort order is ascending, compare weapon names A to B (A to Z)
            return weaponA.localeCompare(weaponB);
        } else if (sortOrder === 'desc') {
            // If the sort order is descending, compare weapon names B to A (Z to A)
            return weaponB.localeCompare(weaponA);
        } else {
            // If the sort order is default or unrecognized, maintain the current order
            return 0; 
        }
    });

    // Log sorted order to ensure sorting is working
    skins.forEach(skin => console.log(skin.getAttribute('data-weapon')));

    // Clear the container
    skinsContainer.innerHTML = '';

    // Append sorted skins back to the container
    skins.forEach(skin => skinsContainer.appendChild(skin));
}