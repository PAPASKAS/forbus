document.forms[0].addEventListener('submit', (e) => {
    e.preventDefault();

    const data = {
        questionId: e.target.questionId.value.trim(),
        comment: e.target.comment.value.trim(),
        _token: e.target._token.value
    };

    axios({
        method: e.target._method.value,
        url: e.target.action,
        data,
    })
        .then(res =>{
            window.Noty("Комментарий успешно добавлен!", 'success');
        })
        .catch(err => {
            if(err.response.status >= 500){
                window.Noty("Непредвиденная ошибка сервера", 'error');
            }
            const errArr = Object.values(err.response.data.errors);

            errArr.forEach((message) => {
                window.Noty(message, 'error');
            })
        })
});
