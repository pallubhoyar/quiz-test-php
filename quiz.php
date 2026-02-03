<?php
$Trueans = [
    "Hyper Text Markup Language",
    "Creating Web Page Structure",
    ".html",
    "<br>",
    "src",
    "border-radius",
    "<--comment-->",
    "_blank",
    "password",
    "<th>"
];

$score = 0;
$isQuizSubmitted = isset($_POST['submit']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML Quiz</title>
    <style>
        * {
            margin: 0; padding: 0; box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            padding: 20px;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 800px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        h2 {
            margin-bottom: 25px;
            position: relative;
            font-size: 26px;
            color: #333;
        }

        h2::before {
            content: "";
            position: absolute;
            left: 0;
            bottom: -5px;
            height: 3px;
            width: 40px;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
        }

        .question-card {
            background: #fdfdfd;
            border: 1px solid #eee;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .question-card p {
            font-weight: 600;
            margin-bottom: 10px;
            color: #444;
        }

        .options-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .option-item {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            font-size: 15px;
        }

        input[type="radio"] {
            accent-color: #9b59b6;
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        input[type="submit"], .btn-retry {
            width: 100%;
            padding: 15px;
            margin-top: 20px;
            border: none;
            border-radius: 6px;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            color: white;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            display: block;
            text-align: center;
        }

        input[type="submit"]:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

       
        .result-info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            line-height: 1.8;
        }

        .score-box {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #9b59b6;
            margin: 20px 0;
            padding: 15px;
            border: 2px dashed #71b7e6;
        }

        .ans-list {
            padding-left: 20px;
            color: #2ecc71;
            font-weight: 500;
        }
    </style>
</head>
<body>

<div class="container">
    <?php if(!$isQuizSubmitted){ ?>
        <h2>HTML Quiz</h2>
        <form method="post">
            <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
            <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
            <input type="hidden" name="mobile" value="<?php echo $_POST['mobile']; ?>">
            <input type="hidden" name="section" value="<?php echo $_POST['section']; ?>">
            <input type="hidden" name="gender" value="<?php echo $_POST['gender']; ?>">

            <?php
            $questions = [
                ["HTML stands for", "Hyper Text Machine Language", "Hyper Text Markup Language", "Home Tool Markup Language"],
                ["What is HTML used for", "Styling Web Pages", "Server-Side Scripting", "Creating Web Page Structure"],
                ["Extension of HTML file", ".css", ".js", ".html"],
                ["Line break tag", "<lb>", "<br>", "<break>"],
                ["Image path attribute", "href", "alt", "src"],
                ["Round border property", "border-radius", "border-round", "border-style"],
                ["HTML comment", "//comment", "/*comment*/", "<--comment-->"],
                ["Open link in new tab", "_self", "_blank", "_new"],
                ["Password input type", "password", "hidden", "secure"],
                ["Table header tag", "<tr>", "<thead>", "<th>"]
            ];

            foreach($questions as $index => $q){
                echo '<div class="question-card">';
                echo '<p>'.($index+1).'. '.$q[0].'</p>';
                echo '<div class="options-group">';
                for($i=1; $i<=3; $i++){
                    $val = htmlspecialchars($q[$i]);
                    echo '<label class="option-item"><input type="radio" name="q'.$index.'" value="'.$val.'" required> '.$val.'</label>';
                }
                echo '</div></div>';
            }
            ?>

            <input type="submit" name="submit" value="Submit Quiz">
        </form>

    <?php } else { 
        for($i=0;$i<count($Trueans);$i++){
            if(isset($_POST["q$i"]) && $_POST["q$i"] == $Trueans[$i]){
                $score++;
            }
        }
    ?>

        <h2>Quiz Result</h2>
        <div class="result-info">
            <p><b>Student:</b> <?php echo $_POST['name']; ?> (<?php echo $_POST['section']; ?>)</p>
            <p><b>Email:</b> <?php echo $_POST['email']; ?></p>
            <p><b>Gender:</b> <?php echo $_POST['gender']; ?></p>
        </div>

        <div class="score-box">
            Your Score: <?php echo $score; ?> / 10
        </div>

        <h3>Correct Answers:</h3>
        <ol class="ans-list">
            <?php foreach($Trueans as $ans) { echo "<li>".htmlspecialchars($ans)."</li>"; } ?>
        </ol>

        <a href="index.html" class="btn-retry">Try Again</a>
    <?php } ?>
</div>

</body>
</html>