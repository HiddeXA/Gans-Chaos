
imageInp.onchange = evt => {
    const [file] = imageInp.files
    if (file) {
        imagePreview.src = URL.createObjectURL(file)
    }
}

registerForm.onsubmit = async evt => {
    evt.preventDefault()

    const formData = new FormData(registerForm)

    var object = {};
    formData.forEach((value, key) => object[key] = value);

    if (imageInp.files[0] !== undefined) {
        await toBase64(imageInp.files[0]).then(
            data => object.profile_picture = data
        );
    }

    var json = JSON.stringify(object);

    fetch('/registreren', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'url': '/registreren',
            "X-CSRF-Token": document.querySelector('input[name=_token]').value
        },
        body: json
    }).then(response => {
        if (response.status === 200) {
            response.json().then(data => {
                window.location.href = data.redirect;
            })
        } else {
            response.json().then(data => {
                for ( var key in data.errors ) {
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

const toBase64 = file => new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => resolve(reader.result);
    reader.onerror = reject;
});

