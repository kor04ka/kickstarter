<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php 

        $connect = mysqli_connect('127.0.0.1', 'root', '', 'kickstarter');

        $query_db = 'SELECT * FROM projects WHERE user="kor"';

        $query = mysqli_query($connect, $query_db);

    ?>
    <style>
        #form {
            display: hidden;
            opacity: 0;
            max-height: 0;
            max-width: 0;
            transition: .7s cubic-bezier(1,.04,.77,1.16);
            overflow: hidden;
            position: relative;
        }

        #start {
            cursor: pointer;
        }

        #project {
            transition: all .6s cubic-bezier(1,.04,.77,1.16);
            overflow: hidden;
        }

        .button{background: 0;}input, textarea, .button {
            border-radius: 5px;
            border: 1px solid white;
            resize: none;
            margin-top: 15px;
            transition: .1s;
            padding: 4px;
            opacity: 70%;
            cursor: text;
        }

        input:hover, textarea:hover, .button:hover {
            border: 1px solid black;
            opacity: 100%;
        }

        input:focus, textarea:focus, .button:focus {
            outline: none;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div class="col-12">
        <div class="row">
            <div class="col-2 pt-3">
                <a href="index.php" class="text-dark ml-3">Explore</a>
                <a class="text-dark ml-3" id="start">Start a project</a>
            </div>
            <div class="col-8 text-center">
                <img src="logo.png" class="w-25">
                <p>#BlackLivesMatter</p>
            </div>
            <div class="col-2 text-left pt-3">
                <a href="" class="mr-3"> <i class="fa fa-search"></i> Search</a>
                <a href="acc.php"><img src="lk.png" class="rounded-circle" ></a>
            </div>
        </div>
    </div>
    <div id="form" style="margin-left: 40%;">
        <form action="insert.php" method="GET">
            <div class="col-4" style="display: grid">
                <input type="text" name="title" id="" placeholder="заголовок">
                <textarea name="description" id="" placeholder="описание"></textarea>
                <input type="text" name="goal" id="" placeholder="необходимая сумма">
                <input type="text" name="img" id="" placeholder="images/обложка">
                <input type="text" name="place" id="" placeholder="город">
                <button class="button">Добавить</button>
            </div>
        </form>
    </div>
    <div class="col-8 mx-auto mt-5" id="project">
        <h4>My projects</h4>
        <div class="col-12 mt-3">
        <?php 
			while ($row = mysqli_fetch_assoc($query)) {
        ?>
            <div class="col-12 mt-3" style="display: block;">
                <div class="col-6">
                    <h1 class=""><?php echo $row['title']?></h1>
                    <p><?php echo $row['description']?></p>
                </div>
                <div class="row">
                    <div class="text-center col-7">
                        <div style="background-image: url(<?php echo $row['img']?>); width: 100%; height: 498.6px; background-size: cover;"></div>
                        <p></p>
                    </div>
                <div class="col-5">
                    <h6 class="text-success">Собранные</h6><h2 class="text-success">$<?php echo $row['donated']?></h2>
                    <h6>Цель </h6><h2>$<?php echo $row['goal']?></h2>
                    <div style="position: absolute; bottom: 5%;">
                        <button class="btn btn-success redact">Редактировать</button>
                        <button class="btn btn-danger delete">Удалить</button>
                    </div>
                </div>
                </div>
            </div>
		<?php
			};
        ?>
        </div>
    </div>
    <script>
        let a = document.querySelector('#start')
        let form = document.querySelector('#form')
        let p = document.querySelector('#project')
        let pushed = false
        let dropdown = function() {
            form.style.maxHeight = "700px"
        }

        let dropdownFade = function() {
            form.style.opacity = "100%"
            p.style.opacity = "0%"
        }

        let mainFade = function() {
            p.style.display = "hidden"
        }
        a.onclick = function() {
            form.style.maxWidth = "100%"
            form.style.display = "block"
            setTimeout(dropdownFade, 0)
            setTimeout(dropdown, 100)
            setTimeout(mainFade, 700)
        }
    </script>
</body>
</html>