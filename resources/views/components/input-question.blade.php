<div class="flex flex-col px-4 py-4 bg-surface gap-4">
    <div class="flex justify-between w-full">
        <input type="text" name="question[0][0]" required class="w-full rounded-xl">
    </div>
    <div id="questionContainerBottom0" class="flex flex-col gap-4">
        <input type="text" name="question[0][1]" required class="max-h-24 pt-3 pb-3 rounded-xl">
        <input type="text" name="question[0][2]" required class="max-h-24 pt-3 pb-3 rounded-xl">
    </div>
    <button type="button" onclick="addAnswer(0)" class="px-8 py-2 bg-surface rounded-xl">Add Answer</button>
</div>
