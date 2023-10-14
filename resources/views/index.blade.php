<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Laravel 9</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">

                <h1>Tutorial CRUD Dengan Jquery Ajax</h1>
                <button class="btn btn-primary" onclick="create()">Tambah Product</button>
                <div id="read" class="mt-3">

                </div>
            </div>
        </div>
    </div>






    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="page" class="p-2"></div>
            </div>
        </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

    <script>
        $(document).ready(function name(params) {
            read();
        });

        // Read Database
        function read() {
            $.get("{{ url('read') }}", {}, function(data, status) {
                $("#read").html(data);
            });
        }

        // untuk modal halaman create
        function create() {
            $.get("{{ url('create') }}", {}, function(data, status){
                $("#exampleModalLabel").html('Create Product')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        // untuk proses data create
        function store() {
            var name = $("#name").val();
            $.ajax({
                type:"get",
                url:"{{ url('store') }}",
                data:"name="+name,
                success:function(data){
                    // $("#page").html('');
                    $(".btn-close").click();
                    read();
                }
            });
        }


        // untuk modal halaman edit (show)
        function show(id) {
            $.get("{{ url('show') }}/"+id, {}, function(data, status){
                $("#exampleModalLabel").html('Edit Product')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }


        // untuk proses update data
        function update(id) {
            var name = $("#name").val();
            $.ajax({
                type:"get",
                url:"{{ url('update') }}/"+id,
                data:"name="+name,
                success:function(data){
                    // $("#page").html('');
                    $(".btn-close").click();
                    read();
                }
            });
        }


        // untuk delete atau destroy
        function destroy(id) {
            if (confirm("Apakah yakin untuk hapus data?") == true) {
                var name = $("#name").val();
                $.ajax({
                    type:"get",
                    url:"{{ url('destroy') }}/"+id,
                    data:"name="+name,
                    success:function(data){
                        // $("#page").html('');
                        $(".btn-close").click();
                        read();
                    }
                });
            }

        }


    </script>


</body>
</html>
