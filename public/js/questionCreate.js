document.getElementById('questionAskForm').addEventListener('submit', (e) => {
    e.preventDefault();

    const data = {
        title: e.target.title.value.trim(),
        body: e.target.body.value.trim(),
        _token: e.target._token.value
    };

    axios({
        method: e.target.method,
        url: e.target.action,
        data,
    })
        .then(res =>{
            window.Noty("Вопрос успешно добавлен!", 'success');
        })
        .catch(err => {
            const errArr = Object.values(err.response.data.errors);

            errArr.forEach((message) => {
                window.Noty(message, 'error');
            })
        })
});
