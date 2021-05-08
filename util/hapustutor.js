const button = document.querySelectorAll('.button2');
button.forEach(btn => {
    btn.addEventListener('click', event => {
        event.preventDefault();
        Swal.fire({
            title: 'Apakah anda Yakin?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ee2a7b',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch('../util/hapustutor.php', {
                    method: 'POST',
                    headers: {
                        'content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        hapus: btn.getAttribute("user-id"),
                        gambar: btn.getAttribute("img-tutor"),
                    }),
                }).then(response => {
                    // if (response.status !== 200) throw new Error(response.message);
                    return response.json();
                }).then(response => {
                    if (response.status ==='error') throw new Error(response.message);
                    Swal.fire({
                        text: response.status,
                        confirmButtonColor: '#ee2a7b'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = "./lihatTutor.php";
                        }
                    })
                }).catch(err => {
                    Swal.fire({
                        text: err.message,
                        confirmButtonColor: '#4CAF50'
                    })
                });
            }
        });

    });
})
