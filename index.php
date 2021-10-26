<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" >
</head>
<body>

    <div class="container">
        <h4>CRUD</h4>
        <hr />
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form id="infoFrom">
                            <label>Lastname</label>
                            <input name="lastname" type="text" class="form-control" />
                            <label>Firstname</label>
                            <input name="firstname" type="text" class="form-control" />
                            <label>DOB</label>
                            <input name="dob" type="date" class="form-control" />
                            <hr />
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <table id="infoTable" class="table talbe-striped"></table>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="./pages/app.js"></script>
    <script src="./pages/index/index.js"></script>
</body>
</html>