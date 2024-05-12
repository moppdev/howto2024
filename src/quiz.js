// Array of objects containing questions, their answers and values
const questionsAndAnswers = [
    {
        question: "What is your preferred economic policy?",
        answers: ["Extensive government control over the economy and implementation of socialist policies", 
        "Balanced government intervention in the economy to address market failures, implementation of moderate economic policies to manage the economy pragmatically", 
        "Minimal/no government interference in the economy, favoring free market principles and implementing capitalist policies"],
        answerValues: [2, 4, 6]
    },
    {
        question: "What is your stance on immigration?",
        answers: ["I support open borders, we must welcome all", 
        "I think we need to reform immigration and strengthen our borders, but immigration should be relatively relaxed", 
        "I think we need to have stronger immigration and border control. We must tighten immigration."],
        answerValues: [1, 4, 8]
    },
    {
        question: "What is your stance on potential privatization of the SOEs like Eskom, Transnet, etc?",
        answers: ["The SOEs shouldn't be privatized at all, the state must have entities under its control to maintain a developmental state", 
        "The private sector should be brought in to help the SOEs, but only by partly privatizing the SOEs to keep them under state control", 
        "All SOEs must be fully privatized or mostly privatized, SOEs are an outdated concept, let the market lead the way"],
        answerValues: [3, 6, 9]
    },
    {
        question: "What do you think of the NHI Bill/NHI in general?",
        answers: ["It's a good idea. The private medical aid sector must be nationalized to provide universal healthcare",
                    "The NHI Bill is a bad idea as it recklessly nationalizes the private medical aid sector, although I'm not opposed to the idea of an NHI",
                    "I'm completely opposed to the idea of a NHI and the NHI Bill. We shouldn't interfere with the private sector or accrue more state expenses"],
        answerValues: [1, 5, 10]
    },
    {
        question: "South Africa belongs to all South Africans, regardless of their race. Do you agree with this statement?",
        answers: ["Yes, definitely", "Neutral/Not Sure", "No, not at all"],
        answerValues: [5, 0, 10]
    },
    {
        question: "Do you think that powers like policing, healthcare, etc should be fully devolved/given to the provinces?",
        answers: ["Yes, definitely. It'll allow the provinces to function on their own in case of central government failure",
                    "I don't really have a stance about this",
                    "No, such powers must remain under the central government to maintain uniformity in law and authority"                    
    ],
        answerValues: [5, 0, 7]
    },
    {
        question: "What is your stance on land reform?",
        answers: ["Land must be expropriated without compensation", 
        "There's enough provision in the Constitution at the moment to do land reform", 
        "There is no need for land reform/redistribution by the government."],
        answerValues: [5, 8, 9]
    },
    {
        question: "What do you think should be done to end load shedding?",
        answers: ["The state must simply build more power stations and maintain a monopoly on energy generation and transmission", 
        "The state's monopoly must be broken to allow the private sector to add generation capacity to the grid and Eskom must be maintained as a transmission SOE", 
        "Eskom must be completely privatised and the private sector should lead the way"],
        answerValues: [10, 12, 14]
    },
    {
        question: "Do you believe that religion and politics should mix?",
        answers: ["Yes, there's no problem with that", "Neutral/Don't have a stance", "No, it's not a good idea"],
        answerValues: [10, 0, 15]
    }
];

