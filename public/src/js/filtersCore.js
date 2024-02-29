// Функція вбудови до посилання критерію сортування
function setSortingFilter(e, param, value) {
    e.href = setUrlParam(param, value);
};

// Функція вбудови параметрів сортування до посилання
function setUrlParam(param, value) {
    let newURL = window.location.protocol + '//' + window.location.host + window.location.pathname + '?';

    let url = decodeURIComponent(window.location.search.substring(1)),
        urlVar = url.split('&'),
        flag = false,
        params;

    for (let i = 0; i < urlVar.length; i++) {
        params = urlVar[i].split('=');

        if (params[0] === param) {
            params[1] = value;
            flag = true;
        }

        if (params[0]) {
            newURL = newURL + params[0] + '=' + params[1] + '&'
        }
    }

    if (flag == false) {
        newURL = newURL + param + '=' + value
    }

    return newURL
};

// Функція автоматично встановлює останньо-вибраний користувачем фільтер пошуку (за типом)
function setSortTypeText(sorting) {
    let id;
    switch (sorting) {
        case "title":
            id = 'type1';
            break;
        case "execution_status":
            id = 'type2';
            break;
        case "created_at":
            id = 'type3';
            break;
    }
    document.getElementById(id).classList.toggle("filter-category-active");
}

// Функція автоматично встановлює останньо-вибраний користувачем фільтер пошуку (за зростанням)
function setSortGrowthText(sorting) {
    let id;
    switch (sorting) {
        case "desc":
            id = 'growth1';
            break;
        case "asc":
            id = 'growth2';
            break;
    }
    document.getElementById(id).classList.toggle("filter-category-active");
}
