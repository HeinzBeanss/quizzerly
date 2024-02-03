import './bootstrap';

console.log("this works!");

const mainQuestionContainer = document.getElementById('question-container');

let questionCount = mainQuestionContainer.childElementCount;
console.log(questionCount);

// let questionCount = 1;

window.addQuestion = () => {

    let thisQuestion = questionCount;

    const form = document.getElementById('quiz-form');
    const questionContainer = document.createElement('div');
    questionContainer.classList.add('flex', 'flex-col', 'px-4', 'py-4', 'bg-surface', 'gap-4');
    const questionContainerTop = document.createElement('div');
    questionContainerTop.classList.add('flex', 'justify-between', 'w-full');
    const questionContainerBottom = document.createElement('div');
    questionContainerBottom.id = `questionContainerBottom${thisQuestion}`;
    questionContainerBottom.classList.add('flex', 'flex-col', 'gap-4');


    form.appendChild(questionContainer);
    questionContainer.appendChild(questionContainerTop);
    questionContainer.appendChild(questionContainerBottom);

    // Top
    const questionInput = document.createElement('input');
    questionContainerTop.appendChild(questionInput);
    questionInput.type = "text";
    questionInput.name = `question[${thisQuestion}][0]`;
    questionInput.setAttribute('required', "true");
    questionInput.classList.add('w-full', 'rounded-xl',);
    //create delete question button.

    // Bottom
    // Answer One
    const answerInput = document.createElement('input');
    answerInput.type = "text";
    answerInput.name = `question[${thisQuestion}][1]`;
    answerInput.setAttribute('required', "true");
    answerInput.classList.add('max-h-24', 'pt-3', 'pb-3', 'rounded-xl');
    questionContainerBottom.appendChild(answerInput);

    // Answer Two
    const answerInputTwo = document.createElement('input');
    answerInputTwo.type = "text";
    answerInputTwo.name = `question[${thisQuestion}][2]`;
    answerInputTwo.setAttribute('required', "true");
    answerInputTwo.classList.add('max-h-24', 'pt-3', 'pb-3', 'rounded-xl');
    questionContainerBottom.appendChild(answerInputTwo);

    const questionButtonContainer = document.createElement('div');
    questionButtonContainer.classList.add('flex', 'gap-8');
    questionContainer.appendChild(questionButtonContainer);

    // Answer Button
    const addAnswerButton = document.createElement('button');
    addAnswerButton.onclick = () => addAnswer(thisQuestion);
    addAnswerButton.classList.add('px-8', 'py-2', 'bg-surface', 'rounded-xl');
    addAnswerButton.textContent = 'Add Answer';
    addAnswerButton.type = "button";
    questionButtonContainer.appendChild(addAnswerButton);

    // Delete Button
    const deleteAnswerButton = document.createElement('button');
    deleteAnswerButton.onclick = () => deleteQuestion(thisQuestion);
    deleteAnswerButton.classList.add('px-8', 'py-2', 'bg-surface', 'rounded-xl');
    deleteAnswerButton.type = "button";
    deleteAnswerButton.textContent = "Delete Question";
    questionButtonContainer.appendChild(deleteAnswerButton);

    questionCount++;
}

window.addAnswer = (thisQuestion) => {

    const questionContainerBottom = document.getElementById(`questionContainerBottom${thisQuestion}`);

    if (questionContainerBottom.lastChild.textContent == "A question is limited to 8 answers.") {
        questionContainerBottom.lastChild.remove();
    }

    const answerCount = questionContainerBottom.children.length + 1;

    if (answerCount === 9) {
        const answerCountValidationMessage = document.createElement('p');
        answerCountValidationMessage.textContent = "A question is limited to 8 answers.";
        answerCountValidationMessage.classList.add('text-red-500', 'text-xs');
        questionContainerBottom.appendChild(answerCountValidationMessage);
        return;
    } else if (answerCount > 9) {
        return;
    }

    const answerContainer = document.createElement('div');
    answerContainer.id = `answer[${thisQuestion}][${answerCount}]`;
    answerContainer.classList.add('flex', 'justify-between', 'gap-4', 'w-full');

    const answerInputDynamic = document.createElement('input');
    answerInputDynamic.type = "text";
    answerInputDynamic.name = `question[${thisQuestion}][${answerCount}]`;
    answerInputDynamic.classList.add('w-full', 'transition-all', 'opacity-0', 'duration-500', 'ease-out', 'max-h-0', 'py-0', 'rounded-xl', 'pl-4');
    answerInputDynamic.setAttribute('required', 'true');

    const deleteAnswerButton = document.createElement('button');
    deleteAnswerButton.textContent = "Delete";
    deleteAnswerButton.classList.add('bg-white');
    deleteAnswerButton.classList.add('transition-all', 'opacity-0', 'duration-500', 'ease-out', 'max-h-0', 'py-0', 'rounded-xl', 'pl-2');
    deleteAnswerButton.type = "button";
    deleteAnswerButton.onclick = () => deleteAnswer(answerCount, thisQuestion);

    questionContainerBottom.appendChild(answerContainer);
    answerContainer.appendChild(answerInputDynamic);
    answerContainer.appendChild(deleteAnswerButton);

    void answerInputDynamic.offsetHeight;
    answerInputDynamic.classList.add('pt-3', 'pb-3', 'opacity-100', 'max-h-12');
    void deleteAnswerButton.offsetHeight;
    deleteAnswerButton.classList.add('pt-3', 'pb-3', 'opacity-100', 'max-h-12');

}

window.deleteQuestion = (thisQuestion) => {

    const questionContainerBottom = document.getElementById(`questionContainerBottom${thisQuestion}`);
    const questionContainer = questionContainerBottom.parentNode;
    questionContainer.remove();
}

window.deleteAnswer = (answerCount, thisQuestion) => {
    console.log(`Question Deleting from: ${thisQuestion}`)

    // void answer.firstChild.offsetHeight;
    // answer.firstChild.classList.add('opacity-0', 'max-h-0');

    const questionContainerBottom = document.getElementById(`questionContainerBottom${thisQuestion}`);
    if (questionContainerBottom.lastChild.textContent == "A question is limited to 8 answers.") {
        questionContainerBottom.lastChild.remove();
    }

    const answer = document.getElementById(`answer[${thisQuestion}][${answerCount}]`)
    answer.remove();
}

