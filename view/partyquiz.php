<?php include "head.php" ?>
    
    <title>How to Vote 2024 | Party Quiz</title>
    <!-- Load the js file that we'll use to actually run the quiz -->
    <script src="../src/quiz.js" defer></script>
</head>
<?php include "header.php" ?>

<!-- Hero section -->
<div id="quiz_hero">
    <h1 class="hero_text">Political Party Quiz</h1>
</div>

<!-- Main content of this page which would be the Party Quiz -->
<main>

        <p>DISCLAIMER: Don't take this quiz too seriously, it's only meant to recommend a party to vote for generally based on what you answer. 
            So it might not be too precise.
            You could always go through their policies (and other parties') first before making a decision. </p>
    
        <h2 id="q_tracker"></h2>
        <div class="q_container">
            <!-- Temporary setup to get desktop styling correct-->
            <h2 id='question'></h2>

            <div class="quiz_grid">
                    <button class="btn btn-primary" value=""></button>
                    <button class="btn btn-primary" value=""></button>
                    <button class="btn btn-primary" value=""></button>
            </div>
        </div>

</main>

<?php include 'footer.php' ?>