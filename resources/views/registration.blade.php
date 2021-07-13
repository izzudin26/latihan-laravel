<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="/js/axios.min.js"></script>
</head>
<body>
    <main class="login-form mt-4">
        <div class="container">
            <div class="row justify-content-center align-self-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Registration</div>
                        <div class="card-body">
                            <form method="POST" id="registration">
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">username</label>
                                    <div class="col-md-6">
                                        <input type="text" id="username" class="form-control" name="usernaame" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Nama Dosen</label>
                                    <div class="col-md-6">
                                        <input type="text" id="namadosen" class="form-control" name="namadosen" required>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Alamat kota</label>
                                    <div class="col-md-6">
                                        <input type="text" id="alamat" class="form-control" name="alamat" required>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">kota lahir</label>
                                    <div class="col-md-6">
                                        <input type="text" id="kotalahir" class="form-control" name="kotalahir" required>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Tanggal Lahir</label>
                                    <div class="col-md-6">
                                        <input type="date" id="tanggallahir" class="form-control" name="tanggallahir" required>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password" required>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-4 mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registration
                                    </button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    
    </main>
    <script src="/js/axios.min.js"></script>
    <script>
        let username = document.querySelector('#username')
        let nama = document.querySelector("#namadosen")
        let alamat = document.querySelector("#alamat")
        let kotalahir = document.querySelector("#kotalahir")
        let password = document.querySelector("#password")
        let tanggallahir = document.querySelector("#tanggallahir")

        let registrationForm = document.querySelector("#registration")

        registrationForm.addEventListener("submit", function(event){
            registration(event)
        })

        async function registration(e){
            e.preventDefault()
            let data = {
                username: username.value.trim(),
                password: password.value.trim(),
                nama_dosen: nama.value.trim(),
                alamat: alamat.value.trim(),
                tempat_lahir: kotalahir.value.trim(),
                tanggal_lahir: tanggallahir.value.trim(),
            }
            try {
            let res = await axios.post('/api/dosen/registration', data)
                if(res.status == 200){
                    window.location = "/login"
                }
            } catch (error) {
                alert(error.message)                
            }
        }
    </script>
</body>
</html>l