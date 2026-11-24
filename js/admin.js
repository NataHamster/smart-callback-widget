const { createApp, reactive, computed, watch, ref, onMounted, nextTick } = Vue;

createApp({
    setup() {
        const firstIntervals = Array.from({ length: 24 }, (_, i) => i);
        const secondIntervals = ref([...firstIntervals]);
        /*const secondIntervals = Array.from({ length: 24 }, (_, i) => i);*/
        const selectedFirstInterval = ref(catch_from);
        const selectedSecondInterval = ref(catch_to);

        const filteredSecondIntervals = computed(() => {
            return secondIntervals.value.filter(interval => interval > selectedFirstInterval.value);
        });

        const filteredTime = (val) => {
            return val.toString().padStart(2, '0') + ':00';
        };

        watch(selectedFirstInterval, (newVal) => {
            secondIntervals.value = firstIntervals.filter(interval => interval > newVal);
        });

        const grad1 = ref(grad1_php)
        const grad2 = ref(grad2_php)
        const catch_frame = ref(catch_frame_php)
        const catch_phone = ref(catch_phone_php)

        return {
            firstIntervals,
            secondIntervals,
            selectedFirstInterval,
            selectedSecondInterval,
            filteredSecondIntervals,
            filteredTime,
              grad1, grad2, catch_frame, catch_phone
        };
    }
}).mount('#app-interval');

/***************************************send form***************************************/

function postData(th_id) {

  const th_form = document.getElementById(th_id)

  const update_status = th_form.querySelector('.update-status');
  update_status.innerHTML = "Pending...";
  update_status.style.color = "orange";

  let data = new FormData(th_form)

  fetch('upload.php', {
    method: 'POST',
    body: data,
  }).then(response => {
    if (!response.ok) {
      update_status.innerHTML = "Error";
      update_status.style.color = "red";
    } else {
      response.text().then(data => {
          console.log(data);
        });
      update_status.innerHTML = "Updated";
      update_status.style.color = "green";
    }
  }).catch(err => {
    update_status.innerHTML = "Error";
    update_status.style.color = "red";
  })
}

/***************************************send form***************************************/
