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
        input, textarea, .button {
            border-radius: 5px;
            border: 1px solid white;
            resize: none;
            margin-top: 15px;
            transition: .1s;
            padding: 4px;
            opacity: 50%;
            cursor: crosshair;
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
                <a href="" class="text-dark ml-3">Explore</a>
                <a href="" class="text-dark ml-3">Start a project</a>
            </div>
            <div class="col-8 text-center">
                <img src="logo.png" class="w-25">
                <p>#BlackLivesMatter</p>
            </div>
            <div class="col-2 text-left pt-3">
                <a href="" > <i class="fa fa-search"></i> Search</a>
                <a href="acc.php"><img src="lk.png" class="rounded-circle" ></a>
            </div>
        </div>
    </div>
    <form action="">
        <div class="col-3 mx-auto" style="display: grid">
            <input type="text" name="" id="" placeholder="заголовок">
            <textarea name="" id="" placeholder="описание"></textarea>
            <input type="text" name="" id="" placeholder="необходимая сумма">
            <input type="text" name="" id="" placeholder="images/обложка">
            <input type="text" name="" id="" placeholder="город">
            <input type="text" name="" id="" placeholder="пользователь">
            <button class="button">Добавить</button>
        </div>
    </form>
    <div class="col-8 mx-auto mt-5">
        <h4>My projects</h4>
        <div class="col-12 mt-3">
        <?php 
			while ($row = mysqli_fetch_assoc($query)) {
        ?>
            <div class="col-12" style="display: block">
                <h1 class=""><?php echo $row['title']?></h1>
                <p><?php echo $row['description']?></p>
                <div class="row">
                    <div class="text-center col-7">
                        <img class="w-100" src="<?php echo $row['img']?>" alt="">
                        <p></p>
                    </div>
                <div class="col-5">
                    <h4>Reached</h4><span class="text-success">$<?php echo $row['donated']?></span>
                    <p></p>
                    <h4>Goal </h4><p>$<?php echo $row['goal']?></p>
                </div>
                </div>
            </div>
		<?php
			};
        ?>
        </div>
    </div>
</body>
</html>