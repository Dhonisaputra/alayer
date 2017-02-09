<!DOCTYPE html>
<html>
<head>
	<title>Alayer Converter</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript" src="assets/manipulation.url.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body class="container">
	<div class="panel panel-default">
		<div class="panel-body">
			
			<fieldset>
				<legend>Alayer Converter</legend>
				<form action="process.php">
					<div class="form-group">
						<label>Text yang akan anda jadikan alay.</label>
						<textarea class="form-control" placeholder="text yang akan dijadikan alay" name="text"></textarea>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit"> Jadikan Alay </button>
						<button class="btn btn-danger" type="reset"> Bersihkan </button>
					</div>
				</form>
			</fieldset>

			<fieldset>
				<legend>4|4y V312510/\/ </legend>
				<div class="convert" style=""> <h1 class="text-center text-muted"> Anda belum jadi alay<br><small class=""> Silahkan isikan textarea diatas untuk dikonversi menjadi alay version </small> </h1> </div>
				<hr>
				<button class="btn btn-warning btn-sm btn-copy" data-toggle="tooltip" title="Tulisan alay sudah disalin!" data-trigger="click" onclick="alaycopy()"> Salin </button> 
				<button class="btn btn-danger btn-sm" onclick="$('.convert').html('')"> Bersihkan </button> 
			</fieldset>

			<textarea class="sr-only" placeholder="text yang akan dijadikan alay" name="copy"></textarea>
		</div>
	</div>

	<script type="text/javascript">
		function alaycopy()
		{
			var data = $('.convert').html();
			var beforeConvert = $('textarea[name="text"]').val();
			$('textarea[name="text"]').val(data).select();
			document.execCommand("copy");
			$('textarea[name="text"]').val(beforeConvert)

			window.setTimeout(function(){
				$('.btn-copy').tooltip('hide');
			},3000)
		}

		function convert_alay(ui)
		{
			var data = $('textarea[name="text"]').val();
			var action = $('form').attr('action');
			$.post(action, {text: data})
			.done(function(res){
				res = JSON.parse(res);
				$('.convert').html(res.transform)
			})
		}

		function detect_convert()
		{
			var convert = decodeURI( URL.get().query.convert );
			$('textarea[name="text"]').val(convert)
			convert_alay();
		}
		$(document).ready(function(){

			$('[data-toggle="tooltip"]').tooltip();

			if(URL.get().query.convert)
			{
				detect_convert();
			}

			$('form').on('submit', function(e){
				e.preventDefault();
				var data = $(this).serializeArray();
				var action = $(this).attr('action');
				$.post(action, data)
				.done(function(res){
					res = JSON.parse(res);
					$('.convert').html(res.transform)
				})
			})

			$('textarea[name="text"]').on('keyup', function(e){
				e.preventDefault();
				convert_alay();
			})
				
		})
	</script>
</body>
</html>