// Array of objects containing questions, their answers and values
const questionsAndAnswers = [
    {
        question: "What is your preferred economic policy?",
        answers: ["Extensive government control and regulation for social welfare", 
        "Balanced government intervention to address market failures", 
        "Minimal government interference, favoring free market principles"],
        answerValues: [1, 5, 10]
    },
    {
        question: "What is your stance on immigration?",
        answers: ["I support open borders, we must welcome all", 
        "I think we need to reform immigration and strengthen our borders, but immigration should be relatively relaxed", 
        "I think we need to have stronger immigration control"],
        answerValues: [1, 5, 10]
    },
    {
        question: "What is your stance on potential privatization of the SOEs like Eskom, Transnet, etc?",
        answers: ["The SOEs shouldn't be privatized at all, the state can't work with the private sector", 
        "The private sector should be brought in to help the SOEs, but only partly privatizing to keep the SOEs under state control", 
        "All SOEs must be fully privatized or mostly privatized, SOEs are an outdated concept"],
        answerValues: [1, 5, 10]
    },
    {
        question: "",
        answers: [],
        answerValues: [1, 5, 10]
    },
    {
        question: "",
        answers: [],
        answerValues: [1, 5, 10]
    },
    {
        question: "",
        answers: [],
        answerValues: [1, 5, 10]
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
            addScore(selectedValue);
            loadNewQuestion();
        });
    });


    // Determine's the party needed based on the partyCompatScore
    function determineParty(score)
    {
        // TBA
    }

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
            document.getElementsByTagName("main")[0].innerHTML = "";
            let abbr = determineParty(partyCompatScore);

            return;
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
