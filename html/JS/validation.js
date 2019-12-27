var form = document.querySelector('.registerform')
var validateBtn = form.querySelector('.button')
var fields = form.querySelectorAll('.input')



var generateError = function (text) {
    var error = document.createElement('div')
    error.className = 'error'
    error.style.color = 'red'
    error.innerHTML = text
    return error
}

var removeValidation = function () {
    var errors = form.querySelectorAll('.error')

    for (var i = 0; i < errors.length; i++) {
        errors[i].remove()
    }
}

var checkFieldsPresence = function () {
    for (var i = 0; i < fields.length; i++) {
        if (!fields[i].value) {
            if (document.body.className == 'en') {
                console.log('Required field', fields[i])
                var error = generateError('Required field')
            }
            else {
                console.log('Обязательное поле для заполнения', fields[i])
                var error = generateError('Обязательное поле для заполнения')
            }
            form[i].parentElement.insertBefore(error, fields[i])
            event.preventDefault()
        }
    }
}

var checkPasswordMatch = function () {
    if(password.value.length < 8)
    {
        if (document.body.className == 'en') {
            var error = generateError('Password must be longer than 7 characters')
        }
        else {
            var error = generateError('Длинна пароля должна быть больше 7 символов')
        }
    }

    if (password.value !== password2.value) {
        if (document.body.className == 'en') {
            console.log('Passwords are not the same')
            var error = generateError('Passwords are not the same')
        }
        else {
            console.log('Пароли не одинаковые')
            var error = generateError('Пароли не одинаковые')
        }
    }
    console.log(error)
    password.parentElement.insertBefore(error, password)
    event.preventDefault()
}


form.addEventListener('submit', function (event) {

    removeValidation()

    checkFieldsPresence()

    checkPasswordMatch()
})