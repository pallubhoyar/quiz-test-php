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
<html>
<head>
    <title>HTML Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="page">
<div class="card">

<?php if(!$isQuizSubmitted){ ?>

<h2>HTML Quiz</h2>

<form method="post">

    <!-- hidden student data -->
    <input type="hidden" name="name" value="<?php echo $_POST['name']; ?>">
    <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
    <input type="hidden" name="mobile" value="<?php echo $_POST['mobile']; ?>">
    <input type="hidden" name="section" value="<?php echo $_POST['section']; ?>">
    <input type="hidden" name="gender" value="<?php echo $_POST['gender']; ?>">

    <div class="question">
        <p>1. HTML stands for</p>
        <label><input type="radio" name="q0" value="Hyper Text Machine Language"> Hyper Text Machine Language</label>
        <label><input type="radio" name="q0" value="Hyper Text Markup Language"> Hyper Text Markup Language</label>
        <label><input type="radio" name="q0" value="Home Tool Markup Language"> Home Tool Markup Language</label>
    </div>

    <div class="question">
        <p>2. What is HTML used for</p>
        <label><input type="radio" name="q1" value="Styling Web Pages"> Styling Web Pages</label>
        <label><input type="radio" name="q1" value="Server-Side Scripting"> Server-Side Scripting</label>
        <label><input type="radio" name="q1" value="Creating Web Page Structure"> Creating Web Page Structure</label>
    </div>

    <div class="question">
        <p>3. Extension of HTML file</p>
        <label><input type="radio" name="q2" value=".css"> .css</label>
        <label><input type="radio" name="q2" value=".js"> .js</label>
        <label><input type="radio" name="q2" value=".html"> .html</label>
    </div>

    <div class="question">
        <p>4. Line break tag</p>
        <label><input type="radio" name="q3" value="<lb>"> &lt;lb&gt;</label>
        <label><input type="radio" name="q3" value="<br>"> &lt;br&gt;</label>
        <label><input type="radio" name="q3" value="<break>"> &lt;break&gt;</label>
    </div>

    <div class="question">
        <p>5. Image path attribute</p>
        <label><input type="radio" name="q4" value="href"> href</label>
        <label><input type="radio" name="q4" value="alt"> alt</label>
        <label><input type="radio" name="q4" value="src"> src</label>
    </div>

    <div class="question">
        <p>6. Property for round border</p>
        <label><input type="radio" name="q5" value="border-radius"> border-radius</label>
        <label><input type="radio" name="q5" value="border-round"> border-round</label>
        <label><input type="radio" name="q5" value="border-style"> border-style</label>
    </div>

    <div class="question">
        <p>7. HTML comment</p>
        <label><input type="radio" name="q6" value="//comment"> //comment</label>
        <label><input type="radio" name="q6" value="/*comment*/"> /*comment*/</label>
        <label><input type="radio" name="q6" value="<--comment-->"> &lt;--comment--&gt;</label>
    </div>

    <div class="question">
        <p>8. Open link in new tab</p>
        <label><input type="radio" name="q7" value="_self"> _self</label>
        <label><input type="radio" name="q7" value="_blank"> _blank</label>
        <label><input type="radio" name="q7" value="_new"> _new</label>
    </div>

    <div class="question">
        <p>9. Password input type</p>
        <label><input type="radio" name="q8" value="password"> password</label>
        <label><input type="radio" name="q8" value="hidden"> hidden</label>
        <label><input type="radio" name="q8" value="secure"> secure</label>
    </div>

    <div class="question">
        <p>10. Table header tag</p>
        <label><input type="radio" name="q9" value="<tr>"> &lt;tr&gt;</label>
        <label><input type="radio" name="q9" value="<thead>"> &lt;thead&gt;</label>
        <label><input type="radio" name="q9" value="<th>"> &lt;th&gt;</label>
    </div>

    <button type="submit" name="submit" class="btn">Submit Quiz</button>
</form>

<?php } else {

for($i=0;$i<count($Trueans);$i++){
    if(isset($_POST["q$i"]) && $_POST["q$i"] == $Trueans[$i]){
        $score++;
    }
}
?>

<h2>Quiz Result</h2>

<div class="info">
    <p><b>Student:</b> <?php echo $_POST['name']; ?> (<?php echo $_POST['section']; ?>)</p>
    <p><b>Email:</b> <?php echo $_POST['email']; ?></p>
    <p><b>Gender:</b> <?php echo $_POST['gender']; ?></p>
</div>

<div class="score">
    Your Score : <?php echo $score; ?> / <?php echo count($Trueans); ?>
</div>

<h3>Correct Ans:</h3>
<ol>
<?php
foreach($Trueans as $ans){
    // htmlspecialchars use karne se tags screen par dikhayi denge
    echo "<li>" . htmlspecialchars($ans) . "</li>";
}
?>
</ol>
<a href="index.html" class="btn">Try Again</a>

<?php } ?>

</div>
</div>

</body>
</html>