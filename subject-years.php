<?php
// session_start();
// require_once 'api/include/common.php';
// $obj = new Common();
// if ( !isset( $_GET['lan'] ) ) {
//     header( 'Location: select_language' );
// }
// $language = $obj->selectRow( '*', 'language', 'name = \'' . $_GET['lan'] . '\'' );
// $_SESSION['student_selected_language_id'] = $language['language_id'];
// $years = $obj->selectAll( 'y.year, y.year_id', 'topic AS t LEFT JOIN year AS y ON y.year_id = t.year_id', 't.language_id = ' . $_SESSION['student_selected_language_id'].' GROUP BY y.year_id' );
?>
<!DOCTYPE html>
<html lang='en'>
<?php include 'head.php';
?>

<body>
    <div id='wrapper'>
        <?php include 'menu.php';
?>
        <section id='featured-1'>
            <div id='mySignin' tabindex='-1' aria-labelledby='mySigninModalLabel' aria-hidden='true'>
                <div class='modal styled'>
                    <div class='modal-header login-section'>
                        <a href='question-subject-order'><i class='font-icon-arrow-simple-left'></i></a>
                        <h4 id='mySigninModalLabel' class='text-center'><?php //echo $language['name'];
?>Question Order - Choose <strong>Year</strong></h4>
                    </div>
                    <div class='modal-body'>
                        <div class='year_select_section'>
                            <ul>
                                <li>
                                    <input type='checkbox' />
                                    <label>2010</label>
                                </li>
                                <li>
                                    <input type='checkbox' />
                                    <label>2011</label>
                                </li>
                                <li>
                                    <input type='checkbox' />
                                    <label>2012</label>
                                </li>
                                <li>
                                    <input type='checkbox' />
                                    <label>2013</label>
                                </li>
                                <li>
                                    <input type='checkbox' />
                                    <label>2014</label>
                                </li>
                                <li>
                                    <input type='checkbox' />
                                    <label>2015</label>
                                </li>
                            </ul>
                            <div class='text-right'>
                                <a href='quiz_page' class='btn btn-danger'>Next</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Reset Modal -->
        <?php include 'reset_password.php';
?>
        <!-- end reset modal -->
    </div>
    <?php include 'script.php';
?>
</body>

</html>