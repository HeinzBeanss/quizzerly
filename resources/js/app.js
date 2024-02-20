import './bootstrap';

// Embla Carousel
import EmblaCarousel from 'embla-carousel'
import Autoplay from 'embla-carousel-autoplay'

if (window.location.pathname === '/') {
    const OPTIONS = { slidesToScroll: 4, dragFree: true, loop: true, autoplay: true, }

    const emblaNode = document.querySelector('.embla')
    const viewportNode = emblaNode.querySelector('.embla__viewport')
    const emblaApi = EmblaCarousel(viewportNode, OPTIONS, [Autoplay()])
}

// Nav Bar Styling
const navbar = document.getElementById('navbar');

window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;

    if (scrollY > 160) {
        navbar.classList.add('bg-background');
        navbar.classList.remove('backdrop-blur');
    } else {
        navbar.classList.remove('bg-background');
        navbar.classList.add('backdrop-blur');
    }
});

// Quiz Functionality
const mainQuestionContainer = document.getElementById('question-container');

let questionCount = mainQuestionContainer.childElementCount;
console.log(questionCount);

window.addQuestion = () => {

    // Question
    let thisQuestion = questionCount;

    // Form + Question Container
    const form = document.getElementById('quiz-form');
    const questionContainer = document.createElement('div');
    questionContainer.classList.add('questioncontainer', 'flex', 'flex-col', 'px-4', 'py-4', 'bg-white', 'gap-2', 'rounded-md', 'mb-3');

    // Label
    const questionlabelcontainer = document.createElement('div');
    questionContainer.appendChild(questionlabelcontainer);
    questionlabelcontainer.classList.add('flex', 'items-center', 'justify-between');
    const questionlabel = document.createElement('label');
    questionlabelcontainer.appendChild(questionlabel);
    questionlabel.setAttribute('for', `question_${thisQuestion}`);
    questionlabel.classList.add('block', 'text-sm', 'font-medium', 'leading-6', 'text-background/80');
    questionlabel.textContent = 'Question Title';

    // Input
    const questionInput = document.createElement('input');
    questionContainer.appendChild(questionInput);
    questionInput.id = `question_${thisQuestion}`;
    questionInput.type = "text";
    questionInput.name = `question[${thisQuestion}][0]`;
    questionInput.setAttribute('required', "true");
    questionInput.setAttribute('placeholder', "Who painted the Mona Lisa?");
    questionInput.classList.add('pl-2', 'block', 'w-full', 'rounded-md', 'border-0', 'py-1.5', 'text-background/80', 'shadow-sm', 'ring-1', 'ring-inset', 'ring-background/10', 'focus:ring-1', 'focus:outline-0', 'focus:ring-surface', 'sm:text-sm', 'sm:leading-6', 'mb-2', 'placeholder-background/40');

    // Answer Section Title
    const answersectiontitle = document.createElement('label');
    answersectiontitle.textContent = 'Answers';
    answersectiontitle.classList.add('block', 'text-sm', 'font-medium', 'leading-6', 'text-background/80');
    questionContainer.appendChild(answersectiontitle);

    // Answer Inputs
    const questionContainerBottom = document.createElement('div');
    questionContainerBottom.id = `questionContainerBottom${thisQuestion}`;
    questionContainerBottom.classList.add('flex', 'flex-col', 'gap-4');


    form.appendChild(questionContainer);
    questionContainer.appendChild(questionContainerBottom);

    // Answer One
    const answerContainerOne = document.createElement('div');
    answerContainerOne.classList.add('flex', 'justify-between', 'text-surface', 'gap-3');

    const svgOne = document.createElement('img');
    svgOne.src = '/storage/svg/check.svg';
    svgOne.classList.add('text-current');
    answerContainerOne.appendChild(svgOne);

    const answerInput = document.createElement('input');
    answerInput.type = "text";
    answerInput.name = `question[${thisQuestion}][1]`;
    answerInput.setAttribute('required', "true");
    answerInput.setAttribute('placeholder', "Leonardo da Vinci");
    answerInput.classList.add('max-h-24', 'pl-2', 'block', 'w-full', 'rounded-md', 'border-0', 'py-1.5', 'text-background/80', 'shadow-sm', 'ring-1', 'ring-inset', 'ring-background/10', 'focus:ring-1', 'focus:outline-0', 'focus:ring-surface', 'sm:text-sm', 'sm:leading-6', 'placeholder-background/40');
    answerContainerOne.appendChild(answerInput);
    questionContainerBottom.appendChild(answerContainerOne);

    // Answer Two
    const answerContainerTwo = document.createElement('div');
    answerContainerTwo.classList.add('flex', 'justify-between', 'gap-3');

    const svgTwo = document.createElement('img');
    svgTwo.src = '/storage/svg/x.svg';
    svgTwo.classList.add('text-current');
    answerContainerTwo.appendChild(svgTwo);

    const answerInputTwo = document.createElement('input');
    answerInputTwo.type = "text";
    answerInputTwo.name = `question[${thisQuestion}][2]`;
    answerInputTwo.setAttribute('required', "true");
    answerInputTwo.setAttribute('placeholder', "Keanu Reeves");
    answerInputTwo.classList.add('max-h-24', 'pl-2', 'block', 'w-full', 'rounded-md', 'border-0', 'py-1.5', 'text-background/80', 'shadow-sm', 'ring-1', 'ring-inset', 'ring-background/10', 'focus:ring-1', 'focus:outline-0', 'focus:ring-surface', 'sm:text-sm', 'sm:leading-6', 'placeholder-background/40');
    answerContainerTwo.appendChild(answerInputTwo);
    questionContainerBottom.appendChild(answerContainerTwo);

    const questionButtonContainer = document.createElement('div');
    questionButtonContainer.classList.add('flex', 'gap-4', 'mt-4');
    questionContainer.appendChild(questionButtonContainer);

    // Answer Button
    const addAnswerButton = document.createElement('button');
    addAnswerButton.onclick = () => addAnswer(thisQuestion);
    addAnswerButton.classList.add('px-4', 'py-2.5', 'bg-gradient-to-br', 'from-lighter/90', 'via-surface', 'to-background/70', 'rounded-md', 'min-w-40', 'text-sm', 'font-light', 'tracking-wide', 'hover:font-normal', 'hover:from-lighter', 'hover:to-background/70', 'hover:shadow');
    addAnswerButton.textContent = 'Add Answer';
    addAnswerButton.type = "button";
    questionButtonContainer.appendChild(addAnswerButton);

    // Delete Button
    const deleteAnswerButton = document.createElement('button');
    deleteAnswerButton.onclick = () => deleteQuestion(thisQuestion);
    deleteAnswerButton.classList.add('px-4', 'py-2.5', 'bg-gradient-to-br', 'from-lighter/90', 'via-surface', 'to-background/70', 'rounded-md', 'min-w-40', 'text-sm', 'font-light', 'tracking-wide', 'hover:font-normal', 'hover:from-lighter', 'hover:to-background/70', 'hover:shadow');
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
    answerContainer.classList.add('flex', 'justify-between', 'items-center', 'gap-3', 'w-full');

    const svg = document.createElement('img');
    svg.src = '/storage/svg/x.svg';

    const answerInputDynamic = document.createElement('input');
    answerInputDynamic.type = "text";
    answerInputDynamic.name = `question[${thisQuestion}][${answerCount}]`;
    answerInputDynamic.classList.add('w-full', 'transition-all', 'opacity-0', 'duration-500', 'ease-out', 'max-h-0', 'pl-2', 'block', 'rounded-md', 'border-0', 'py-1.5', 'text-background/80', 'shadow-sm', 'ring-1', 'ring-inset', 'ring-background/10', 'focus:ring-1', 'focus:outline-0', 'focus:ring-surface', 'sm:text-sm', 'sm:leading-6', 'placeholder-background/40');
    answerInputDynamic.setAttribute('required', 'true');
    answerInputDynamic.setAttribute('placeholder', 'Other Incorrect Answer');

    const deleteAnswerButton = document.createElement('img');
    deleteAnswerButton.src = '/storage/svg/trash.svg';
    deleteAnswerButton.classList.add('transition-all', 'opacity-0', 'duration-500', 'ease-out', 'max-h-0', 'rounded-xl')
    deleteAnswerButton.type = "button";
    deleteAnswerButton.style.cursor = 'pointer';
    deleteAnswerButton.onclick = () => deleteAnswer(answerCount, thisQuestion);

    questionContainerBottom.appendChild(answerContainer);
    answerContainer.appendChild(svg);
    answerContainer.appendChild(answerInputDynamic);
    answerContainer.appendChild(deleteAnswerButton);

    void answerInputDynamic.offsetHeight;
    answerInputDynamic.classList.add('pt-1.5', 'pb-1.5', 'opacity-100', 'max-h-11');
    void deleteAnswerButton.offsetHeight;
    deleteAnswerButton.classList.add('opacity-100', 'max-h-8');

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
