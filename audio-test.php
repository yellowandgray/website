
<!DOCTYPE html>
<html lang="en">
    <?php
    $page = 'about';
    include 'head.php';
    ?>
    <body class="goto-here">
        <!--container-->
        <?php include 'menu.php'; ?>
        <div class="quiz-section">
            <section class="container">
                <div class="row">
                    <div class="span12">
                        <div class="quiz-question-section">
                            <a href ="#" onclick="goBack()"><i class="font-icon-arrow-simple-left"></i></a>
                            <h2 style="margin-left: 60px; margin-right: 60px;">
                                <table class="table-title">
                                    <tr>
                                        <td valign="top">Selected Subject</td>
                                        <td valign="top" class="w-5">:</td>
                                        <th valign="top">Demo</th>
                                    </tr>
                                    <tr>
                                        <td valign="top">Selected Chapter</td>
                                        <td valign="top">:</td>
                                        <th valign="top">Demo</th>
                                    </tr>
                                </table>
                            </h2>
                            <a class="home_link" href="home_subject">
                                <i class="icon-home"></i>
                            </a>
                        </div>
                        <!--question Box-->
                        <div class="questionBox" id="app">                            
                                <div class="questionContainer">
                                    <div class="question-header">
                                        <!--progress-->
                                        <div class="progressContainer">                                            
                                            <h1 class="title is-6">Topic: Sentence Completions</h1>
                                            <progress class="progress is-info is-small" :value="(questionIndex/quiz.questions.length)*100" max="100">{{(questionIndex/quiz.questions.length)*100}}%</progress>                                         
                                       </div>
                                    </div>
                                    <audio autoplay controls><source src="mp3/India-Female-01.mp3" type="audio/mp3"></audio>
                           
                        </div>
                       
                    </div>
                    <script>
                    var x = document.getElementById("abdomen");
                     x.style.display = "none";
function popupFunction() {
  var x = document.getElementById("abdomen");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
                </div>
            </section>
        </div>
        <!--/container-->
        <?php include 'footer.php'; ?>
        <?php include 'script.php'; ?>
       </body>
</html>
