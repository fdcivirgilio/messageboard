function getDateArrayFromDateString(dateString){

    let date = new Date(dateString);
    year = date.getFullYear();
    month = date.getMonth();
    day = date.getDate();
    month_word = getMonthsInWords()[month];

    return { year: year, month: month, day: day, month_word: month_word };
}

function getMonthsInWords(){
    return ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
}

function padWithZero(number) {
    return number.toString().padStart(2, '0');
}