// Although defer attr in the script tag should do the trick
// Just use the DOMContentLoaded listener just in case to ensure the script fires
document.addEventListener("DOMContentLoaded", () => {
    
    // counter that'll keep track of what question is currently asked
    let currentQuestionCounter = -1;
    let partyCompatScore = 0;

    // Get reference to HTML elements
    const questionElement = document.getElementById('question');
    const answerButtons = document.querySelectorAll('.btn-primary');
  
    loadNewQuestion();

    // Set up event listeners for answer buttons
    answerButtons.forEach(button => {
        button.addEventListener('click', () => {
            const selectedValue = button.value;
            addScore(Number(selectedValue));
            loadNewQuestion();
        });
    });

    // Add the the selected answer's value to the compatibility score
    function addScore(value)
    {
        partyCompatScore += value;
    }

    // Handles the loading of new questions
    function loadNewQuestion()
    {
        // Increase the counter to go to the next question
        currentQuestionCounter++;

        // If the questions have all been answered, load the result onto the page
        if (currentQuestionCounter + 1 > questionsAndAnswers.length)
        {
            determineParty(partyCompatScore);
        }
        else
        {
            // Display the current progress of the quiz
            document.getElementById("q_tracker").textContent = `Question ${currentQuestionCounter + 1} of ${questionsAndAnswers.length}`

            // Load the questionsAndAnswers element currently needed
            const obj = questionsAndAnswers[currentQuestionCounter];
            // Answer and answerValues array counter
            let counter = 0;

            // Load the next question and its answers
            questionElement.textContent = obj.question;

            // Assign answers and values to all buttons
            answerButtons.forEach(button => {
                button.textContent = obj.answers[counter];
                button.value = obj.answerValues[counter];
                counter++;
            });
        }
        
    }

});

// Determine's the party needed based on the partyCompatScore
function determineParty(score)
{

    // Initiate the array containing the names of parties related to a certain range
    // and the randomized index to select a random party from the array
    let name_array = [];
    let random_index = 0;

    // Check score against ranges to select a party within that section of political spectrum
    if (score >= 29 && score <= 42)
    {
        name_array = ["PAC", "EFF", "MK"];
        random_index = Math.floor(Math.random() * 2);
        return getPartyInfo(name_array[random_index]);
    }
    else if (score >= 43 && score <= 55)
    {
        name_array = ["BOSA", "RISE", "GOOD", "PA"];
        random_index = Math.floor(Math.random() * 4);
        return getPartyInfo(name_array[random_index]);
    }
    else if (score >= 56 && score <= 71)
    {
        name_array = ["DA", "ActionSA"];
        random_index = Math.floor(Math.random() * 2);
        return getPartyInfo(name_array[random_index]);
    }
    else if (score >= 72 && score <= 81)
    {
        name_array = ["ACDP", "IFP", "FFPlus"];
        random_index = Math.floor(Math.random() * 4);
        return getPartyInfo(name_array[random_index]);
    }
    else
    {
        return getPartyInfo("DA");
    }
}

// Function that retrieves the information of each party's php page
function getPartyInfo(party_abbr)
{
        fetch(`../model/partyinfo.json`)
        .then(response => {
            return response.json();
        })
        .then(data => {
            let party_array = data["party_info"];
            for (let i = 0; i < party_array.length; i++)
            {
                let current_party = party_array[i];
                if (current_party.abbr.toLowerCase() === party_abbr.toLowerCase())
                {
                    let party = current_party;

                    let abbr = party.abbr;
                    const element = document.getElementsByClassName("q_container")[0];
                    element.innerHTML = "";
                    element.style.display = "none";
                    document.getElementById("q_tracker").textContent = `Your Result: ${abbr}`;
                    document.getElementById("q_tracker").style.textAlign = "left";
        
                    // Display the party's logo and the link to the party's page on the site
                    const image = document.createElement("img");
                    image.src = party.logo;
                    image.id = "party_img";
                    image.alt = `Logo of ${abbr}`;

                    const link = document.createElement("a");
                    link.id = "link_img"
                    link.href = `party.php?party=${abbr.toLowerCase()}`;

                    const btnLink = document.createElement("a");
                    btnLink.id = "btn_link"
                    btnLink.href = `https://www.${party.party_site}`;
                    btnLink.target = "_blank";

                    const resultBtn = document.createElement("button");
                    resultBtn.id = "result_btn";
                    resultBtn.classList.add("btn");
                    resultBtn.classList.add("btn-primary");
                    resultBtn.classList.add("btn-lg");
                    resultBtn.textContent = `Go to ${abbr}'s official site`;

                    btnLink.appendChild(resultBtn);
                    
                    const main = document.getElementsByTagName("main")[0];
                    link.appendChild(image);
                    main.appendChild(link);
                    main.appendChild(btnLink);
                    break;
                }
            }
        });
};
