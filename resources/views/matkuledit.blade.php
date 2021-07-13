<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mata Kuliah</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <script src="/js/axios.min.js"></script>
</head>
<body>
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center align-self-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Mata Kuliah</div>
                        <div class="card-body">
                            <form method="POST" id="formUpdate">
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Mata Kuliah</label>
                                    <div class="col-md-6">
                                        <input type="text" id="matkul" class="form-control" name="matkul" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">SKS</label>
                                    <div class="col-md-6">
                                        <input type="number" id="sks" class="form-control" name="sks" required>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-4 mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update
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
        let matkul = document.querySelector("#matkul");
        let sks = document.querySelector("#sks")
        let form = document.querySelector("#formUpdate")
        let path = window.location.pathname.split("/")

        form.addEventListener("submit", function(e){
            update(e)
        })

        
        get()
        async function get(){
            let id = path[path.length-1]
            let response = await axios.get(`/api/matakuliah/${id}`)
            console.log(response)
            if(response.status == 200){
                matkul.value = response.data.data.nama_matkul
                sks.value = response.data.data.sks
            }
        }

        async function update(e){
            e.preventDefault()
            let id = path[path.length-1]
            let dosen = localStorage.getItem('dosen')
            let data = {
                nama_matkul: matkul.value.trim(),
                sks: sks.value.trim(),
                kode_dosen: dosen
            }
            try {
                let res = await axios.put(`/api/matakuliah/${id}`, data)
                if(res.status == 200){
                    window.location = "/matakuliah"
                }
            } catch (error) {
                console.log(error.message)
            }
        }
    </script>
</body>
</html>