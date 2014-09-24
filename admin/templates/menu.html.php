
<?php $askNotify = $this->get('askNotify');
$domain = $this->get('domain'); ?>
<!--
<a href="<?php echo $domain; ?>/news">Newsy</a><br />
<a href="<?php echo $domain; ?>/ask">Pytania</a><br />
<a href="<?php echo $domain; ?>/categories">Kategorie</a><br />
<a href="<?php echo $domain; ?>/articles">Artykuły</a><br />
<a href="<?php echo $domain; ?>/menu">Menu</a><br />
<a href="<?php echo $domain; ?>/contact">Kontakt</a><br />
<a href="<?php echo $domain; ?>/login/logout">Wyloguj</a>
<hr>
-->



<aside class="left-side sidebar-offcanvas">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo $domain; ?>/assets/img/avatar.jpg" class="img-circle" alt="User Image" />
      </div>
      <div class="pull-left info">
        <p>Hanna Pruchniewska</p>
        <i class="fa fa-circle text-success"></i> Online
      </div>
    </div>
    
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
		<li>
        <a href="<?php echo $domain; ?>/main">
          <i class="fa fa-envelope"></i>
          <span>Strona główna</span>
        </a>
      </li>
      <li>
        <a href="<?php echo $domain; ?>/menu">
          <i class="fa fa-dashboard"></i> 
          <span>Nawigacja</span>
        </a>
      </li>
      <li>
        <a href="<?php echo $domain; ?>/ask">
          <i class="fa fa-question-circle"></i> 
          <span>Pytania</span>
					<small class="badge pull-right bg-green"><?php echo $askNotify; ?></small>
        </a>
      </li>
      <li>
        <a href="<?php echo $domain; ?>/news">
          <i class="fa fa-font"></i>
          <span>Aktualności</span>
        </a>
      </li>
      <li>
        <a href="<?php echo $domain; ?>/team">
          <i class="fa fa-users"></i>
          <span>Team</span>
        </a>
      </li>
      <li>
        <a href="<?php echo $domain; ?>/categories">
          <i class="fa fa-th-list"></i>
          <span>Kategorie</span>
        </a>
      </li>
      <li>
        <a href="<?php echo $domain; ?>/articles">
          <i class="fa fa-list-alt"></i>
          <span>Artykuły</span>
        </a>
      </li>
      <li>
        <a href="<?php echo $domain; ?>/contact">
          <i class="fa fa-envelope"></i>
          <span>Kontakt</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<aside class="right-side">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Panel administratora
      <small>zarządzanie stroną internetową</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo $domain; ?>"><i class="fa fa-home"></i>Strona główna</a>
      </li>
      <li class="active">Konfiguracja</li>
    </ol>
  </section>
	<!-- Main content -->
  <section class="content bg-gray">
