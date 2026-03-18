function createInterestList(sectionId, ...items) {
    const $section = $(`#${sectionId}`);
    if ($section.length === 0) return; // Проверка, существует ли секция
    const $ul = $('<ul></ul>'); // Создаём элемент <ul>
    var index = 0;
    items.forEach(item => {
        const $li = $('<li></li>'); // Создаём элемент <li>
        const $img = $(`<img class=img-${sectionId} src=image/${sectionId}${index + 1}.jpg alt=${item} title=${item}>`);
        const $divName = $(`<div class="name">${item}</div>`);
        $li.append($img);
        $li.append($divName);
        $ul.append($li);
        index++;
    });
    $section.append($ul);
}
createInterestList('film', 'Джон Уик', 'Миссия невыполнима 3');
createInterestList('book', 'HTML и CSS', 'Си Шарп', 'Java');
createInterestList('car', 'Toyota Alteza', 'Toyota Mark 2', 'Honda Civic');