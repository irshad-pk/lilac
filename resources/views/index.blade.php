<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <title>Lilac Infotech</title>
</head>

<body>

    <div class="search-table">
        <div class="container mt-5 pb-5">

            <div class="row">
                <div class="col-md-12">
                    @csrf
                    <div class="form-group">
                        <label for="search">Search</label>
                        <input type="search" class="form-control" id="txt_search" name="search_text"
                            placeholder="Search name/designation/department">
                    </div>
                </div>
            </div>
            <div class="row" id="result"></div>



        </div>
    </div>
    <script>
        $("#txt_search").keyup(function() {
            $.ajax({
                type: 'POST',
                url: '{{ route('search') }}',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'search_text': this.value
                },
                success: function(data) {
                    $("#result").html(data);
                }
            });
        });

    </script>


</body>

</html>
