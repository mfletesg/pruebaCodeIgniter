<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Prueba CodeIgniter Miguel Fletes</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        var base_url = "<?php echo base_url();?>";
    </script>
    <script src="<?=base_url()?>/public/js/home.js"></script>

    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">

                <button type="button" class="btn btn-primary" onclick="modalUser(1)" style="margin-bottom: 20px; margin-top: 20px;" >➕ New</i></button>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">FirstName</th>
                            <th scope="col">LastName</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="dataTable">
                    </tbody>
                </table>

                <a  class="btn btn-primary" href="https://miguelfletes.com" style="margin-bottom: 20px; margin-top: 20px;" >Ir a mi página Web</i></a>
            </div>
        </div>
    </div>



    <div class="modal" tabindex="-1" role="dialog" id="modalUser">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Firt Name</label>
                            <input type="text" class="form-control form-control-sm" id="inputFirtName" aria-describedby="emailHelp" placeholder="Enter Firt Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail2">Last Name</label>
                            <input type="text" class="form-control form-control-sm" id="inputLastName" aria-describedby="emailHelp" placeholder="Enter Last Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail2">Address</label>
                            <input type="text" class="form-control form-control-sm" id="inputAddress" aria-describedby="emailHelp" placeholder="Enter Address">
                        </div>

                        <input id="userId" name="userId" type="hidden" value="0">
                    </form>
                </div>
                <div class="modal-footer">
                        

                    <div id="btnModalSuccess"></div>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>