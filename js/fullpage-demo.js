addEventListener('DOMContentLoaded', function () {
	pickmeup('.single', {
		flat : true
	});
	pickmeup('.multiple', {
		flat : true,
		mode : 'multiple'
	});
	pickmeup('.range', {
		flat : true,
		mode : 'range'
	});
	var plus_5_days = new Date;
	plus_5_days.setDate(plus_5_days.getDate() + 5);
	pickmeup('.one-calendars', {
		flat      : true,
		date      : [
			new Date,
		],
		mode      : 'range',
		calendars : 1
	});
	pickmeup('.two-calendars', {
		flat      : true,
		date      : [
			new Date,
		],
		mode      : 'range',
		calendars : 1
	});
	pickmeup('input', {
		position       : 'right',
		hide_on_select : true
	});
});
