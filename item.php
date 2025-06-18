<?php
// Load the XML file
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
</head>
<body>
    <!-- Main container for the catalog content -->
    <div class="catalog-container">
        
        <!-- Container for the skin details -->
        <div class="detail-container">
            <?php
            if (isset($_GET['name']) && isset($_GET['weapon'])) {
                // Check if 'name' and 'weapon' parameters are set in the URL
                $itemName = $_GET['name'];
                $weaponName = $_GET['weapon'];

                // Search for the matching skin in the XML data
                foreach ($xml->skin as $skin) {
                    // Compare the current skin's name and weapon to the requested ones
                    if ((string) $skin->name == $itemName && (string) $skin->weapon == $weaponName) {
                        
                        // Display the skin details
                        echo "<div class='skin-detail'>";
                        echo "<img src='" . $skin->image . "' alt='" . $skin->name . " screenshot'><br>";
                        echo "<div class='skin-info'>";
                        echo "<h3>" . $skin->weapon . "</h3>";
                        echo "<h3>" . $skin->name . "</h3>";
                        echo "<p class='price'>$" . $skin->price . "</p>";
                        echo "<p class='rarity'>" . $skin->rarity . "</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
            } else {
                // If 'name' or 'weapon' parameters are not provided, display a message
                echo "No item name provided.";
            }
            
            ?>
        </div>
        
        <!-- Button to return to the catalog page -->
        <button onclick="window.location.href='index.php'" class="return-button">Return to Catalog</button>
    </div>
</body>
</html>