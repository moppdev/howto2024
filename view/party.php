<?php include "head.php" ?>
    
    <title>How to Vote 2024 | <?php echo $party_info["abbr"]?></title>
</head>
<?php include "header.php" ?>

<main>
    <div id="party_header">
        <img class="img-thumbnail logo" src="<?php echo $party_info["logo"] ?>" alt='logo of <?php echo $party_info["abbr"]?>'/>
        <h1><?php echo $party_info["name"] ?></h1>
        <span class="left">Founded in: <?php echo $party_info["founded_year"] ?></span>
        <span>Political Stance: <?php echo $party_info["political_stance"] ?></span>
    </div>

    <div id="party_summary">
        <img class="left leader_img" src="<?php echo $party_info["leader_image"] ?>" alt='photo of <?php echo $party_info["party_leader"]?>' />
        <div id="desc">
            <h2>Party Leader: <?php echo $party_info["party_leader"]?></h2>

            <h2>Summary</h2>
            <p><?php echo $party_summary ?></p>
        </div>
    </div>

    <div id="party_facts">
        <div class="left">
            <h3>Other facts about <?php echo $party_info["name"] ?></h3>
            <ul>
                <li>
                    Seats in Parliament:         
                    <?php if($party_info['parly_seats'] == null) : ?>
                        Not currently represented in Parliament
                    <?php else : ?>
                        <?php echo $party_info["parly_seats"] ?>
                    <?php endif; ?>
                </li>
                <li>Allied with/Part of: <?php echo $party_info["allied_with"] ?></li>
            </ul>
        </div>

        <div id="values">
            <h3>Values of <?php echo $party_info["name"] ?></h3>
            <ul>
                <?php foreach ($party_info["values"] as $value): ?>
                    <li><?php echo $value ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>

    <div id="party_link">
        <a href="http://<?php echo $party_info["party_site"] ?>" target="_blank">
            <button class="btn btn-primary btn-lg">Go to <?php echo $party_info["name"] ?>'s official site</button>
        </a>

        <div>
            All information for the summary was taken from commonly available information from sites such as Wikipedia, ChatGPT and the party in question's own website.
        </div>
    </div>
</main>

<?php include "footer.php" ?>