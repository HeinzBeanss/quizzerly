import './bootstrap';

console.log("this works!");



let questionCount = 1;

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

    // Answer Button
    const addAnswerButton = document.createElement('button');
    addAnswerButton.onclick = () => addAnswer(thisQuestion);
    addAnswerButton.classList.add('px-8', 'py-2', 'bg-surface', 'rounded-xl');
    addAnswerButton.textContent = 'Add Answer';
    addAnswerButton.type = "button";
    questionContainer.appendChild(addAnswerButton);

    questionCount++;
}

window.addAnswer = (thisQuestion) => {

    console.log(thisQuestion);

    const questionContainerBottom = document.getElementById(`questionContainerBottom${thisQuestion}`);
    const answerCount = questionContainerBottom.children.length + 1;

    console.log(questionContainerBottom);

    if (answerCount === 8) {
        const answerCountValidationMessage = document.createElement('p');
        answerCountValidationMessage.textContent = "A question is limited to 8 answers.";
        answerCountValidationMessage.classList.add('text-red-500', 'text-xs');
        questionContainerBottom.appendChild(answerCountValidationMessage);
        return;
    } else if (answerCount > 8) {
        return;
    }

    const answerInputDynamic = document.createElement('input');
    answerInputDynamic.type = "text";
    answerInputDynamic.name = `question[${thisQuestion}][${answerCount}]`;
    answerInputDynamic.classList.add('transition-all', 'opacity-0', 'duration-500', 'ease-out', 'max-h-0', 'py-0', 'rounded-xl', 'pl-4');
    answerInputDynamic.setAttribute('requied', 'true');
    questionContainerBottom.appendChild(answerInputDynamic);

    void answerInputDynamic.offsetHeight;
    answerInputDynamic.classList.add('pt-3', 'pb-3', 'opacity-100', 'max-h-24');

}

