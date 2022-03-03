document.forms[0].addEventListener('submit', (e) => {
    e.preventDefault();

    const data = {
        title: e.target.title.value.trim(),
        body: e.target.body.value.trim(),
        _token: e.target._token.value
    };

    axios({
        method: e.target._method.value,
        url: e.target.action,
        data,
    })
        .then(res =>{
            window.Noty("Вопрос успешно изменен!", 'success');
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
