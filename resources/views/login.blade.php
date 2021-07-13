<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="/js/axios.min.js"></script>

</head>
<body>
    <main class="login-form mt-4">
        <div class="container">
            <div class="row justify-content-center align-self-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">login</div>
                        <div class="card-body">
                            <form id="form" method="POST">
                                <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right">username</label>
                                    <div class="col-md-6">
                                        <input type="text" id="username" class="form-control" name="usernaame" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password" required>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-4 mt-4">
                                    <button type="submit" id="btn" class="btn btn-primary">
                                        Login
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
        let password = document.querySelector("#password")
        let form = document.querySelector("#form")

        form.addEventListener('submit', function(e){
            login(e)
        })

        async function login(e){
            e.preventDefault()

            if(username.value.trim() == "" || password.value.trim() == ""){
                alert("username dan password harus di isi")
            }else{
                let data = {
                    username: username.value.trim(),
                    password: password.value.trim()
                }
                let res = await axios.post("/api/dosen/login", data)
                console.log(res.data)
                if(res.status == 200){
                    localStorage.setItem("dosen", res.data.session)
                    window.location = "/matakuliah"
                }
            }
        }
    </script>
</body>
</html>l