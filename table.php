<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport content=" width-device-width, initial-scale=1.0">
        <title>Add student</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
        <script src="https://js.pusher.com/4.1/pusher.min.js"></script> 
    </head>

    <body>
        <div class="container">
            <div class="row"></div>
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Student list</h5>
                        <table class="table table-hover">
                            <thead>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Age</th>
                            </thead>
                            <tbody id="student-table"></tbody>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            let pusher = new Pusher('226c715338747bb63bb6', {
                cluster: 'eu'
            });

            let channel = pusher.subscribe('demo_pusher');
            channel.bind('add_student', function(data) {
                let sName = data["message"]["student-name"];
                let sSurname = data["message"]["student-surname"];
                let sAge = data["message"]["student-age"];

                let newTr = document.createElement("tr");

                let newTdName = document.createElement("td");
                newTdName.append(sName);
                let newTdSurname = document.createElement("td")
                newTdSurname.append(sSurname);
                let newTdAge = document.createElement("td");
                newTdAge.append(sAge);

                newTr.append(newTdName);
                newTr.append(newTdSurname);
                newTr.append(newTdAge);

                document.getElementById("student-table").append(newTr);
            });
        </script>
    </body>

    </html>