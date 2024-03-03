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

 <div class="container">
    <div class="map_intro">
        If you don't feel like thinking much about what party to vote for/support, and you agree the ANC must go, just vote strategically to remove the ANC! This map will return the top three 
        strongest parties in a province that could unseat the ANC or block the ANC from government (the Western Cape for example). The parties returned
        are based on 2019 NPE, 2021 LGE and by-election results between 2022 and 2024.
    </div>

    <div class="map_intro">
        Simply click on a province on the map to get started!
    </div>

    <div id="map"></div>

    <h2 id="province_name"></h2>

    <div id="province_result"></div>
 </div>
</main>

<?php include "footer.php" ?>