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
                            <form method="POST" id="formCreate">
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
                                        Tambah Mata Kuliah
                                    </button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <table class="table table-auto">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Matkul</th>
                        <th scope="col">SKS</th>
                        <th scope="col">Pengajar</th>
                        <th colspan="2">Opsi</th>
                      </tr>
                    </thead>
                    <tbody id="tbbody">
                    </tbody>
                  </table>
            </div>
        </div>
        </div>
    
    </main>
    <script src="/js/axios.min.js"></script>
    <script>
        let matkul = document.querySelector("#matkul");
        let sks = document.querySelector("#sks")
        let formCreate = document.querySelector("#formCreate")

        formCreate.addEventListener("submit", function(e){
            create(e)
        })

        async function create(e){
            e.preventDefault();
            let sessionDosen = localStorage.getItem("dosen")
            let data = {
                nama_matkul: matkul.value.trim(),
                sks: sks.value.trim(),
                kode_dosen: sessionDosen
            }
            try {
                let response = await axios.post('/api/matakuliah', data);
                if(response.status == 200){
                    let getnewData = await axios.get(`/api/matakuliah/${response.data.id}`)
                    let newData = getnewData.data.data
                    fetchDataCollection()
                }
            } catch (error) {
                console.log(error.message)
            }
        }

        let collection = []
        let tbbody = document.querySelector("#tbbody")
        fetchDataCollection()
        async function fetchDataCollection() {
            let response = await axios.get('/api/matakuliah')
            collection = response.data.data
            showData()
        }
        

        async function removeData(index){
            let res = axios.delete(`/api/matakuliah/${collection[index].id}`)
            collection.splice(index, 1)
            showData()
        }

        function showData(){
            tbbody.innerHTML = ""
            let no = 0
            for(let matkul of collection){
            let noTb = document.createElement("td")
            noTb.innerHTML = no+1

            let namamatkul = document.createElement("td")
            namamatkul.innerHTML = matkul.nama_matkul

            let sks = document.createElement("td")
            sks.innerHTML = matkul.sks

            let pengajar = document.createElement("td")
            pengajar.innerHTML = matkul.nama_dosen

            let btnRemove = `<button class="btn btn-danger" onclick="removeData(${no})">Hapus</button>`
            let btnEdit = `<button class="btn btn-primary" onclick="editData(${no})">Edit</button>`
            let tdremove = document.createElement("td")
            tdremove.innerHTML = btnRemove
            let tdedit = document.createElement("td")
            tdedit.innerHTML = btnEdit

            let tbrow = document.createElement("tr")
            tbrow.appendChild(noTb)
            tbrow.appendChild(namamatkul)
            tbrow.appendChild(sks)
            tbrow.appendChild(pengajar)
            tbrow.appendChild(tdedit)
            tbrow.appendChild(tdremove)
            tbbody.appendChild(tbrow)

            no++
            }
        }
    </script>
</body>
</html>