const logout = document.querySelector('.logout');
logout.addEventListener('click', event => {
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
            fetch('../util/logout.php',{
                method: 'GET',
            }).then(response => response.json()).then(response => {
               location.href ="../index.php";
            }).catch(err => console.log(err));
        }
    });
});