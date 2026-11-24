const { createApp, ref, computed} = Vue;

const	tomorrow = 'Tomorrow';
const	today = 'Today';
const	wait_call = 'Call me';

createApp({
    setup() {
        const selectedDate = ref('');
        const otherDays = ref(['Day1', 'Day2', 'Day3']);

				const defaultTimes = ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00'];

				let availableTimes = ref(defaultTimes); // Make sure this variable exists

				// Use fallback if formattedTimes is undefined, null, or empty
				if (typeof formattedTimes !== 'undefined') {
						availableTimes = ref(formattedTimes);
				}

        const currentTime = ref(cTime1); // Make sure this variable exists
        const vtoday = ref(today);
        const vtomorrow = ref(tomorrow);
        const vwait_call = ref(wait_call);

        const showTodayOption = computed(() => { // return 'today, tomorrow...' or 'tomorrow...'
						return (
							 availableTimes.value.length > 0
               &&
							 currentTime.value <= parseInt(availableTimes.value[availableTimes.value.length - 1].split(':')[0])
					 );
        });

				if(showTodayOption.value) {
					selectedDate.value = 'Today';
				}

        const filteredAvailableTimes = computed(() => { // full tima arr
          if (selectedDate.value === 'Today') {
                return availableTimes.value.filter(
                    time => parseInt(time.split(':')[0]) >= currentTime.value
                );
            } else {
                return availableTimes.value;
            }
        });

        const selectedTime = computed(() => {
            if (selectedDate.value === 'Today') {
                return availableTimes.value.find(
                    time => parseInt(time.split(':')[0]) >= currentTime.value
                );
            } else {
                return availableTimes.value[0];
            }
        });

        const onSelectChange = (event) => {
            updateSelectedDate(event);
        };

        const updateSelectedDate = (event) => {
            selectedDate.value = event.target.value;
        };



        return {
            selectedDate,
            otherDays,
            availableTimes,
            currentTime,
            vtoday,
            vtomorrow,
            vwait_call,
            showTodayOption,
            filteredAvailableTimes,
            selectedTime,
            onSelectChange,
            updateSelectedDate
        };
    }
}).mount('#app');
