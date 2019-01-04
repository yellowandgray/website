<?php
$lists = array(array('href' => 'events-upload.php', 'icon' => 'fa-tachometer', 'name' => 'Events'));
$menu = '';
foreach ($lists as $list) {
    if ($list['name'] === $active) {
        $menu = $menu . '<li class="active highlight"><a href="' . $list['href'] . '"><i class="menu-icon fa ' . $list['icon'] . '"></i><span class="menu-text">' . $list['name'] . '</span></a><b class="arrow"></b></li>';
    } else {
        $menu = $menu . '<li class=""><a href="' . $list['href'] . '"><i class="menu-icon fa ' . $list['icon'] . '"></i><span class="menu-text">' . $list['name'] . '</span></a><b class="arrow"></b></li>';
    }
}
?>
<div id="sidebar" class="sidebar responsive ace-save-state">
    <ul class="nav nav-list">
        <?php echo $menu; ?>
    </ul><!-- /.nav-list -->

    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>
</div>