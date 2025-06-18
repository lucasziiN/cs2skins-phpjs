<?php
// Load the XML file containing the CS2 skins data
$xml = simplexml_load_file('xml/cs2skins.xml');

// Check if the file was loaded correctly
if ($xml === false) {
    // If loading failed, display an error message and terminate the script
    echo "Failed to load XML file.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CS2 Skins Catalog</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Link to external CSS file -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap"> <!-- Link to Google Fonts for custom Title font -->

</head>
<body>
    
    <!-- Main container for the catalog content -->
    <div class="catalog-container">
        <!-- Page title using a custom font -->
        <h1 class="title">CS2 Skins</h1>        

        <!-- Dropdown menu to sort skins by weapon -->
        <div class="select-container">
            <label for="sort-by-weapon">Sort by Weapon:</label>
            <select id="sort-by-weapon" onchange="sortSkinsByWeapon()">
                <option value="default">Default</option>
                <option value="asc">A to Z</option>
                <option value="desc">Z to A</option>
            </select>
        </div>
        
        <!-- Container that holds all the skin items -->
        <div class="flex-container" id="skins-container">
            <?php
            echo "<br>";
            // Loop through the items in the XML
            foreach ($xml->skin as $skin) {
                // Start a div for each skin item with a data attribute for weapon type
                echo "<div class='skin-item' data-weapon='" . $skin->weapon . "'>";

                // Display the skin image with proper escaping
                echo "<img src='" . $skin->image . "' alt='" . $skin->name . " screenshot'><br>";

                // Weapon as plain text, no clickable link
                echo "<h3>" . $skin->weapon . "</h3>";

                // Name as a clickable link to item.php
                echo "<h2><a href='item.php?name=" . urlencode($skin->name) . "&weapon=" . urlencode($skin->weapon) . "'>" . $skin->name . "</a></h2>";

                echo "</div>";
            }
            ?>
        </div>
        
    </div>
    <!-- External JavaScript file -->   
    <script src="js/script.js"></script>
</body>
</html>