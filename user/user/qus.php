<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #eee;
        }

        label.radio {
            cursor: pointer;
        }

        label.radio input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none;
        }

        label.radio span {
            padding: 4px 0px;
            border: 1px solid red;
            display: inline-block;
            color: red;
            width: 100px;
            text-align: center;
            border-radius: 3px;
            margin-top: 7px;
            text-transform: uppercase;
        }

        label.radio input:checked+span {
            border-color: red;
            background-color: red;
            color: #fff;
        }

        .ans {
            margin-left: 36px !important;
        }

        .btn:focus {
            outline: 0 !important;
            box-shadow: none !important;
        }

        .btn:active {
            outline: 0 !important;
            box-shadow: none !important;
        }
    </style>

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="container mt-5">
            <div class="d-flex justify-content-center row">
                <div class="col-md-10 col-lg-10">
                    <div class="border">
                        <div class="question bg-white p-3 border-bottom">
                            <div class="d-flex flex-row justify-content-between align-items-center mcq">
                                <h4>MCQ Quiz</h4>
                            </div>
                        </div>
                        <div class="question bg-white p-3 border-bottom">
                            <div class="d-flex flex-row align-items-center question-title">
                                <h3 class="text-danger">Q.</h3>
                                <h5 class="mt-1 ml-2">Which of the following country has largest population?</h5>
                            </div>
                            <div class="ans ml-2">
                                <label class="radio"> <input type="radio" name="quizOption" value="brazil"> <span>Brazil</span>
                                </label>
                            </div>
                            <div class="ans ml-2">
                                <label class="radio"> <input type="radio" name="quizOption" value="Germany"> <span>Germany</span>
                                </label>
                            </div>
                            <div class="ans ml-2">
                                <label class="radio"> <input type="radio" name="quizOption" value="Indonesia"> <span>Indonesia</span>
                                </label>
                            </div>
                            <div class="ans ml-2">
                                <label class="radio"> <input type="radio" name="quizOption" value="Russia"> <span>Russia</span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white"><button class="btn btn-primary border-success align-items-center btn-success" type="button">Submit<i class="fa fa-angle-right ml-2"></i></button></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>
</body>

</html>