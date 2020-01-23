<html lang="en">
    <?php include 'head.php'; ?>

    <body>
        <div id="wrapper">
            <?php include 'menu.php'; ?>
            <section id="featured-1">
                <div id="mySignin" tabindex="-1" aria-labelledby="mySigninModalLabel" aria-hidden="true">
                    <div class="modal styled">
                        <div class="modal-header login-section">
                            <a href="question-subject-order"><i class="font-icon-arrow-simple-left"></i></a>
                            <h4 id="mySigninModalLabel" class="text-center">Subject Order - Select <strong>Subject an Topic</strong></h4>
                        </div>
                        <div class="modal-body">
                            <div class="language_section">
                                <ul class="subject-section-order">
                                    <li>
                                        <input type="checkbox" id="option"><label for="option" class="heading-custom"> Science</label>
                                        <ul>
                                            <li><label class="pl-0"><input type="checkbox" class="subOption"> <span>Chemistry</span></label></li>
                                            <li><label class="pl-0"><input type="checkbox" class="subOption"> <span>Physics</span></label></li>
                                            <li><label class="pl-0"><input type="checkbox" class="subOption"> <span>Biology</span></label></li>
                                        </ul>
                                    </li>
<!--                                    <li>
                                        <input type="checkbox" id="option"><label for="option" class="heading-custom"> Maths</label>
                                        <ul>
                                            <li><label class="pl-0"><input type="checkbox" class="subOption"> <span>Algebra</span></label></li>
                                            <li><label class="pl-0"><input type="checkbox" class="subOption"> <span>Combinatorics</span></label></li>
                                            <li><label class="pl-0"><input type="checkbox" class="subOption"> <span>Logic</span></label></li>
                                        </ul>
                                    </li>-->
                                </ul>
                            </div>
                            <div class="text-right">
                                <a href="subject-years" class="btn btn-danger">Next</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'script.php'; ?>
        <script type="text/javascript">
            var checkboxes = document.querySelectorAll('input.subOption'),
                    checkall = document.getElementById('option');

            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].onclick = function () {
                    var checkedCount = document.querySelectorAll('input.subOption:checked').length;

                    checkall.checked = checkedCount > 0;
                    checkall.indeterminate = checkedCount > 0 && checkedCount < checkboxes.length;
                }
            }

            checkall.onclick = function () {
                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = this.checked;
                }
            }
        </script>
    </body>

</html>