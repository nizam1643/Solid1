<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Employee Live Search with AJAX</title>
</head>

<body>
    <div class="container">
        <h4 class="text-center mt-4">Live Search in Laravel 8 using AJAX MySql</h3>
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Search Student"
                                                id="search">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <img src="https://assets.tokopedia.net/assets-tokopedia-  lite/v2/zeus/kratos/af2f34c3.svg"
                                                        alt="">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-striped table-inverse table-responsive d-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>StudentID</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>

<script>
    $('#search').on('keyup', function() {
        search();
    });
    search();

    function search() {
        var keyword = $('#search').val();
        $.post('http://solidli1.test/api/', {
                _token: $('meta[name="csrf-token"]').attr('content'),
                keyword: keyword
            },
            function(data) {
                table_post_row(data);
                console.log(data);
            });
    }
    // table row with ajax
    function table_post_row(res) {
        let htmlView = '';
        if (res.students.length <= 0) {
            htmlView += `
           <tr>
              <td colspan="4">No data.</td>
          </tr>`;
        }
        for (let i = 0; i < res.students.length; i++) {
            htmlView += `
            <tr>
               <td>` + (i + 1) + `</td>
                  <td>` + res.students[i].name + `</td>
                   <td>` + res.students[i].studentID + `</td>
                   <td>` + res.students[i].email + `</td>
            </tr>`;
        }
        $('tbody').html(htmlView);
    }
</script>
