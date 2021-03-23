
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
                                    <div class="tooltip-container">
                                    <ul class="options">
                                    <li><a href="#" onclick="popupFunction()">abdomen</a></li>
                                    <li>altitude</li>
                                    <li>colloborate</li>
                                    <li>latitude</li>
                                    </ul></div>
                                     <div class="popup-div" id="abdomen">
                                     <h5>Abdomen</h5><img src="img/english/pic-abdomen.png" title="Abdomen Picture" /><br><div>The abdomen (commonly called the belly) is the body space between the thorax (chest) and pelvis. </div>
                                     <audio  id="abdomenAudio"  preload="auto" src="mp3/India-Female-01-loud.mp3" controls><p>Your browser does not support the audio element</p></audio><br>
                                     <button style="margin-right:15px; background:#0044cc" type="button" class="btn btn-primary" onclick="submitAnswer()">Submit</button> <button type="button" class="btn btn-danger" onclick="cancelPopup()"> Cancel</button>
                                     </div>
                                     <p style="clear:both;">&nbsp;</p>
                                    <h2 class="titleContainer title">1. Sumathi brought Ravi to the emergency room because he had sharp pains in his <span id="answer" style="color:#007ee5;"><u>abdomen</u> <img src ="img/english/tick-2.gif"/></span><span id="blank">____________</span></h2>
                           
                        </div>
                       
                    </div>
                    
                    <script>
                    var x = document.getElementById("abdomen");
                     x.style.display = "none";
                     var y = document.getElementById("answer");
                     y.style.display = "none";
                     var z = document.getElementById("blank");
function popupFunction() {  
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("abdomenAudio").currentTime = 0;
    document.getElementById("abdomenAudio").play();
  } else {
      document.getElementById("abdomenAudio").pause();
      x.style.display = "none";
  }
   
}
function submitAnswer() {  
     x.style.display = "none";
     y.style.display = "inline";
     z.style.display = "none";
     document.getElementById("abdomenAudio").pause();
  }
  function cancelPopup() {  
     x.style.display = "none";
     y.style.display = "none";
     z.style.display = "inline";
     document.getElementById("abdomenAudio").pause();
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
