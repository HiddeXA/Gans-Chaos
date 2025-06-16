imageInp.onchange = evt => {
    const [file] = imageInp.files
    if (file) {
        imagePreview.src = URL.createObjectURL(file)
    }
}

registerForm.onsubmit = async evt => {
    evt.preventDefault()

    const formData = new FormData(registerForm)

    if (imageInp.files[0] !== undefined) {
        formData.set('profile_picture', imageInp.files[0]);
    }

    fetch('/registreren', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'X-CSRF-Token': document.querySelector('input[name=_token]').value
        },
        body: formData // Verstuur FormData direct, niet als JSON
    }).then(response => {
        if (response.status === 200) {
            response.json().then(data => {
                window.location.href = data.redirect;
            })
        } else {
            response.json().then(data => {
                for (var key in data.errors) {
                    Swal.fire({
                        toast: true,
                        title: "Oeps!",
                        text: data.errors[key],
                        icon: "error",
                    });
                }
            });
        }
    });
}
