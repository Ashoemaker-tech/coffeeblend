<form action="/reservation" method="POST" class="appointment-form">
  <div class="d-md-flex">
	<div class="form-group">
	  <input type="text" class="form-control" name="first_name" placeholder="First Name">
	</div>
	<div class="form-group ml-md-4">
	  <input type="text" class="form-control" name="last_name" placeholder="Last Name">
	</div>
  </div>
  <div class="d-md-flex">
	<div class="form-group">
	  <div class="input-wrap">
		<div class="icon"><span class="ion-md-calendar"></span></div>
		<input type="text" class="form-control appointment_date" name="date" placeholder="Date">
	  </div>
	</div>
	<div class="form-group ml-md-4">
	  <div class="input-wrap">
		<div class="icon"><span class="ion-ios-clock"></span></div>
		<input type="text" class="form-control appointment_time" name="time"  placeholder="Time">
	  </div>
	</div>
	<div class="form-group ml-md-4">
	  <input type="text" class="form-control" name="phone_number" placeholder="Phone">
	</div>
  </div>
  <div class="d-md-flex">
	<div class="form-group">
	  <textarea name="message" id="" cols="30" rows="2" class="form-control" placeholder="Message"></textarea>
	</div>
	<div class="form-group ml-md-4">
	  <button type="submit" class="btn btn-white py-3 px-4">Reserve</button>
	</div>
  </div>
</form>
<?php /**PATH C:\Users\Andrew\Desktop\sites\coffeeblend\views/partials/bookingForm.blade.php ENDPATH**/ ?>