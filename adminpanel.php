<?php
  session_start();

  if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
		header('Location: admin.html');
		exit;
	}

	include_once "data-main.php";

  function checkbox($par, $name, $opt){
    global $$par;
    if (!isset($$par)) {$$par = "";}
    echo '<label><input ';
    echo $$par ? 'checked' : '';
    echo ' type="checkbox" name="'.$par.'" '.$opt.'>'.$name.'</label>';
  }
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="robots" content="noindex, nofollow">
    <title>Admin-panel</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/admin.css?<?=time()?>">
  </head>

<body>

	<div class="container">
		<form id="post-conent" action="javascript:postData('post-conent')" enctype="multipart/form-data" method="post">
      <div id="app-interval">

        <div class="edit-block" id="catch-color">
          Button Design
          <div class="offset">
            <div class="row-flex" style="gap: 50px; margin-top: 50px;">

              <div class="" style="width: 180px; height: 180px">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: 100%" viewBox="0 0 512 512">
                  <defs>
                    <linearGradient id="g" x1="0" y1="0" x2="0" y2="1">
                      <stop offset="0" :stop-color="grad1"/>
                      <stop offset="1" :stop-color="grad2"/>
                    </linearGradient>
                  </defs>
                  <circle cx="256" cy="256" r="256" fill="url(#g)"/>
                  <circle cx="256" cy="256" r="248" fill="none" :stroke="catch_frame" stroke-opacity="0.45" stroke-width="8"/>
                  <path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z" :fill="catch_phone" transform="translate(256,256) scale(11.3) translate(-12,-12)"/>
                </svg>
              </div>

              <div class="">
                Circle Color
                <div class="offset">
                  <div class="row-flex color-item">
                        <small>Top color</small>
                        <input type="color" v-model="grad1" name="catch_grad1">
                        <input size="5" minlength="7" maxlength="7"  type="text" v-model="grad1" >
                  </div>

                  <div class="row-flex color-item">
                        <small>Bottom color</small>
                        <input type="color" v-model="grad2" name="catch_grad2">
                        <input size="5" minlength="7" maxlength="7"  type="text" v-model="grad2" >
                  </div>

                  <div class="row-flex color-item">
                        <small>Frame</small>
                        <input type="color" v-model="catch_frame" name="catch_frame">
                        <input size="5" minlength="7" maxlength="7"  type="text" v-model="catch_frame" >
                  </div>
                </div>

                <div class="row-flex color-item">
                      <small>Phone</small>
                      <input type="color" v-model="catch_phone" name="catch_phone">
                      <input size="5" minlength="7" maxlength="7"  type="text" v-model="catch_phone" >
                </div>
              </div>
           </div>
          </div>
        </div>

        <div class="edit-block">
          Triggers
          <div class="offset">
            <div class="margin-top-10">
              <?php checkbox('catch_tr_out', 'Leaving the site', ''); ?>
            </div>
            <div class="margin-top-10">
              <?php checkbox('catch_tr_tim', 'Stay on the site', ''); ?>
            </div>
            <div class="margin-top-10">
              <?php checkbox('catch_tr_but', 'Button', ''); ?>
            </div>
          </div>
        </div>

        <div class="edit-block">
          <?php checkbox('catch_data_time', 'DateTime', ''); ?>

          <div id="" class="margin-top-10 offset">
            <label for="firstInterval">с&nbsp;</label>
            <select v-model="selectedFirstInterval" name="catch_from">
              <option v-for="interval in firstIntervals" :key="interval" :value="interval">{{ filteredTime(interval) }}</option>
            </select>

            <label style="margin-left: 16px" for="secondInterval">до&nbsp;</label>
            <select v-model="selectedSecondInterval" name="catch_to">
              <option v-for="interval in filteredSecondIntervals" :key="interval" :value="interval">{{ filteredTime(interval) }}</option>
            </select>
          </div>
        </div>

        <div class="edit-block">
          <label class="row-flex gap-10">
            Title  <textarea class="field" cols="50" rows="4" name="catch_title"><?=trim($catch_title)?></textarea>
          </label>
        </div>

			  <input id="update" class="update btn" type="submit" value="Update">
        <span class="update-status"></span>
      </div>
		</form>
	</div>

  <script>
    const grad1_php = <?= json_encode(isset($catch_grad1) ? $catch_grad1 : "#FFDA3D" ) ?>;
    const grad2_php = <?= json_encode(isset($catch_grad2) ? $catch_grad2 : "#F2B400" ) ?>;
    const catch_frame_php = <?= json_encode(isset($catch_frame) ? $catch_frame : "#FFFFFF" ) ?>;
    const catch_phone_php = <?= json_encode(isset($catch_phone) ? $catch_phone : "#1A1A1A" ) ?>;
    const catch_from = <?= (isset($catch_from) && is_numeric($catch_from)) ? $catch_from : 7 ?>;
    const catch_to = <?= (isset($catch_to) && is_numeric($catch_to)) ? $catch_to : 20 ?>;
  </script>
  <script src="js/vue3.js"></script>
  <script src="js/admin.js?<?=time()?>"></script>
</body>
</html>
