<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title><?= SITE_TITLE ?></title>
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="page">
  <div class="pageHeader">
    <div class="title">Dashboard</div>
    <div class="userPanel"><a href="<?= route('?logout') ?>"><i class="fa fa-sign-out"></i></a><span class="username"><?= auth()->name ?> </span><img src="https://s3.amazonaws.com/uifaces/faces/twitter/kolage/73.jpg" width="40" height="40"/></div>
  </div>
  <div class="main">
    <div class="nav">
      <div class="searchbox">
        <div><i class="fa fa-search"></i>
          <input type="search" placeholder="Search"/>
        </div>
      </div>
      <div class="menu">
        <div class="title">Navigation</div>
        <ul>
            <?php foreach ($folders as $folder):?>
            <li class="<?= $folder->id == $_GET['folder'] ? 'active':'' ?>">
                <i class="fa fa-folder"></i>
                <a href="<?= route("?folder=$folder->id") ?>"><?= $folder->title ?></a>
                <a href="?delete_folder=<?= $folder->id ?>">*</a>
            </li>
            <?php endforeach; ?>
            <form action="<?=BASE_URL?>" method="post">
                <input name="action" type="text" value="add_folder" hidden/>
                <input name="folder_title" type="text" placeholder="Add New folder"/>
                <button type="submit" class="button active">+</button>
            </form>
        </ul>
      </div>
    </div>
    <div class="view">
      <div class="viewHeader">
        <div class="title">Manage Tasks</div>

      </div>
      <div class="content">
        <div class="list">

          <ul>
              <?php if (count($tasks)<=0) echo "no Task here" ?>
              <?php foreach ($tasks as $task): ?>
            <li>
                <i class=" <?= $task->is_done ? 'fa fa-check-square-o' : 'fa fa-square-o' ?>"></i>
                <span><?= $task->title ?></span>
              <div class="info">
                  <a href="<?= route("?delete_task=$task->id&folder=$task->folder_id") ?>"> x </a>
                  <span><?php echo verta($task->created_at) ?></span>
              </div>
            </li>

              <?php endforeach; ?>
          </ul>
        </div>
          <form action="<?=route()?>" method="post">
              <input name="action" type="text" value="add_task" hidden/>
              <input name="folder_id" type="text" value="<?= $_GET['folder']?>" hidden/>
              <input name="task_title" type="text"  placeholder="Add New task"/>
              <button type="submit" class="button active">+</button>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'>
  </script><script  src="<?= BASE_URL ?>assets/js/script.js"></script>

</body>
</html>
