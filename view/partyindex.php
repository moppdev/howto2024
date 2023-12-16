<?php include "head.php" ?>
    
    <title>How to Vote 2024 | Political Party Index</title>
</head>
<?php include "header.php" ?>

<!-- Hero section -->
<div id="index_hero">
    <h1 class="hero_text">Political Party Index</h1>
</div>

<main>

    <div class="container">
        <p>
            Here is the list of political parties covered by this site.
        </p>

        <!-- Actual list of political parties covered and their respective links -->
        <ul id="index">
            <?php for ($i = 0; $i < count($party_names[0]); $i++): ?>
                    <li class="nav-item"><a href="<?php echo "party.php?party=" . strtolower($party_names[1][$i]) ?>"><?php echo $party_names[1][$i]  ?></a></li>
            <?php endfor ?>
        </ul>
    </div>
</main>

<?php include 'footer.php' ?>