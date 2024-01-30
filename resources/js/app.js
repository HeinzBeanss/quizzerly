import './bootstrap';

console.log("this works!");

window.addQuestion = () => {

    const form = document.getElementById('question-form');
    const questionContainer = document.createElement('div');
    questionContainer.classList.add('flex', 'flex-col', 'px-4', 'py-4', 'bg-surface', 'gap-4');
    const questionContainerTop = document.createElement('div');
    questionContainerTop.classList.add('flex', 'justify-between', 'w-full');
    const questionContainerBottom = document.createElement('div');

    // Top

    const questionInput = document.createElement('input');
    questionContainerTop.appendChild(questionInput);
    questionInput.type = "text";
    questionInput.name = "questionId";
    questionInput.setAttribute('required', "true");
    questionInput.classList.add('w-full', 'rounded-xl',);
    //create delete question button.

    // Bottom
    const answerInput = document.createElement('input');
    questionContainerBottom.appendChild(answerInput);
    answerInput.type = "text";
    answerInput.name = "answerId";
    answerInput.setAttribute('required', "true");


    form.appendChild(questionContainer);
    questionContainer.appendChild(questionContainerTop);
    questionContainer.appendChild(questionContainerBottom);

}

window.addAnswer = () => {
    // if there are already 8 answers, return a small error div maybe?
    // max 8 answers.
}
