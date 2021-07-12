### Before Using
- `PHP VERSION 8`
- `CREATE DATABASE with name KULIAH`
- `install dependency
  ```
  $ composer install
  ```

### Using Application
- Migrate table 
  ```
  $ php artisan migrate
  ```

- Seeding example data
  ```
  $ php artisan seed --class dosenseed
  $ php artisan seed --class matakuliahseed
  ```

- Running application
  ```
  $ php artisan serve
  ```

#### API SPEC
##### DOSEN
###### Login
- METHOD `POST`
- endpoint `/api/dosen/login`
- Request 
  ```json
  {
      "username": "string",
      "password": "string password
  }
  ```
- Response
  ```json
  {
      "status": 200,
      "message": "success login",
      "session": "session"
  }
  ```

###### Registration
- METHOD `POST`
- endpoint `/api/registration`
- Request
    ```json
    {
        "username": "string",
        "password": "string",
        "nama_dosen": "string",
        "alamat": "string",
        "tempat_lahir": "string",
        "tanggal_lahir": "string date"
    }
    ```
- Response
    ```json
    {
        "status": 200,
        "message": "Success registration dosen"
    }
    ```

##### Mata Kuliah
###### Create
- METHOD `POST`
- endpoint `/api/matakuliah
- Request
    ```json
    {
        "nama_matkul": "string",
        "sks": "integer",
        "kode_dosen": "integer"
    }
    ```

###### Collection
- METHOD `GET`
- endpoint `/api/matakuliah`
- Response
  ```json
    {
        "status": 200,
        "message": "Success get collections",
        "data": [
            {
                "id": "integer",
                "nama_matkul": "string",
                "nama_dosen": "string",
                "sks": "integer"
            }
        ]
    }
  ```
###### Get
- METHOD `GET`
- endpoint `/api/matakuliah/${id}`
- Response
  ```json
    {
        "status": 200,
        "message": "Success get collections",
        "data": {
                "id": "integer",
                "nama_matkul": "string",
                "nama_dosen": "string",
                "sks": "integer"
        }
    }
  ```

###### Update
- METHOD `PUT`
- endpoint `/api/matakuliah/{id}
- Request
  ```json
  {
    "nama_matkul": "string",
    "sks": "intger",
    "kode_dosen": "integer"
  }
  ```
- Response
  ```json
  {
    "status": 200,
    "message": "Success update matakuliah.{number}",
    "data": {
        "id": "integer",
        "nama_matkul": "string",
        "nama_dosen": "string",
        "sks": "integer"
    }
  }
  ```

###### Delete
- METHOD `DELETE`
- endpoint `/api/matakuliah/{id}`
- Response
  ```json
  {
    "status": 200,
    "message": "Success remove matkul.5"
  }
  ```
