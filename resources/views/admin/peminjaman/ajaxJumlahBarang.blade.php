<div class="form-group row">
	<label for="jumlah" class="col-sm-2 col-form-label">Jumlah Barang</label>
	<div class="col-sm-10">
		<input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Barang" required max="{{ $max-$jumlah_dipinjam }}" min="0" onkeyup="minMax();" onkeypress="number(event)">
	</div>
</div>

<script type="text/javascript">
	function number(evt) {
    var theEvent = evt || window.event;

    // Handle paste
    if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
    } else {
      // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if( !regex.test(key) ) {
      theEvent.returnValue = false;
      if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }

  function minMax() {
    var max = document.getElementById("jumlah").max;
    var min = 0;

    var inputRef = document.getElementById("jumlah");
    var txtValue = inputRef.value;
    if(isNaN(parseFloat(txtValue))){
      console.log("warning input is not a number");
      return;
    }
    var newNum = parseFloat(txtValue);
    console.log(`NEW:${newNum}`);
    if (newNum > max || newNum < min) {
      	Swal.fire({
          position: 'center',
          icon: 'error',
          title: 'Jumlah Tidak Boleh Melebihi Stok Barang Yang Dimiliki!',
          showConfirmButton: false,
          timer: 2000
        });
      	inputRef.value = "";
    }
  }
</script>