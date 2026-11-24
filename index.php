<?php
  include 'data-main.php';
  // get current data
  $current_date = date('Y-m-d');
  $days_of_week = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

  // get data after tomorrow
  $date_after_tomorrow = date('Y-m-d', strtotime($current_date . ' + 2 days'));
  $date_after_tomorrow3 = date('Y-m-d', strtotime($current_date . ' + 3 days'));

  // get the day of the week the day after tomorrow (1 - Monday, 7 - Sunday)
  $day_of_week_after_tomorrow = date('N', strtotime($date_after_tomorrow));
  $day_of_week_after_tomorrow3 = date('N', strtotime($date_after_tomorrow3));

  // Converting a numeric day of the week to a text format

  $day_after_tomorrow_name = $days_of_week[$day_of_week_after_tomorrow - 1];
  $day_after_tomorrow_name3 = $days_of_week[$day_of_week_after_tomorrow3 - 1];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lead cather</title>
    <link rel="stylesheet" href="css/common.css?<?=time()?>">

    <style>
      <?php   if (!isset($catch_grad1)) {$catch_grad1 = '#ccc';}   ?>
      .ripple {border-color: <?=$catch_grad1?>}
    </style>
</head>
<body>

  <a class="call_b" onclick="openModal()">
    <?php include 'inc/phone.php'; ?>
    <div class="ripple"></div>
  </a>

  <script>
    const catch_tr_tim = '<?= isset($catch_tr_tim) ? $catch_tr_tim : '' ?>';
    const catch_tr_out = '<?= isset($catch_tr_out) ? $catch_tr_out : '' ?>';
    const catch_tr_but = '<?= isset($catch_tr_but) ? $catch_tr_but : '' ?>';
  </script>

<div class="modal-overlay" id="lead-catcher">

    <div id="m-catcher" class="modal fade m-catcher">
        <button class="modal-close" onclick="closeModal()">
            &times;
        </button>
        <div class="modal-backdrop fade in" style="height: 100%;"></div>
        <div class="modal-dialog-catch" id="app">
          <div class="modal-content">
            <div class="modal-body">

              <form id="form-catch">

                 <div class="title"><?=$catch_title?></div>
                 <div class="row row-flex m-catcher__row-main">

                    <?php if (isset($catch_data_time) && $catch_data_time): ?>
                       <div class="col row-flex row-data_time">
                         <div class="col">
                           <div class="select-wrapper catch-inp">
                             <select v-if="showTodayOption" class="select-wrappe catch-inp 1" @change="onSelectChange" name="date">
                               <option value="Today" selected>{{vtoday}}</option>
                               <option value="Tomorrow">{{vtomorrow}}</option>
                               <option value="<?= $day_after_tomorrow_name ?>"><?= $day_after_tomorrow_name ?></option>
                               <option value="<?= $day_after_tomorrow_name3 ?>"><?= $day_after_tomorrow_name3 ?></option>
                             </select>
                             <select v-else class="select-wrappe inp 2 catch-inp" name="date">
                               <option value="Tomorrow" selected>{{vtomorrow}}</option>
                               <option value="<?= $day_after_tomorrow_name ?>"><?= $day_after_tomorrow_name ?></option>
                               <option value="<?= $day_after_tomorrow_name3 ?>"><?= $day_after_tomorrow_name3 ?></option>
                             </select>
                           </div>
                         </div>
                         <div class="v">в</div>
                         <div class="col">
                           <div class="select-wrapper catch-inp">
                             <select class="valid select-wrappe inp catch-inp" aria-invalid="false" v-model="selectedTime" name="time">
                               <option v-for="time in filteredAvailableTimes" :key="time" :value="time">{{ time }}</option>
                             </select>
                           </div>
                         </div>
                       </div>
                     <?php endif; ?>

                      <div class="col col-tel">
                        <div>
                          <input class="catch-inp tel" type="tel" name="tel" required>
                        </div>
                      </div>

                      <button class="button-3d btn pill submit" id="btn-send2" type="submit">{{vwait_call}}</button>
                </div>

              </form>
            </div>
          </div>
        </div>
    </div>

</div>

  <script>
    let catch_from = <?= (isset($catch_from) && is_numeric($catch_from)) ? $catch_from : 7 ?>;
    let catch_to = <?= (isset($catch_to) && is_numeric($catch_to)) ? $catch_to : 20 ?>;

    let arr_time = [];

    catch_from = Number(catch_from);
    catch_to = Number(catch_to);

    for(i=catch_from; i<=catch_to; i++) {
      arr_time.push(i);
    }

    let formattedTimes = arr_time.map(num => num.toString().padStart(2, '0') + ':00');
    const cTime = new Date().getHours();
    const cTime1 = cTime+1;

  </script>
  <script src="js/catcher.js?<?=time()?>"></script>
  <script src="js/vue3.js"></script>
  <script src="js/common.js?<?=time()?>"></script>

</body>
</html>
