
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
                                            <h1 class="title is-6">Topic: Sample Name</h1>
                                            <progress class="progress is-info is-small" :value="(questionIndex/quiz.questions.length)*100" max="100">{{(questionIndex/quiz.questions.length)*100}}%</progress>                                         
                                       </div>
                                    </div>                                  
                                    <h2 class="titleContainer title">1. Who is the Father of our Nation? </h2>
                                    <div class="">                                      
                                      <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                          <li data-target="#myCarousel" data-slide-to="1"></li>
                                          <li data-target="#myCarousel" data-slide-to="2"></li>
                                          <li data-target="#myCarousel" data-slide-to="3"></li>
                                        </ol>

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                          <div class="item active">
                                            <img src="https://historycouk.s3.eu-west-2.amazonaws.com/s3fs-public/styles/768x432/public/2020-07/gettyimages-2668873.jpg" alt="Gandhi" width="100%">
                                          </div>

                                          <div class="item">
                                            <img src="https://thefederal.com/file/2019/11/Nehru-lead-696x444.jpg" alt="Nehru" width="100%">
                                          </div>
                                        
                                          <div class="item">
                                            <img src="https://citytoday.news/wp-content/uploads/2018/09/Subhash-chandra-bose-780x405.jpg" alt="Netaji" width="100%">
                                          </div>
                                          <div class="item">
                                            <img src="https://images.indianexpress.com/2019/03/sardar_patel.jpg" alt="Netaji" width="100%">
                                          </div>
                                        </div>

                                        <!-- Left and right controls -->
                                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                          <span class="glyphicon glyphicon-chevron-left"> &#8249; </span>
                                           <!--<span class="sr-only">Previous</span>-->
                                        </a>
                                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                          <span class="glyphicon glyphicon-chevron-right"> &#8250; </span>
                                           <!--<span class="sr-only">Next</span>-->
                                        </a>
                                      </div>
                                    </div>
                                    <!--<div class="text-center">
                                        <img src="https://cdn.britannica.com/26/152026-050-41D137DE/Sunshine-leaves-beech-tree.jpg" alt="image" class="qes-img" />
                                    </div>-->
                                    <div class="optionContainer">
                                        <div class="option" :id="index | charIndex | AddPrefix('ansopt_')" v-for="(response, index) in quiz.questions[questionIndex].responses" @click="selectOption(index)" :class="{ 'is-selected': userResponses[questionIndex] == index}" :key="index" v-if="response.text != ''">
                                             <span class="q-option">a) Netaji Subash</span>                                             
                                        </div>
                                        <div class="option" :id="index | charIndex | AddPrefix('ansopt_')" v-for="(response, index) in quiz.questions[questionIndex].responses" @click="selectOption(index)" :class="{ 'is-selected': userResponses[questionIndex] == index}" :key="index" v-if="response.text != ''">
                                             <span class="q-option">b) Jawaharlal Nehru</span>                                             
                                        </div>
                                        <div class="option" :id="index | charIndex | AddPrefix('ansopt_')" v-for="(response, index) in quiz.questions[questionIndex].responses" @click="selectOption(index)" :class="{ 'is-selected': userResponses[questionIndex] == index}" :key="index" v-if="response.text != ''">
                                             <span class="q-option">c) Mahatma Gandhi</span>                                             
                                        </div>
                                        <div class="option" :id="index | charIndex | AddPrefix('ansopt_')" v-for="(response, index) in quiz.questions[questionIndex].responses" @click="selectOption(index)" :class="{ 'is-selected': userResponses[questionIndex] == index}" :key="index" v-if="response.text != ''">
                                             <span class="q-option">d) Vallabhbhai Patel</span>                                             
                                        </div>
                                    </div>
                     
                                </div>                            
                           
                        </div>
                       
                    </div>
                </div>
            </section>
        </div>
        <!--/container-->
        <?php include 'footer.php'; ?>
        <?php include 'script.php'; ?>
       </body>
</html>
