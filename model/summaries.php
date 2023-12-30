<?php 

    // Summaries of each party's history, track record, etc are in this file
    $da = <<<'TAG'
    Founded in 2000, via a merger of the Democratic Party (the anti-apartheid official opposition during the Apartheid era), the New National Party (the descendent of the National Party) and the Federal Alliance to form a united opposition bloc against the ANC. 
    The NNP then left in 2001 after factional battles in the DA and coalesced with the ANC, and the Federal Alliance left and joined the Freedom Front Plus. 
    It is a centrist, liberal party that has been the official opposition since the 2004 elections and they are the official opposition in five of the nine provinces which includes Gauteng, KwaZulu Natal, Northern Cape, Eastern Cape, and Free State provinces. 
    The DA has governed the Western Cape since the 2009 elections with majorities ranging from 50% to 59%. 
    The DA also governs multiple municipalities either by coalition or their own majorities in the Western Cape, Northern Cape, KwaZulu Natal, Eastern Cape and Gauteng. 
    They’ve also governed Cape Town since 2006 first by coalition and then by their own majorities since 2011. They received 20% of the vote in 2019.
    Most DA-governed areas have been repeatedly ranked the best in terms of service delivery and economic growth by both independent indexes and governmental institutions. The DA offers moderate policies, both centre-left and centre-right and they support the concept of federalism (devolving powers like healthcare, policing, transport, etc to provincial governments).

    TAG;
    $eff = <<<'TAG'
    Founded in 2013, by expelled ANCYL leader Julius Malema and his allies, the Economic Freedom Fighters is a far-left, authoritarian, black nationalist party. The Economic Freedom Fighters advocate for land expropriation without compensation, nationalisation of mines and banks and Pan-Africanism in the form of a United States of Africa. They have also been accused of having fascist tendencies in the past. They are well known for their violent behaviour in councils and Parliament and have had run-ins regarding anti-minority rhetoric.
    The Economic Freedom Fighters is the third largest party in South Africa. 
    They are the official opposition in the Limpopo, North West and Mpumalanga provinces. 
    They got 10% of the national vote in 2019, a 4.4% increase from the 2014 elections when they first contested. 
    Now, they are in an informal coalition with the ANC in multiple municipalities across the country most notably in the City of eThekwini, City of Johannesburg, West Rand, and City of Ekurhuleni.

    TAG;
    $ifp = <<<'TAG'
    Founded in 1975 as an ANC front organization during the Apartheid era by the Zulu Prime Minister Mangosuthu Buthelezi, the IFP (as it came to be known in 1994) eventually broke away from the ANC in the early 80s after fundamental disagreements between Buthelezi and ANC leadership at the time.
    The IFP is a conservative party with an emphasis on federal and free-market principles. During the early years of democracy, they had a Zulu nationalist outlook although that has mostly changed. The IFP is the only other party than the DA among the opposition to have governed a province (the KwaZulu Natal province from 1994 to 1999, and via a coalition with the ANC from 1999 to 2004). After 2004, they lost much of their support thanks to the rise of Jacob Zuma and the ANC in KwaZulu Natal as well as the breakaway party NFP between 2004 and 2014 and fell to a small 2.3% of the national vote in 2014. They have made a comeback since the 2019 national election.
    After the 2021 elections, the IFP has continued their comeback, and it now governs most of the municipalities in Northern KwaZulu Natal via leading coalitions including fellow Multi-Party Charter members. They are also part of the City of Tshwane coalition.

    TAG;
    $good = <<<'TAG'
    Founded in 2018, by former DA Mayor of Cape Town Patricia De Lille, GOOD is a social-democratic, values-based party with a focus on issues such as good governance, social justice, and addressing inequality. Patricia de Lille emphasized a commitment to non-racialism and building a South Africa for all citizens. The party advocated for policies to address corruption, improve service delivery, promote economic inclusivity and implement a R999 Basic Income Grant.
    GOOD currently works with the ANC nationwide in municipal coalitions, including Sol Plaatje Municipality, the City of Johannesburg and Theewaterskloof Municipality. GOOD also occupies a position in the national government, where the leader, Patricia De Lille is the Minister of Tourism.    

    TAG;
    $asa = <<<'TAG'
    Founded in 2020, by former DA Mayor of Johannesburg Herman Mashaba, ActionSA addresses issues of corruption, service delivery, and creating opportunities for all South Africans. The party states that it has been established to "set South Africa free from the restraints of a broken political system and build a prosperous, non-racial and secure future for all its people."
    Positioning itself as a centre-right, liberal and reformist party, ActionSA emphasizes efficient governance, job creation, and tackling socio-economic challenges. The party advocates for policies aimed at curbing corruption, improving service delivery, and fostering economic growth to uplift communities, as well as education and electoral reform.
    In 2021, the first election they contested, they managed to get 2.34% of the vote after only contesting in Newcastle, the City of eThekwini, KwaDukuza, the City of Johannesburg, the City of Tshwane, and the City of Ekurhuleni. The party has been extremely vocal for calls on tougher immigration policy and, through its leader Herman Mashaba, has often found itself at the centre of controversy around xenophobic rhetoric and violence in South Africa. ActionSA is currently in two municipal coalitions in the City of Tshwane and Newcastle, with their partners in the Multi-Party Charter.        

    TAG;
    $acdp = <<<'TAG'
    Founded in 1993 by Reverend Kenneth Meshoe, the African Christian Democratic Party’s core values are centred around Christian principles and morals, advocating for conservative policies rooted in Christian beliefs. The ACDP emphasizes pro-life stances, family values, and upholding traditional Christian ethics in governance.
    While predominantly known for its Christian-centred ideology, the ACDP also addresses broader political issues. It supports policies aligned with social conservatism, including advocating for religious freedom, education reforms, and promoting morality in society. Additionally, the party highlights the importance of addressing social and economic challenges, albeit through a conservative lens. The ACDP also supports federalism.
    The ACDP is involved in multiple coalitions nationwide with fellow Multi-Party Charter members like the DA, IFP, etc. Most notably they are in government in the City of Tshwane, and multiple municipalities in the Western Cape.

    TAG;
    $bosa = <<<'TAG'
    Founded in 2022, by former DA Federal Leader Mmusi Maimane, Build One South Africa is a centrist, reformist and community-based party. 
    It also has shown notions of supporting direct democracy by the way they select their candidates for Parliament by having applications open to all even outside the party.

    TAG;
    $ffplus = <<<'TAG'
    Originally founded as the Freedom Front by SADF General Constand Viljoen in 1994, the Freedom Front Plus was formed in 2003 by the merging of the Afrikaner Eenheidsbeweging (Afrikaner Unity Movement), the Conservative Party (the extremist split from the National Party in the Apartheid era), the Freedom Front and the Federal Alliance.
    In recent years, they’ve started to move away from being a party exclusively targeted at Afrikaners and more towards being a party for mainly Afrikaans-speaking minorities. They are a generally conservative party. They specifically focus on and promote language rights, minority rights and self-determination, especially regarding the Cape Independence question.
    Currently, they’re in multiple coalitions with the DA and other Multi-Party Charter members nationwide. Most notably in multiple municipalities in the Western Cape and the City of Tshwane.

    TAG;
    $rise = <<<'TAG'
    Founded in 2023 by former Business Day editor, Songezo Zibi, Rise Mzansi is a social-democratic political party. 
    The principles extolled by this party are constitutionalism, an ethical public service, a people-centred government, quality service delivery for all, and a country free from fear of criminals. 
    Other policies they have include tackling the climate crisis, political reform, and anti-corruption.

    TAG;
    $pa = <<<'TAG'
    Founded in 2013 by controversial businessman Gayton McKenzie and former ANC member Kenny Kunene, the Patriotic Alliance (PA) is a populist political party in South Africa. The party aims to address socio-economic challenges, unemployment, crime, and corruption in South Africa. While the party advocates for job creation, economic empowerment, and improvement of living standards, it has garnered attention for its vocal stance on immigration. 
    The PA has been criticized for anti-immigrant rhetoric, which some perceive as xenophobic. It received 0.04% of the vote in 2019 and 0.87% of the vote in 2021.
    The PA are currently in municipal coalitions with ANC nationwide most notably the City of Johannesburg and Nelson Mandela Bay Metropolitan Municipality.

    TAG;
    $pac = <<<'TAG'
    Founded in 1959 by Robert Sobukwe after a group of ANC members including Sobukwe, broke away from the ANC in response to the adoption of the Freedom Charter in 1955. The Pan-Africanist Congress of Azania is mostly based around black nationalist, African socialist and pan-African values. They reject communist ideals.
    The Pan Africanist Congress of Azania only received 0.19% of the national vote in 2019, just enough for a single seat in Parliament. It had much infighting in the past which has settled down in recent years.
    TAG;

    $summaries = array(
        "ActionSA" => $asa,
        "ACDP" => $acdp,
        "BOSA" => $bosa,
        "DA" => $da,
        "EFF" => $eff,
        "FFPlus" => $ffplus,
        "GOOD" => $good,
        "IFP" => $ifp,
        "PA" => $pa,
        "PAC" => $pac,
        "RISE" => $rise
    );

?>