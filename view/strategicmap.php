<?php include "head.php" ?>
    
    <title>How to Vote 2024 | Strategic Voting Map</title>
    <!-- Leaflet links for the map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

    <!--  JS file to actually use Leaflet  -->
    <script defer src="../src/mapwork.js"></script>

</head>
<?php include "header.php" ?>

<!-- Hero section -->
<div id="strat_hero">
    <h1 class="hero_text">Strategic Voting Map</h1>
</div>

<main>

 <!-- Where the interactive provincial map powered by Leaflet will be  -->
 <div id="map"></div>

 <div class="container">
    <h2 id="province_name"></h2>


 </div>
</main>

<?php include "footer.php" ?>