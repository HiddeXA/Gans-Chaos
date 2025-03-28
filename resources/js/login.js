loginForm.onsubmit = async evt => {
    evt.preventDefault()

    fetch(
        '/inloggen',
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'url': '/login',
                "X-CSRF-Token": document.querySelector('input[name=_token]').value
            },
            body: JSON.stringify(
                {
                    email: loginForm.email.value,
                    password: loginForm.password.value
                }
            )
        }
    ).then(
        response => {
            if (response.status === 200) {
                response.json().then(
                    data => {
                        window.location.href = data.redirect
                    }
                )
            } else {
                response.json().then(
                    data => {
                        for (var key in data.errors) {
                            Swal.fire({
                                toast: true,
                                title: "Oeps!",
                                text: data.errors[key],
                                icon: "error",
                            })
                        }
                    }
                )
            }
        }
    )
}
